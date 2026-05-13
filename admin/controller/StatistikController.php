<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\StatistikDataUmum;
use App\Models\StatistikTopografi;
use App\Models\StatistikPenduduk;
use App\Models\StatistikMonografi;
use App\Models\StatistikInfografis;

class StatistikController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun');
        $tahunList = $this->getAvailableYears();
        $stats = $this->getDashboardStats($tahun);
        return view(blade_path('admin.statistik'), compact('stats', 'tahunList', 'tahun'));
    }

    public function type($type, Request $request)
    {
        $tahun = $request->get('tahun');
        $tahunList = $this->getAvailableYears();
        $stats = $this->getDashboardStats($tahun);
        return view(blade_path('admin.statistik'), compact('type', 'stats', 'tahunList', 'tahun'));
    }

    /**
     * Get all available years from all statistik tables
     */
    private function getAvailableYears()
    {
        $years = collect();
        $years = $years->merge(StatistikDataUmum::distinct()->pluck('tahun'));
        $years = $years->merge(StatistikTopografi::distinct()->pluck('tahun'));
        $years = $years->merge(StatistikPenduduk::distinct()->pluck('tahun'));
        $years = $years->merge(StatistikMonografi::distinct()->pluck('tahun'));
        return $years->unique()->filter()->sortDesc()->values();
    }

    /**
     * Dashboard summary stats with optional year filter
     */
    private function getDashboardStats($tahun = null)
    {
        $pendudukQuery = StatistikPenduduk::query();
        $dataUmumQuery = StatistikDataUmum::query();
        $topografiQuery = StatistikTopografi::query();
        $monografiQuery = StatistikMonografi::query();

        if ($tahun) {
            $pendudukQuery = $pendudukQuery->where('tahun', $tahun);
            $dataUmumQuery = $dataUmumQuery->where('tahun', $tahun);
            $topografiQuery = $topografiQuery->where('tahun', $tahun);
            $monografiQuery = $monografiQuery->where('tahun', $tahun);
        }

        return [
            'total_penduduk_laki' => (clone $pendudukQuery)->sum('laki_laki'),
            'total_penduduk_perempuan' => (clone $pendudukQuery)->sum('perempuan'),
            'total_penduduk' => (clone $pendudukQuery)->sum('jumlah'),
            'total_data_umum' => (clone $dataUmumQuery)->count(),
            'total_topografi' => (clone $topografiQuery)->count(),
            'total_monografi' => (clone $monografiQuery)->count(),
            'total_infografis' => StatistikInfografis::count(),
            'penduduk_per_kategori' => (clone $pendudukQuery)
                ->selectRaw('kategori, SUM(laki_laki) as laki, SUM(perempuan) as perempuan, SUM(jumlah) as total')
                ->groupBy('kategori')
                ->get(),
            'data_umum_terbaru' => $tahun
                ? (clone $dataUmumQuery)->first()
                : StatistikDataUmum::orderByDesc('tahun')->first(),
            'data_umum_all' => (clone $dataUmumQuery)->orderByDesc('tahun')->get(),
            'topografi_all' => (clone $topografiQuery)->orderByDesc('tahun')->get(),
            'penduduk_all' => (clone $pendudukQuery)->orderByDesc('tahun')->get(),
        ];
    }

    /**
     * Cetak PDF laporan statistik desa
     */
    public function cetakPdf(Request $request)
    {
        $tahun = $request->get('tahun');
        $stats = $this->getDashboardStats($tahun);
        $siteName = get_option('site_title') ?? 'Statistik Desa';
        $logo = get_option('logo') ? public_path(ltrim(get_option('logo'), '/')) : null;

        $html = view(blade_path('admin.statistik-pdf'), compact('stats', 'tahun', 'siteName', 'logo'))->render();

        $pdf = Pdf::loadHTML($html)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif',
            ]);

        $filename = 'Laporan_Statistik_Desa' . ($tahun ? '_' . $tahun : '') . '_' . date('Ymd_His') . '.pdf';
        return $pdf->download($filename);
    }

    // =========================================
    // DATA UMUM CRUD
    // =========================================
    public function dataUmumDatatables(Request $request)
    {
        $query = StatistikDataUmum::orderByDesc('tahun');

        // Search
        $search = $request->input('search.value', '');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('tahun', 'like', "%{$search}%")
                  ->orWhere('tipologi_desa', 'like', "%{$search}%")
                  ->orWhere('tingkat_perkembangan', 'like', "%{$search}%");
            });
        }

        $total = StatistikDataUmum::count();
        $filtered = $query->count();

        // Pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $data = $query->skip($start)->take($length)->get();

        $rows = [];
        foreach ($data as $i => $row) {
            $rows[] = [
                'DT_RowIndex' => $start + $i + 1,
                'tahun' => $row->tahun,
                'tipologi_desa' => $row->tipologi_desa,
                'tingkat_perkembangan' => $row->tingkat_perkembangan,
                'luas_wilayah' => $row->luas_wilayah,
                'action' => '<button class="btn btn-sm btn-warning btn-edit" data-id="'.$row->id.'"><i class="fa fa-edit"></i></button>
                             <button class="btn btn-sm btn-danger btn-delete" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button>',
            ];
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $rows,
        ]);
    }

    public function dataUmumStore(Request $request)
    {
        $data = $request->only([
            'tahun', 'tipologi_desa', 'tingkat_perkembangan', 'luas_wilayah', 'umr_kabupaten',
            'batas_utara', 'batas_selatan', 'batas_barat', 'batas_timur',
            'jarak_kecamatan', 'jarak_kabupaten', 'jarak_provinsi',
            'waktu_kecamatan', 'waktu_kabupaten', 'waktu_provinsi',
        ]);

        if ($request->id) {
            StatistikDataUmum::where('id', $request->id)->update($data);
        } else {
            StatistikDataUmum::create($data);
        }

        return response()->json(['success' => true]);
    }

    public function dataUmumEdit($id)
    {
        return response()->json(StatistikDataUmum::findOrFail($id));
    }

    public function dataUmumDelete($id)
    {
        StatistikDataUmum::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    // =========================================
    // TOPOGRAFI CRUD
    // =========================================
    public function topografiDatatables(Request $request)
    {
        $query = StatistikTopografi::orderByDesc('tahun');
        $search = $request->input('search.value', '');
        if ($search) {
            $query->where('tahun', 'like', "%{$search}%");
        }

        $total = StatistikTopografi::count();
        $filtered = $query->count();
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $data = $query->skip($start)->take($length)->get();

        $rows = [];
        foreach ($data as $i => $row) {
            $rows[] = [
                'DT_RowIndex' => $start + $i + 1,
                'tahun' => $row->tahun,
                'ketinggian_mdpl' => $row->ketinggian_mdpl,
                'suhu_rata_rata' => $row->suhu_rata_rata,
                'curah_hujan' => $row->curah_hujan,
                'kondisi_permukaan' => $row->kondisi_permukaan,
                'kemiringan_tanah' => $row->kemiringan_tanah,
                'aliran_sungai' => $row->aliran_sungai,
                'action' => '<button class="btn btn-sm btn-warning btn-edit-topografi" data-id="'.$row->id.'"><i class="fa fa-edit"></i></button>
                             <button class="btn btn-sm btn-danger btn-delete-topografi" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button>',
            ];
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $rows,
        ]);
    }

    public function topografiStore(Request $request)
    {
        $data = $request->only([
            'tahun', 'ketinggian_mdpl', 'kondisi_permukaan', 'kemiringan_tanah',
            'aliran_sungai', 'curah_hujan', 'suhu_rata_rata',
        ]);
        if ($request->id) {
            StatistikTopografi::where('id', $request->id)->update($data);
        } else {
            StatistikTopografi::create($data);
        }
        return response()->json(['success' => true]);
    }

    public function topografiEdit($id)
    {
        return response()->json(StatistikTopografi::findOrFail($id));
    }

    public function topografiDelete($id)
    {
        StatistikTopografi::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    // =========================================
    // PENDUDUK CRUD
    // =========================================
    public function pendudukDatatables(Request $request)
    {
        $query = StatistikPenduduk::orderByDesc('tahun');
        $search = $request->input('search.value', '');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kategori', 'like', "%{$search}%")
                  ->orWhere('tahun', 'like', "%{$search}%");
            });
        }

        $total = StatistikPenduduk::count();
        $filtered = $query->count();
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $data = $query->skip($start)->take($length)->get();

        $rows = [];
        foreach ($data as $i => $row) {
            $rows[] = [
                'DT_RowIndex' => $start + $i + 1,
                'kategori' => $row->kategori,
                'label' => $row->label,
                'kk' => number_format($row->kk),
                'laki_laki' => number_format($row->laki_laki),
                'perempuan' => number_format($row->perempuan),
                'jumlah' => number_format($row->jumlah),
                'persentase' => $row->persentase . '%',
                'tahun' => $row->tahun,
                'action' => '<button class="btn btn-sm btn-warning btn-edit-penduduk" data-id="'.$row->id.'"><i class="fa fa-edit"></i></button>
                             <button class="btn btn-sm btn-danger btn-delete-penduduk" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button>',
            ];
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $rows,
        ]);
    }

    public function pendudukStore(Request $request)
    {
        $data = $request->only(['kategori', 'label', 'kk', 'laki_laki', 'perempuan', 'persentase', 'tahun']);
        $data['jumlah'] = intval($request->laki_laki) + intval($request->perempuan);

        if ($request->id) {
            StatistikPenduduk::where('id', $request->id)->update($data);
        } else {
            StatistikPenduduk::create($data);
        }
        return response()->json(['success' => true]);
    }

    public function pendudukEdit($id)
    {
        return response()->json(StatistikPenduduk::findOrFail($id));
    }

    public function pendudukDelete($id)
    {
        StatistikPenduduk::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function pendudukChart()
    {
        $data = StatistikPenduduk::selectRaw('kategori, SUM(laki_laki) as laki, SUM(perempuan) as perempuan')
            ->groupBy('kategori')
            ->get();

        return response()->json($data);
    }

    // =========================================
    // MONOGRAFI CRUD
    // =========================================
    public function monografiDatatables(Request $request)
    {
        $query = StatistikMonografi::orderByDesc('tahun');
        $search = $request->input('search.value', '');
        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        $total = StatistikMonografi::count();
        $filtered = $query->count();
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $data = $query->skip($start)->take($length)->get();

        $rows = [];
        foreach ($data as $i => $row) {
            $fileLink = $row->file ? '<a href="'.media($row->file)->url().'" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Unduh</a>' : '-';
            $rows[] = [
                'DT_RowIndex' => $start + $i + 1,
                'judul' => $row->judul,
                'deskripsi' => Str::limit($row->deskripsi, 60),
                'tahun' => $row->tahun,
                'file' => $fileLink,
                'action' => '<button class="btn btn-sm btn-danger btn-delete-monografi" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button>',
            ];
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $rows,
        ]);
    }

    public function monografiStore(Request $request)
    {
        $data = $request->only(['judul', 'deskripsi', 'tahun']);

   

        if ($request->id) {
            $find = StatistikMonografi::findOrFail($request->id);
            
        } else {

            $find = StatistikMonografi::create($data);
           
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file = $find->addFile([
                'file' => $file,
                'mime_type' => ['image/jpeg', 'image/png', 'application/pdf','word/doc','application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
                'description' => $request->deskripsi,
                'purpose' => 'monografi_' . $find->id,
            ]);
            $data['file'] = $file;
        }
        $find->update($data);

        return response()->json(['success' => true]);
    }

    public function monografiDelete($id)
    {
        StatistikMonografi::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    // =========================================
    // INFOGRAFIS CRUD
    // =========================================
    public function infografisDatatables(Request $request)
    {
        $query = StatistikInfografis::orderByDesc('id');
        $search = $request->input('search.value', '');
        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        $total = StatistikInfografis::count();
        $filtered = $query->count();
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $data = $query->skip($start)->take($length)->get();

        $rows = [];
        foreach ($data as $i => $row) {
            $imgTag = $row->gambar ? '<img src="'.media($row->gambar)->url().'" style="max-height:60px; border-radius:4px;">' : '-';
            $rows[] = [
                'DT_RowIndex' => $start + $i + 1,
                'judul' => $row->judul,
                'deskripsi' => Str::limit($row->deskripsi, 60),
                'gambar' => $imgTag,
                'action' => '<button class="btn btn-sm btn-danger btn-delete-infografis" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button>',
            ];
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $rows,
        ]);
    }

    public function infografisStore(Request $request)
    {
        $data = $request->only(['judul', 'deskripsi']);

       

        if ($request->id) {
            $find = StatistikInfografis::findOrFail($request->id);
          
        } else {
           $find =  StatistikInfografis::create($data);
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file = $find->addFile([
                'file' => $file,
                'mime_type' => ['image/jpeg', 'image/png', 'application/pdf','word/doc','application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
                'description' => $request->deskripsi,
                'purpose' => 'infografis_' . $find->id,
            ]);

            $data['gambar'] = $file;

        }
        $find->update($data);

        return response()->json(['success' => true]);
    }

    public function infografisDelete($id)
    {
        StatistikInfografis::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}