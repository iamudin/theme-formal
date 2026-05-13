<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Topografi</h5>
        <button class="btn btn-primary btn-sm" id="btnTambahTopografi">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tableTopografi">
                <thead class="thead-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Tahun</th>
                        <th>Ketinggian (mdpl)</th>
                        <th>Suhu Rata-rata</th>
                        <th>Curah Hujan</th>
                        <th>Kondisi Permukaan</th>
                        <th>Kemiringan Tanah</th>
                        <th>Aliran Sungai</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal Topografi -->
<div class="modal fade" id="modalTopografi">
    <div class="modal-dialog modal-lg">
        <form id="formTopografi">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title">Form Topografi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="idTopografi">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tahun" maxlength="4" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ketinggian (mdpl)</label>
                                <input type="text" class="form-control" name="ketinggian_mdpl" placeholder="Contoh: 10 mdpl">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kondisi Permukaan</label>
                                <input type="text" class="form-control" name="kondisi_permukaan" placeholder="Contoh: Dataran Rendah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kemiringan Tanah</label>
                                <input type="text" class="form-control" name="kemiringan_tanah" placeholder="Contoh: 0-15°">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Aliran Sungai</label>
                                <input type="text" class="form-control" name="aliran_sungai" placeholder="Contoh: Sungai Siak">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Curah Hujan</label>
                                <input type="text" class="form-control" name="curah_hujan" placeholder="Contoh: 2000 mm/tahun">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Suhu Rata-rata</label>
                                <input type="text" class="form-control" name="suhu_rata_rata" placeholder="Contoh: 26-32°C">
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

    var baseUrl = '{{ admin_url("statistik-api/topografi") }}';

    var tableTopografi = $('#tableTopografi').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + '/datatables',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'tahun' },
            { data: 'ketinggian_mdpl' },
            { data: 'suhu_rata_rata' },
            { data: 'curah_hujan' },
            { data: 'kondisi_permukaan' },
            { data: 'kemiringan_tanah' },
            { data: 'aliran_sungai' },
            { data: 'action', orderable: false, searchable: false }
        ]
    });

    $('#btnTambahTopografi').click(function () {
        $('#formTopografi')[0].reset();
        $('#idTopografi').val('');
        $('#modalTopografi .modal-title').text('Tambah Data Topografi');
        $('#modalTopografi').modal('show');
    });

    $('#formTopografi').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl + '/store',
            type: 'POST',
            data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function () {
                $('#modalTopografi').modal('hide');
                tableTopografi.ajax.reload();
            },
            error: function (xhr) {
                alert('Terjadi kesalahan: ' + (xhr.responseJSON?.message || 'Unknown error'));
            }
        });
    });

    $(document).on('click', '.btn-edit-topografi', function () {
        let id = $(this).data('id');
        $.get(baseUrl + '/edit/' + id, function (res) {
            $('#idTopografi').val(res.id);
            $('#formTopografi [name=tahun]').val(res.tahun);
            $('#formTopografi [name=ketinggian_mdpl]').val(res.ketinggian_mdpl);
            $('#formTopografi [name=kondisi_permukaan]').val(res.kondisi_permukaan);
            $('#formTopografi [name=kemiringan_tanah]').val(res.kemiringan_tanah);
            $('#formTopografi [name=aliran_sungai]').val(res.aliran_sungai);
            $('#formTopografi [name=curah_hujan]').val(res.curah_hujan);
            $('#formTopografi [name=suhu_rata_rata]').val(res.suhu_rata_rata);
            $('#modalTopografi .modal-title').text('Edit Data Topografi');
            $('#modalTopografi').modal('show');
        });
    });

    $(document).on('click', '.btn-delete-topografi', function () {
        if (confirm('Yakin hapus data topografi ini?')) {
            let id = $(this).data('id');
            $.post(baseUrl + '/delete/' + id, {_token: '{{ csrf_token() }}'}, function () {
                tableTopografi.ajax.reload();
            });
        }
    });
});
</script>
