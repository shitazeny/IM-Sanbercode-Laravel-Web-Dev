@extends('user.index')
@section('judultitle', 'Buku | User')
@section('konten')
<div class="container py-4">
    <h3 class="mb-4">📚 Data Buku</h3>

    <form action="{{ route('user.book') }}" method="GET" class="mb-4" style="max-width: 400px;">
        <input 
            type="text" 
            name="search" 
            placeholder="🔍 Cari buku..." 
            class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" 
            value="{{ request('search') }}"
        >
    </form>

    <div class="row g-4">
        @forelse($books as $book)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                @if($book->image)
                <img src="{{ asset($book->image) }}" class="card-img-top" alt="Cover {{ $book->title }}" style="height: 250px; object-fit: cover;">
                @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                    <span>Tidak ada gambar</span>
                </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p><strong>Genre:</strong> {{ $book->genre->name ?? '-' }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('user.book.detail', $book->id) }}" class="btn btn-info w-100" style="color: black;">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center text-muted fst-italic">Belum ada data buku.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
