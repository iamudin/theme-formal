<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Infografis</h5>
        <button class="btn btn-primary btn-sm" id="btnTambahInfografis">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tableInfografis">
                <thead class="thead-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal Infografis -->
<div class="modal fade" id="modalInfografis">
    <div class="modal-dialog modal-lg">
        <form id="formInfografis" enctype="multipart/form-data">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Infografis</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="idInfografis">
                    <div class="form-group">
                        <label>Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi singkat infografis"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maks 5MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function(){

    var baseUrl = '{{ admin_url("statistik-api/infografis") }}';

    var tableInfografis = $('#tableInfografis').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + '/datatables',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'judul' },
            { data: 'deskripsi' },
            { data: 'gambar', orderable: false, searchable: false },
            { data: 'action', orderable: false, searchable: false }
        ]
    });

    $('#btnTambahInfografis').click(function () {
        $('#formInfografis')[0].reset();
        $('#idInfografis').val('');
        $('#modalInfografis').modal('show');
    });

    $('#formInfografis').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: baseUrl + '/store',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                $('#modalInfografis').modal('hide');
                tableInfografis.ajax.reload();
                alert('Data berhasil disimpan!');
            },
            error: function (xhr) {
                alert('Terjadi kesalahan: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    });

    $(document).on('click', '.btn-delete-infografis', function () {
        if (confirm('Yakin hapus infografis ini?')) {
            let id = $(this).data('id');
            $.post(baseUrl + '/delete/' + id, {_token: '{{ csrf_token() }}'}, function () {
                tableInfografis.ajax.reload();
                alert('Data berhasil dihapus!');
            });
        }
    });
});
</script>
