<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaKegiatan extends Model
{
    use HasFactory;

    protected $table = 'peserta_kegiatans';

    protected $fillable = [
        'kegiatan_id',
        'nama_peserta',
        'email',
        'nomor_hp',
        'instansi',
        'status',
        'tanggal_daftar',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_daftar' => 'datetime',
        ];
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}