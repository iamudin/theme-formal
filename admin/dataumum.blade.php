<div class="card shadow-sm border-0">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Umum</h5>

        <button class="btn btn-primary btn-sm" id="btnTambahUmum">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tableDataUmum">
                <thead class="thead-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Tahun</th>
                        <th>Tipologi Desa</th>
                        <th>Tingkat Perkembangan</th>
                        <th>Luas Wilayah</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</div>
<div class="modal fade" id="modalFormUmum">

    <div class="modal-dialog modal-lg">
        <form id="formDataUmum">

            <div class="modal-content border-0">

                <div class="modal-header">
                    <h5 class="modal-title">Form Data Umum</h5>

                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id" id="idUmum">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tahun" maxlength="4" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipologi Desa</label>
                                <input type="text" class="form-control" name="tipologi_desa" placeholder="Contoh: Persawahan, Perkebunan">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tingkat Perkembangan</label>
                                <input type="text" class="form-control" name="tingkat_perkembangan" placeholder="Contoh: Swasembada, Swakarya">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Luas Wilayah</label>
                                <input type="text" class="form-control" name="luas_wilayah" placeholder="Contoh: 12.5 km²">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>UMR Kabupaten</label>
                                <input type="text" class="form-control" name="umr_kabupaten">
                            </div>
                        </div>

                    </div>

                    <hr>
                    <h6 class="font-weight-bold text-muted mb-3"><i class="fa fa-map-marker-alt"></i> Batas Wilayah</h6>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Utara</label>
                                <input type="text" class="form-control" name="batas_utara">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Selatan</label>
                                <input type="text" class="form-control" name="batas_selatan">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Barat</label>
                                <input type="text" class="form-control" name="batas_barat">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Timur</label>
                                <input type="text" class="form-control" name="batas_timur">
                            </div>
                        </div>

                    </div>

                    <hr>
                    <h6 class="font-weight-bold text-muted mb-3"><i class="fa fa-road"></i> Jarak ke Pusat Pemerintahan</h6>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jarak ke Kecamatan</label>
                                <input type="text" class="form-control" name="jarak_kecamatan" placeholder="Contoh: 5 km">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jarak ke Kabupaten</label>
                                <input type="text" class="form-control" name="jarak_kabupaten" placeholder="Contoh: 30 km">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jarak ke Provinsi</label>
                                <input type="text" class="form-control" name="jarak_provinsi" placeholder="Contoh: 150 km">
                            </div>
                        </div>

                    </div>

                    <hr>
                    <h6 class="font-weight-bold text-muted mb-3"><i class="fa fa-clock"></i> Waktu Tempuh</h6>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Waktu ke Kecamatan</label>
                                <input type="text" class="form-control" name="waktu_kecamatan" placeholder="Contoh: 15 menit">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Waktu ke Kabupaten</label>
                                <input type="text" class="form-control" name="waktu_kabupaten" placeholder="Contoh: 1 jam">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Waktu ke Provinsi</label>
                                <input type="text" class="form-control" name="waktu_provinsi" placeholder="Contoh: 3 jam">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>

            </div>

        </form>
    </div>

</div>

<script>
    $(document).ready(function(){

        var baseUrl = '{{ admin_url("statistik-api/data-umum") }}';

        var tableUmum = $('#tableDataUmum').DataTable({
            processing: true,
            serverSide: true,
            ajax: baseUrl + '/datatables',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'tahun' },
                { data: 'tipologi_desa' },
                { data: 'tingkat_perkembangan' },
                { data: 'luas_wilayah' },
                { data: 'action', orderable: false, searchable: false }
            ]
        });

        $('#btnTambahUmum').click(function () {
            $('#formDataUmum')[0].reset();
            $('#idUmum').val('');
            $('#modalFormUmum .modal-title').text('Tambah Data Umum');
            $('#modalFormUmum').modal('show');
        });

        $('#formDataUmum').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: baseUrl + '/store',
                type: 'POST',
                data: $(this).serialize(),
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function (res) {
                    $('#modalFormUmum').modal('hide');
                    tableUmum.ajax.reload();
                    alert('Data berhasil disimpan!');
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan: ' + (xhr.responseJSON?.message || 'Unknown error'));
                }
            });
        });

        $(document).on('click', '.btn-edit', function () {
            let id = $(this).data('id');
            $.get(baseUrl + '/edit/' + id, function (res) {
                $('#idUmum').val(res.id);
                $('[name=tahun]', '#formDataUmum').val(res.tahun);
                $('[name=tipologi_desa]').val(res.tipologi_desa);
                $('[name=tingkat_perkembangan]').val(res.tingkat_perkembangan);
                $('[name=luas_wilayah]').val(res.luas_wilayah);
                $('[name=umr_kabupaten]').val(res.umr_kabupaten);
                $('[name=batas_utara]').val(res.batas_utara);
                $('[name=batas_selatan]').val(res.batas_selatan);
                $('[name=batas_barat]').val(res.batas_barat);
                $('[name=batas_timur]').val(res.batas_timur);
                $('[name=jarak_kecamatan]').val(res.jarak_kecamatan);
                $('[name=jarak_kabupaten]').val(res.jarak_kabupaten);
                $('[name=jarak_provinsi]').val(res.jarak_provinsi);
                $('[name=waktu_kecamatan]').val(res.waktu_kecamatan);
                $('[name=waktu_kabupaten]').val(res.waktu_kabupaten);
                $('[name=waktu_provinsi]').val(res.waktu_provinsi);
                $('#modalFormUmum .modal-title').text('Edit Data Umum');
                $('#modalFormUmum').modal('show');
            });
        });

        $(document).on('click', '.btn-delete', function () {
            if (confirm('Yakin hapus data ini?')) {
                let id = $(this).data('id');
                $.post(baseUrl + '/delete/' + id, {_token: '{{ csrf_token() }}'}, function () {
                    tableUmum.ajax.reload();
                    alert('Data berhasil dihapus!');
                });
            }
        });

    });
</script>