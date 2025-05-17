@extends('admin.index')
@section('judultitle', 'Home | Admin')
@section('konten')
<style>
    .card-link {
        background-color: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.04);
        cursor: pointer;
    }

    .card-link:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    }

    .card-icon {
        font-size: 36px;
        margin-bottom: 12px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .card-desc {
        font-size: 14px;
        color: #6b7280;
    }

    .section-title {
        font-size: 24px;
        font-weight: bold;
        color: #111827;
        margin-bottom: 24px;
    }

    .admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 24px;
    }

    .container {
        padding: 2rem;
    }
</style>

<div class="container">
    <h2 class="section-title">⚙️ Akses Cepat Fitur Admin</h2>

    <div class="admin-grid">
        <a href="{{ route('admin.book') }}" class="card-link">
            <div class="card-icon text-blue-500">📚</div>
            <div class="card-title">Kelola Buku</div>
            <div class="card-desc">Tambah, edit, atau hapus buku koleksi.</div>
        </a>

        <a href="{{ route('admin.user') }}" class="card-link">
            <div class="card-icon text-green-500">👤</div>
            <div class="card-title">Kelola Pengguna</div>
            <div class="card-desc">Lihat dan atur data pengguna.</div>
        </a>

        <a href="{{ route('admin.comments') }}" class="card-link">
            <div class="card-icon text-yellow-500">💬</div>
            <div class="card-title">Komentar Buku</div>
            <div class="card-desc">Moderasi dan tanggapi komentar buku.</div>
        </a>

        <a href="{{ route('admin.genre') }}" class="card-link">
            <div class="card-icon text-purple-500">🗂️</div>
            <div class="card-title">Data Genre</div>
            <div class="card-desc">Atur kategori atau genre buku.</div>
        </a>
    </div>
</div>
@endsection
