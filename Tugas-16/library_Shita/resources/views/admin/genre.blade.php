@extends('admin.index')
@section('judultitle', 'Genre | Admin')
@section('konten')
<div class="container py-4">

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h3 style="margin-top: 40px;">Data Genre</h3>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <form action="{{ route('admin.genre') }}" method="GET" class="d-flex flex-grow-1 me-2" style="max-width: 400px;">
            <div class="input-group shadow-sm">
                <input type="text" name="search" class="form-control" placeholder="Cari genre..." value="{{ request('search') }}">
                <button class="btn text-white" style="background-color: #003366;" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>

        <button class="btn text-white shadow-sm" data-bs-toggle="modal" data-bs-target="#modalGenreTambah" style="background-color: #003366;">
            <i class="bi bi-plus-circle me-1"></i> Tambah Genre
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="color: white; text-align: center;">No</th>
                    <th style="color: white; text-align: center;">Nama</th>
                    <th style="color: white; text-align: center;">Deskripsi</th>
                    <th style="color: white; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data_genre as $index => $genre)
                <tr>
                    <td class="align-middle" style="text-align: center;">{{ $index + 1 }}</td>
                    <td class="align-middle">{{ $genre->name }}</td>
                    <td class="align-middle">{{ $genre->description }}</td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalGenreEdit{{ $genre->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <div class="modal fade" id="modalGenreEdit{{ $genre->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $genre->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.genre.edit', $genre->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Genre</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $genre->name }}" required>
                                                </div>
                                                <div class="mb-3 text-start">
                                                    <label class="form-label">Deskripsi</label>
                                                    <input type="text" name="description" class="form-control" value="{{ $genre->description }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <form id="delete-form-{{ $genre->id }}" action="{{ route('admin.genre.delete', $genre->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" id="" class="btn btn-sm btn-danger" data-id="{{ $genre->id }}" data-name="{{ $genre->name }}">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
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

<div class="modal fade" id="modalGenreTambah" tabindex="-1" aria-labelledby="modalGenreTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.genre.add') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGenreTambahLabel">Tambah Genre</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-start">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama genre" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" name="description" class="form-control" placeholder="Masukkan deskripsi genre" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
          </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-danger').forEach(button => {
        button.addEventListener('click', function () {
            const genreId = this.getAttribute('data-id');
            const genreName = this.getAttribute('data-name');

            Swal.fire({
                title: 'Kamu yakin?',
                text: `Genre "${genreName}" akan dihapus!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${genreId}`).submit();
                }
            });
        });
    });
</script>
@endsection
