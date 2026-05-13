<?php

namespace App\Models;

use Leazycms\Web\Models\BaseModel;

class StatistikDataUmum extends BaseModel
{
    protected $table = 'statistik_data_umum';

    protected $fillable = [
        'tahun', 'tipologi_desa', 'tingkat_perkembangan', 'luas_wilayah', 'umr_kabupaten',
        'batas_utara', 'batas_selatan', 'batas_barat', 'batas_timur',
        'jarak_kecamatan', 'jarak_kabupaten', 'jarak_provinsi',
        'waktu_kecamatan', 'waktu_kabupaten', 'waktu_provinsi',
    ];

  
}
