@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('page-heading', 'Dashboard Admin')

@section('content')

<div class="mb-4">
    <h1 class="admin-page-title mb-1">Dashboard Admin</h1>

    <p class="admin-muted mb-0">
        Selamat datang, {{ auth()->user()->name }}.
        Kelola konten dan aktivitas Galeri Investasi dari sini.
    </p>
</div>

<div class="admin-card p-4">
    <div class="d-flex align-items-start gap-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center"
            style="width: 48px; height: 48px; background: #e5f2e9; color: #176044;">
            <i class="bi bi-check-circle fs-4"></i>
        </div>

        <div>
            <h5 class="fw-semibold mb-1">Layout Admin Berhasil Dimuat</h5>

            <p class="admin-muted mb-0">
                Sidebar, navbar, dan footer sudah terhubung.
                Berikutnya kita akan membuat kartu statistik dan aktivitas terbaru.
            </p>
        </div>
    </div>
</div>

@endsection