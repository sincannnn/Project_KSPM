<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'deskripsi',
        'gambar',
        'file_materi',
        'status',
    ];
}