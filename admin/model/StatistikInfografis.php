<?php

namespace App\Models;

use Leazycms\Web\Models\BaseModel;

class StatistikInfografis extends BaseModel
{
    protected $table = 'statistik_infografis';

    protected $fillable = [
        'judul', 'deskripsi', 'gambar',
    ];
}
