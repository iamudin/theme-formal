<?php

namespace App\Models;

use Leazycms\Web\Models\BaseModel;

class StatistikTopografi extends BaseModel
{
    protected $table = 'statistik_topografi';

    protected $fillable = [
        'tahun', 'ketinggian_mdpl', 'kondisi_permukaan', 'kemiringan_tanah',
        'aliran_sungai', 'curah_hujan', 'suhu_rata_rata',
    ];
}
