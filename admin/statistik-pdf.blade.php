<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Statistik Desa {{ $tahun ? '- Tahun ' . $tahun : '' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            color: #333;
            line-height: 1.5;
        }

        /* KOP SURAT */
        .kop {
            text-align: center;
            border-bottom: 3px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop h2 {
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }
        .kop h3 {
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 4px;
        }
        .kop p {
            font-size: 10px;
            color: #555;
        }

        /* SECTION HEADERS */
        .section-title {
            background-color: #2c3e50;
            color: #fff;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: bold;
            margin: 18px 0 8px 0;
            border-radius: 3px;
        }

        /* SUMMARY CARDS */
        .summary-row {
            width: 100%;
            margin-bottom: 15px;
        }
        .summary-row table {
            width: 100%;
            border-collapse: collapse;
        }
        .summary-card {
            text-align: center;
            padding: 10px 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 25%;
        }
        .summary-card .number {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
        }
        .summary-card .label {
            font-size: 9px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 3px;
        }
        .summary-card .detail {
            font-size: 9px;
            color: #999;
        }

        /* TABLES */
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 10px;
        }
        table.data-table th {
            background-color: #34495e;
            color: #fff;
            padding: 6px 8px;
            text-align: left;
            font-weight: bold;
        }
        table.data-table td {
            padding: 5px 8px;
            border-bottom: 1px solid #ddd;
        }
        table.data-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        table.data-table tr:hover {
            background-color: #ecf0f1;
        }

        /* FOOTER */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 8px;
            color: #aaa;
            border-top: 1px solid #ddd;
            padding: 5px 0;
        }

        /* INFO BOX */
        .info-box {
            background: #eaf4fc;
            border-left: 4px solid #3498db;
            padding: 8px 12px;
            margin-bottom: 12px;
            font-size: 10px;
        }
        .info-box strong { color: #2c3e50; }

        /* SIGNATURE */
        .signature {
            margin-top: 40px;
            text-align: right;
            padding-right: 40px;
        }
        .signature .date {
            margin-bottom: 60px;
            font-size: 10px;
        }
        .signature .name {
            font-weight: bold;
            font-size: 11px;
            border-bottom: 1px solid #333;
            display: inline-block;
            padding-bottom: 2px;
        }

        .page-break { page-break-after: always; }

        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .text-muted { color: #888; }
        .font-bold { font-weight: bold; }
    </style>
</head>
<body>

    <!-- KOP SURAT -->
    <div class="kop">
        <h2>PEMERINTAH DESA</h2>
        <h3>{{ strtoupper($siteName) }}</h3>
        <p>Laporan Statistik Desa {{ $tahun ? '— Tahun ' . $tahun : '— Semua Tahun' }}</p>
        <p>Dicetak pada: {{ now()->translatedFormat('d F Y, H:i') }} WIB</p>
    </div>

    @if($tahun)
    <div class="info-box">
        <strong><i>Filter aktif:</i></strong> Data ditampilkan untuk tahun <strong>{{ $tahun }}</strong>
    </div>
    @endif

    <!-- RINGKASAN -->
    <div class="section-title">RINGKASAN DATA</div>
    <div class="summary-row">
        <table>
            <tr>
                <td class="summary-card">
                    <div class="label">Total Penduduk</div>
                    <div class="number">{{ number_format($stats['total_penduduk'] ?? 0) }}</div>
                    <div class="detail">L: {{ number_format($stats['total_penduduk_laki'] ?? 0) }} | P: {{ number_format($stats['total_penduduk_perempuan'] ?? 0) }}</div>
                </td>
                <td class="summary-card">
                    <div class="label">Data Umum</div>
                    <div class="number">{{ $stats['total_data_umum'] ?? 0 }}</div>
                    <div class="detail">Record</div>
                </td>
                <td class="summary-card">
                    <div class="label">Topografi</div>
                    <div class="number">{{ $stats['total_topografi'] ?? 0 }}</div>
                    <div class="detail">Record</div>
                </td>
                <td class="summary-card">
                    <div class="label">Monografi</div>
                    <div class="number">{{ $stats['total_monografi'] ?? 0 }}</div>
                    <div class="detail">Dokumen</div>
                </td>
            </tr>
        </table>
    </div>

    <!-- DATA UMUM -->
    @if(($stats['data_umum_all'] ?? collect())->count() > 0)
    <div class="section-title">DATA UMUM DESA</div>
    <table class="data-table">
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Tahun</th>
                <th>Tipologi Desa</th>
                <th>Tingkat Perkembangan</th>
                <th>Luas Wilayah</th>
                <th>UMR Kabupaten</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stats['data_umum_all'] as $i => $row)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $row->tahun }}</td>
                <td>{{ $row->tipologi_desa ?? '-' }}</td>
                <td>{{ $row->tingkat_perkembangan ?? '-' }}</td>
                <td>{{ $row->luas_wilayah ?? '-' }}</td>
                <td>{{ $row->umr_kabupaten ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @php $du = $stats['data_umum_all']->first(); @endphp
    @if($du)
    <table class="data-table" style="margin-top:5px;">
        <tr><th width="150">Batas Utara</th><td>{{ $du->batas_utara ?? '-' }}</td><th width="150">Batas Selatan</th><td>{{ $du->batas_selatan ?? '-' }}</td></tr>
        <tr><th>Batas Barat</th><td>{{ $du->batas_barat ?? '-' }}</td><th>Batas Timur</th><td>{{ $du->batas_timur ?? '-' }}</td></tr>
        <tr><th>Jarak ke Kecamatan</th><td>{{ $du->jarak_kecamatan ?? '-' }}</td><th>Waktu Tempuh</th><td>{{ $du->waktu_kecamatan ?? '-' }}</td></tr>
        <tr><th>Jarak ke Kabupaten</th><td>{{ $du->jarak_kabupaten ?? '-' }}</td><th>Waktu Tempuh</th><td>{{ $du->waktu_kabupaten ?? '-' }}</td></tr>
        <tr><th>Jarak ke Provinsi</th><td>{{ $du->jarak_provinsi ?? '-' }}</td><th>Waktu Tempuh</th><td>{{ $du->waktu_provinsi ?? '-' }}</td></tr>
    </table>
    @endif
    @endif

    <!-- TOPOGRAFI -->
    @if(($stats['topografi_all'] ?? collect())->count() > 0)
    <div class="section-title">DATA TOPOGRAFI</div>
    <table class="data-table">
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Tahun</th>
                <th>Ketinggian (mdpl)</th>
                <th>Kondisi Permukaan</th>
                <th>Kemiringan Tanah</th>
                <th>Aliran Sungai</th>
                <th>Curah Hujan</th>
                <th>Suhu Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stats['topografi_all'] as $i => $row)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $row->tahun }}</td>
                <td>{{ $row->ketinggian_mdpl ?? '-' }}</td>
                <td>{{ $row->kondisi_permukaan ?? '-' }}</td>
                <td>{{ $row->kemiringan_tanah ?? '-' }}</td>
                <td>{{ $row->aliran_sungai ?? '-' }}</td>
                <td>{{ $row->curah_hujan ?? '-' }}</td>
                <td>{{ $row->suhu_rata_rata ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    <!-- PENDUDUK -->
    @if(($stats['penduduk_all'] ?? collect())->count() > 0)
    <div class="section-title">DATA KEPENDUDUKAN</div>
    <table class="data-table">
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Kategori</th>
                <th>Label</th>
                <th class="text-right">KK</th>
                <th class="text-right">Laki-laki</th>
                <th class="text-right">Perempuan</th>
                <th class="text-right">Jumlah</th>
                <th class="text-right">%</th>
                <th>Tahun</th>
            </tr>
        </thead>
        <tbody>
            @php $totalL = 0; $totalP = 0; $totalJ = 0; $totalKK = 0; @endphp
            @foreach($stats['penduduk_all'] as $i => $row)
            @php $totalL += $row->laki_laki; $totalP += $row->perempuan; $totalJ += $row->jumlah; $totalKK += $row->kk; @endphp
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $row->kategori }}</td>
                <td>{{ $row->label ?? '-' }}</td>
                <td class="text-right">{{ number_format($row->kk) }}</td>
                <td class="text-right">{{ number_format($row->laki_laki) }}</td>
                <td class="text-right">{{ number_format($row->perempuan) }}</td>
                <td class="text-right">{{ number_format($row->jumlah) }}</td>
                <td class="text-right">{{ $row->persentase }}%</td>
                <td>{{ $row->tahun }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="background:#2c3e50; color:#fff; font-weight:bold;">
                <td colspan="3">TOTAL</td>
                <td class="text-right">{{ number_format($totalKK) }}</td>
                <td class="text-right">{{ number_format($totalL) }}</td>
                <td class="text-right">{{ number_format($totalP) }}</td>
                <td class="text-right">{{ number_format($totalJ) }}</td>
                <td colspan="2"></td>
            </tr>
        </tfoot>
    </table>

    <!-- Rekap per Kategori -->
    @if(($stats['penduduk_per_kategori'] ?? collect())->count() > 0)
    <div class="section-title" style="background:#16a085;">REKAPITULASI PER KATEGORI</div>
    <table class="data-table">
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Kategori</th>
                <th class="text-right">Laki-laki</th>
                <th class="text-right">Perempuan</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stats['penduduk_per_kategori'] as $i => $row)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td class="font-bold">{{ $row->kategori }}</td>
                <td class="text-right">{{ number_format($row->laki) }}</td>
                <td class="text-right">{{ number_format($row->perempuan) }}</td>
                <td class="text-right font-bold">{{ number_format($row->total) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @endif

    <!-- TANDA TANGAN -->
    <div class="signature">
        <div class="date">{{ now()->translatedFormat('d F Y') }}</div>
        <div>Mengetahui,</div>
        <div style="margin-top:5px;">Kepala Desa</div>
        <br><br><br>
        <div class="name">( ........................................ )</div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        Dokumen ini dicetak secara otomatis oleh sistem {{ $siteName }} — {{ now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>
