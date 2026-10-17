<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaArtikel;
use App\Models\Materi;
use App\Models\Kegiatan;
use App\Models\PesertaKegiatan;
use App\Models\Galeri;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Statistik konten dari database
        $statistik = [
            'berita' => BeritaArtikel::count(),
            'materi' => Materi::count(),
            'kegiatan' => Kegiatan::count(),
            'peserta' => PesertaKegiatan::count(),
            'galeri' => Galeri::count(),
        ];

        // Mengambil aktivitas terbaru dari masing-masing tabel
        $aktivitas = collect();

        $models = [
            ['model' => BeritaArtikel::class, 'label' => 'Berita & Artikel'],
            ['model' => Materi::class, 'label' => 'Materi Edukasi'],
            ['model' => Kegiatan::class, 'label' => 'Kegiatan'],
            ['model' => PesertaKegiatan::class, 'label' => 'Peserta Kegiatan'],
            ['model' => Galeri::class, 'label' => 'Galeri'],
        ];

        foreach ($models as $item) {
            $data = $item['model']::query()
                ->latest('created_at')
                ->limit(5)
                ->get(['id', 'created_at']);

            foreach ($data as $record) {
                $aktivitas->push([
                    'jenis' => $item['label'],
                    'id' => $record->id,
                    'waktu' => $record->created_at,
                ]);
            }
        }

        $aktivitas = $aktivitas
            ->sortByDesc('waktu')
            ->take(10)
            ->values();

        return view('admin.dashboard', compact(
            'statistik',
            'aktivitas'
        ));
    }
}