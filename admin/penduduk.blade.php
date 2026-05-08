<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Penduduk</h5>
        <button class="btn btn-primary btn-sm" id="btnTambahPenduduk">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tablePenduduk">
                <thead class="thead-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Kategori</th>
                        <th>Label</th>
                        <th>KK</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                        <th>Persentase</th>
                        <th>Tahun</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</div>

<!-- Modal Penduduk -->
<div class="modal fade" id="modalPenduduk">
    <div class="modal-dialog modal-lg">
        <form id="formPenduduk">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title">Form Data Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="idPenduduk">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori <span class="text-danger">*</span></label>
                                <select class="form-control" name="kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Usia">Usia</option>
                                    <option value="Pekerjaan">Pekerjaan</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Agama">Agama</option>
                                    <option value="Suku">Suku</option>
                                    <option value="Status Perkawinan">Status Perkawinan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Label / Keterangan</label>
                                <input type="text" class="form-control" name="label" placeholder="Contoh: 0-5 Tahun, Petani, Islam, dll">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah KK</label>
                                <input type="number" class="form-control" name="kk" value="0" min="0">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Laki-laki <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="laki_laki" value="0" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Perempuan <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="perempuan" value="0" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Persentase (%)</label>
                                <input type="number" class="form-control" name="persentase" value="0" min="0" max="100" step="0.01">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tahun" maxlength="4" required>
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

    var baseUrl = '{{ admin_url("statistik-api/penduduk") }}';

    var tablePenduduk = $('#tablePenduduk').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + '/datatables',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'kategori' },
            { data: 'label' },
            { data: 'kk' },
            { data: 'laki_laki' },
            { data: 'perempuan' },
            { data: 'jumlah' },
            { data: 'persentase' },
            { data: 'tahun' },
            { data: 'action', orderable: false, searchable: false }
        ]
    });

    $('#btnTambahPenduduk').click(function () {
        $('#formPenduduk')[0].reset();
        $('#idPenduduk').val('');
        $('#modalPenduduk .modal-title').text('Tambah Data Penduduk');
        $('#modalPenduduk').modal('show');
    });

    $('#formPenduduk').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + '/store',
            type: 'POST',
            data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function () {
                $('#modalPenduduk').modal('hide');
                tablePenduduk.ajax.reload();
                alert('Data berhasil disimpan!');
            },
            error: function (xhr) {
                alert('Terjadi kesalahan: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    });

    $(document).on('click', '.btn-edit-penduduk', function () {
        let id = $(this).data('id');
        $.get(baseUrl + '/edit/' + id, function (res) {
            $('#idPenduduk').val(res.id);
            $('#formPenduduk [name=kategori]').val(res.kategori);
            $('#formPenduduk [name=label]').val(res.label);
            $('#formPenduduk [name=kk]').val(res.kk);
            $('#formPenduduk [name=laki_laki]').val(res.laki_laki);
            $('#formPenduduk [name=perempuan]').val(res.perempuan);
            $('#formPenduduk [name=persentase]').val(res.persentase);
            $('#formPenduduk [name=tahun]').val(res.tahun);
            $('#modalPenduduk .modal-title').text('Edit Data Penduduk');
            $('#modalPenduduk').modal('show');
        });
    });

    $(document).on('click', '.btn-delete-penduduk', function () {
        if (confirm('Yakin hapus data penduduk ini?')) {
            let id = $(this).data('id');
            $.post(baseUrl + '/delete/' + id, {_token: '{{ csrf_token() }}'}, function () {
                tablePenduduk.ajax.reload();
                alert('Data berhasil dihapus!');
            });
        }
    });
});
</script>
