@extends('layout.master')
@section('judultitle', 'Data Genre')
@section('konten')
  <div class="container py-4">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <form action="{{ route('genre') }}" method="GET" class="d-flex flex-grow-1 me-2" style="max-width: 400px;">
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
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data_genre as $index => $genre)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>{{ $genre->description }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalGenreEdit{{ $genre->id }}">
                              <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d='M9.533 11.15A1.82 1.82 0 0 0 9 12.438V15h2.578c.483 0 .947-.192 1.289-.534l7.6-7.604a1.82 1.82 0 0 0 0-2.577l-.751-.751a1.82 1.82 0 0 0-2.578 0z'/><path d='M21 12c0 4.243 0 6.364-1.318 7.682S16.242 21 12 21s-6.364 0-7.682-1.318S3 16.242 3 12s0-6.364 1.318-7.682S7.758 3 12 3'/>
                              </svg>
                            </button>

                            <div class="modal fade" id="modalGenreEdit{{ $genre->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $genre->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('genre.update', $genre->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Genre</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <form id="delete-form-{{ $genre->id }}" action="{{ route('genre.delete', $genre->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" data-id="{{ $genre->id }}" data-name="{{ $genre->name }}">
                              <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d='m18 9-.84 8.398c-.127 1.273-.19 1.909-.48 2.39a2.5 2.5 0 0 1-1.075.973C15.098 21 14.46 21 13.18 21h-2.36c-1.279 0-1.918 0-2.425-.24a2.5 2.5 0 0 1-1.076-.973c-.288-.48-.352-1.116-.48-2.389L6 9m7.5 6.5v-5m-3 5v-5m-6-4h4.615m0 0 .386-2.672c.112-.486.516-.828.98-.828h3.038c.464 0 .867.342.98.828l.386 2.672m-5.77 0h5.77m0 0H19.5'/>
                              </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-muted">Belum ada data genre.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalGenreTambah" tabindex="-1" aria-labelledby="modalGenreTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('genre.add') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGenreTambahLabel">Tambah Genre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
