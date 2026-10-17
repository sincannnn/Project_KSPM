<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';

    protected $fillable = [
        'nama_kegiatan',
        'slug',
        'deskripsi',
        'gambar',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'kuota',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'datetime',
            'tanggal_selesai' => 'datetime',
        ];
    }

    public function peserta()
    {
        return $this->hasMany(PesertaKegiatan::class, 'kegiatan_id');
    }
}