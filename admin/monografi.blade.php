<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Monografi</h5>
        <button class="btn btn-primary btn-sm" id="btnTambahMonografi">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tableMonografi">
                <thead class="thead-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tahun</th>
                        <th>File</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal Monografi -->
<div class="modal fade" id="modalMonografi">
    <div class="modal-dialog modal-lg">
        <form id="formMonografi" enctype="multipart/form-data">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Monografi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="idMonografi">
                    <div class="form-group">
                        <label>Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi singkat monografi"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tahun" maxlength="4" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File (PDF/DOC/XLS)</label>
                                <input type="file" class="form-control" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            </div>
                        </div>
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

    var baseUrl = '{{ admin_url("statistik-api/monografi") }}';

    var tableMonografi = $('#tableMonografi').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + '/datatables',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'judul' },
            { data: 'deskripsi' },
            { data: 'tahun' },
            { data: 'file', orderable: false, searchable: false },
            { data: 'action', orderable: false, searchable: false }
        ]
    });

    $('#btnTambahMonografi').click(function () {
        $('#formMonografi')[0].reset();
        $('#idMonografi').val('');
        $('#modalMonografi').modal('show');
    });

    $('#formMonografi').submit(function (e) {
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
                $('#modalMonografi').modal('hide');
                tableMonografi.ajax.reload();
                alert('Data berhasil disimpan!');
            },
            error: function (xhr) {
                alert('Terjadi kesalahan: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    });

    $(document).on('click', '.btn-delete-monografi', function () {
        if (confirm('Yakin hapus data monografi ini?')) {
            let id = $(this).data('id');
            $.post(baseUrl + '/delete/' + id, {_token: '{{ csrf_token() }}'}, function () {
                tableMonografi.ajax.reload();
                alert('Data berhasil dihapus!');
            });
        }
    });
});
</script>
