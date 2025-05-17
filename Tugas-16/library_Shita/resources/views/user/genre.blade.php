@extends('user.index')
@section('judultitle', 'Genre | User')
@section('konten')
<div class="container py-4">
    <h3 class="mb-4">📚 Data Genre</h3>

    <form action="{{ route('user.genre') }}" method="GET" class="mb-4" style="max-width: 400px;">
        <div class="mb-4" style="margin-bottom: 20px; margin-top: 20px;">
            <input type="text" name="search" id="searchInput" placeholder="🔍 Cari buku..." class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" style="color: white;">No</th>
                    <th class="text-center" style="color: white;">Nama</th>
                    <th class="text-center" style="color: white;">Deskripsi</th>
                    <th class="text-center" style="color: white;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($genres as $index => $genre)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>{{ $genre->description }}</td>
                    <td class="text-center">
                        <button 
                            class="btn btn-sm btn-info text-white" 
                            onclick="showDetail('{{ $genre->name }}', '{{ $genre->description }}')"
                        >
                            <i class="bi bi-eye"></i> Lihat
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted fst-italic">Belum ada data genre.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalDetailGenre" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="genreModalTitle" class="modal-title">Detail Genre</h5>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> <span id="genreName"></span></p>
                <p><strong>Deskripsi:</strong> <span id="genreDesc"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showDetail(name, description) {
        document.getElementById('genreName').innerText = name;
        document.getElementById('genreDesc').innerText = description;
        new bootstrap.Modal(document.getElementById('modalDetailGenre')).show();
    }
</script>
@endsection
