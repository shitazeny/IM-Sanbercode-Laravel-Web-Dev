@extends('index')
@section('judultitle', 'Buku')
@section('konten')

<div class="container py-4">
    <h3 class="mb-4">📚 Data Buku</h3>

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
                        <button 
                            class="btn btn-info w-100" 
                            data-bs-toggle="modal" 
                            data-bs-target="#bookModal{{ $book->id }}">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bookModal{{ $book->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $book->title }}</h5>
                    </div>
                    <div class="modal-body">
                        <p><strong>Judul:</strong> {{ $book->title }}</p>
                        <p><strong>Genre:</strong> {{ $book->genre->name ?? '-' }}</p>
                        <p><strong>Stok:</strong> {{ $book->stok }}</p>
                        <p><strong>Summary:</strong></p>
                        <p>{{ $book->summary }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
