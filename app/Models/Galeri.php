<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'tanggal_dokumentasi',
        'kegiatan_id',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_dokumentasi' => 'date',
        ];
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}