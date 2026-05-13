<?php

namespace App\Models;

use Leazycms\Web\Models\BaseModel;

class StatistikMonografi extends BaseModel
{
    protected $table = 'statistik_monografi';

    protected $fillable = [
        'judul', 'deskripsi', 'tahun', 'file',
    ];
}
