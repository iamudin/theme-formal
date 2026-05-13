<?php

namespace App\Models;

use Leazycms\Web\Models\BaseModel;

class StatistikPenduduk extends BaseModel
{
    protected $table = 'statistik_penduduk';

    protected $fillable = [
        'kategori', 'label', 'kk', 'laki_laki', 'perempuan', 'jumlah', 'persentase', 'tahun',
    ];
}
