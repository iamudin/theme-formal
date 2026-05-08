@extends('cms::backend.layout.app', ['title' => 'Statistik Desa' . (request()->segment(3) ? ' › ' . ucfirst(request()->segment(3)) : '')])
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 style="font-weight:normal">
                <i class="fa fa-solid fa-chart-bar" aria-hidden="true"></i> Statistik Desa
                <div class="btn-group pull-right">
                    <a href="{{ route('panel.dashboard') }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-undo" aria-hidden="true"></i> Kembali
                    </a>
                </div>
            </h3>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">

            <!-- TAB -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ !request()->segment(3) || request()->segment(3) == 'dashboard' ? 'active' : '' }}"
                        href="{{ route('admin.statistik') }}">
                        <i class="fa fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(3) == 'dataumum' ? 'active' : '' }}"
                        href="{{ route('admin.statistik.type', 'dataumum') }}">
                        <i class="fa fa-info-circle"></i> Data Umum
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(3) == 'topografi' ? 'active' : '' }}"
                        href="{{ route('admin.statistik.type', 'topografi') }}">
                        <i class="fa fa-mountain"></i> Topografi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(3) == 'penduduk' ? 'active' : '' }}"
                        href="{{ route('admin.statistik.type', 'penduduk') }}">
                        <i class="fa fa-users"></i> Penduduk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(3) == 'monografi' ? 'active' : '' }}"
                        href="{{ route('admin.statistik.type', 'monografi') }}">
                        <i class="fa fa-file-alt"></i> Monografi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(3) == 'infografis' ? 'active' : '' }}"
                        href="{{ route('admin.statistik.type', 'infografis') }}">
                        <i class="fa fa-image"></i> Infografis
                    </a>
                </li>
            </ul>

            <div class="tab-content mt-3">

                <!-- DASHBOARD -->
                <div class="tab-pane fade {{ !request()->segment(3) || request()->segment(3) == 'dashboard' ? 'show active' : '' }}">
                    <div class="container-fluid mt-2">

                        <!-- Filter & Cetak PDF -->
                        <div class="card shadow-sm mb-3">
                            <div class="card-body py-2">
                                <form method="GET" action="{{ route('admin.statistik') }}" class="d-flex align-items-center flex-wrap" style="gap:10px;">
                                    <div class="d-flex align-items-center" style="gap:8px;">
                                        <label class="mb-0 font-weight-bold"><i class="fa fa-filter"></i> Filter Tahun:</label>
                                        <select name="tahun" class="form-control form-control-sm" style="width:140px;" onchange="this.form.submit()">
                                            <option value="">Semua Tahun</option>
                                            @foreach($tahunList ?? [] as $yr)
                                                <option value="{{ $yr }}" {{ ($tahun ?? '') == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="{{ admin_url('statistik-api/cetak-pdf') }}{{ $tahun ? '?tahun='.$tahun : '' }}" class="btn btn-danger btn-sm" target="_blank">
                                            <i class="fa fa-file-pdf"></i> Cetak PDF
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if($tahun ?? null)
                        <div class="alert alert-info py-2 mb-3">
                            <i class="fa fa-info-circle"></i> Menampilkan data tahun <strong>{{ $tahun }}</strong>.
                            <a href="{{ route('admin.statistik') }}" class="ml-2"><i class="fa fa-times"></i> Reset Filter</a>
                        </div>
                        @endif

                        <!-- Summary Cards -->
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="card border-left-primary shadow-sm h-100 py-2">
                                    <div class="card-body text-center">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penduduk</div>
                                        <div class="h4 mb-0 font-weight-bold">{{ number_format($stats['total_penduduk'] ?? 0) }}</div>
                                        <small class="text-muted">
                                            <i class="fa fa-male text-primary"></i> {{ number_format($stats['total_penduduk_laki'] ?? 0) }}
                                            &nbsp;
                                            <i class="fa fa-female text-danger"></i> {{ number_format($stats['total_penduduk_perempuan'] ?? 0) }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border-left-success shadow-sm h-100 py-2">
                                    <div class="card-body text-center">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Umum</div>
                                        <div class="h4 mb-0 font-weight-bold">{{ $stats['total_data_umum'] ?? 0 }}</div>
                                        <small class="text-muted">Record</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border-left-warning shadow-sm h-100 py-2">
                                    <div class="card-body text-center">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Monografi</div>
                                        <div class="h4 mb-0 font-weight-bold">{{ $stats['total_monografi'] ?? 0 }}</div>
                                        <small class="text-muted">Dokumen</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border-left-info shadow-sm h-100 py-2">
                                    <div class="card-body text-center">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Infografis</div>
                                        <div class="h4 mb-0 font-weight-bold">{{ $stats['total_infografis'] ?? 0 }}</div>
                                        <small class="text-muted">Gambar</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Umum Terbaru -->
                        @if($stats['data_umum_terbaru'] ?? null)
                        <div class="card shadow-sm mb-3">
                            <div class="card-header bg-white"><strong>Data Umum Terbaru ({{ $stats['data_umum_terbaru']->tahun }})</strong></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4"><strong>Tipologi:</strong> {{ $stats['data_umum_terbaru']->tipologi_desa ?? '-' }}</div>
                                    <div class="col-md-4"><strong>Perkembangan:</strong> {{ $stats['data_umum_terbaru']->tingkat_perkembangan ?? '-' }}</div>
                                    <div class="col-md-4"><strong>Luas Wilayah:</strong> {{ $stats['data_umum_terbaru']->luas_wilayah ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Chart Penduduk -->
                        <div class="card shadow-sm">
                            <div class="card-header bg-white"><strong><i class="fa fa-chart-bar"></i> Grafik Penduduk per Kategori</strong></div>
                            <div class="card-body">
                                <canvas id="chartDashboard" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DATA UMUM -->
                <div class="tab-pane fade {{ request()->segment(3) == 'dataumum' ? 'show active' : '' }}">
                    <div class="container-fluid mt-2">
                        @include(blade_path('admin.dataumum'))
                    </div>
                </div>

                <!-- TOPOGRAFI -->
                <div class="tab-pane fade {{ request()->segment(3) == 'topografi' ? 'show active' : '' }}">
                    <div class="container-fluid mt-2">
                        @include(blade_path('admin.topografi'))
                    </div>
                </div>

                <!-- PENDUDUK -->
                <div class="tab-pane fade {{ request()->segment(3) == 'penduduk' ? 'show active' : '' }}">
                    <div class="container-fluid mt-2">
                        @include(blade_path('admin.penduduk'))
                    </div>
                </div>

                <!-- MONOGRAFI -->
                <div class="tab-pane fade {{ request()->segment(3) == 'monografi' ? 'show active' : '' }}">
                    <div class="container-fluid mt-2">
                        @include(blade_path('admin.monografi'))
                    </div>
                </div>

                <!-- INFOGRAFIS -->
                <div class="tab-pane fade {{ request()->segment(3) == 'infografis' ? 'show active' : '' }}">
                    <div class="container-fluid mt-2">
                        @include(blade_path('admin.infografis'))
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Dashboard Chart -->
    @if(!request()->segment(3) || request()->segment(3) == 'dashboard')
    <script>
        $(document).ready(function () {
            var canvas = document.getElementById('chartDashboard');
            if (!canvas || canvas.offsetParent === null) return;

            var chartData = @json($stats['penduduk_per_kategori'] ?? []);
            if (chartData.length > 0) {
                new Chart(canvas, {
                    type: 'bar',
                    data: {
                        labels: chartData.map(d => d.kategori),
                        datasets: [
                            {
                                label: 'Laki-laki',
                                data: chartData.map(d => d.laki),
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Perempuan',
                                data: chartData.map(d => d.perempuan),
                                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: { y: { beginAtZero: true } }
                    }
                });
            } else {
                $(canvas).parent().html('<p class="text-muted text-center py-4"><i class="fa fa-info-circle"></i> Belum ada data penduduk. Silahkan tambah data pada tab Penduduk.</p>');
            }
        });
    </script>
    @endif

@endsection