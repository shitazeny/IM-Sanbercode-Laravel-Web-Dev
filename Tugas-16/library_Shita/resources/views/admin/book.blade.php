@extends('admin.index')
@section('judultitle', 'Book | Admin')
@section('konten')
<div class="container py-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h3 style="margin-top: 40px;">Data Buku</h3>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <form action="{{ route('admin.book') }}" method="GET" class="d-flex flex-grow-1 me-2" style="max-width: 400px;">
            <div class="input-group shadow-sm">
                <input type="text" name="search" class="form-control" placeholder="Cari genre..." value="{{ request('search') }}">
                <button class="btn text-white" style="background-color: #003366;" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>

        <button class="btn text-white shadow-sm" data-bs-toggle="modal" data-bs-target="#modalBookTambah" style="background-color: #003366;">
            <i class="bi bi-plus-circle me-1"></i> Tambah Buku
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="color: white; text-align: center;">No</th>
                    <th style="color: white;">Judul</th>
                    <th style="color: white;">Gambar</th>
                    <th style="color: white;">Stok</th>
                    <th style="color: white;">Genre</th>
                    <th style="color: white;">Ringkasan</th>
                    <th style="color: white; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data_book as $index => $book)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td><img src="{{ asset($book->image) }}" width="60" height="80" style="object-fit: cover;" alt="cover"></td>
                        <td>{{ $book->stok }}</td>
                        <td>{{ $book->genre->name ?? '-' }}</td>
                        <td>{{ $book->summary }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalBookEdit{{ $book->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <div class="modal fade" id="modalBookEdit{{ $book->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.book.edit', $book->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Buku</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 text-start">
                                                        <label class="form-label">Judul</label>
                                                        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                                                    </div>
                                                    <div class="mb-3 text-start">
                                                        <label class="form-label">Ringkasan</label>
                                                        <textarea name="summary" class="form-control" rows="3" required>{{ $book->summary }}</textarea>
                                                    </div>
                                                    <div class="mb-3 text-start">
                                                        <label class="form-label">Stok</label>
                                                        <input type="number" name="stok" class="form-control" value="{{ $book->stok }}" required>
                                                    </div>
                                                    <div class="mb-3 text-start">
                                             <label class="form-label">Genre</label>
                                            <select name="genre_id" class="form-control" required>
                                                <option value="">-- Pilih Genre --</option>
                                                @foreach ($genres as $genre)
                                                    <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>
                                                        {{ $genre->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                                    <div class="mb-3 text-start">
                                                        <label class="form-label">Gambar (opsional)</label>
                                                        <input type="file" name="image" class="form-control">
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
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

                                <form id="delete-form-{{ $book->id }}" action="{{ route('admin.book.delete', $book->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-sm btn-danger" data-id="{{ $book->id }}" data-name="{{ $book->title }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted fst-italic">Belum ada data buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalBookTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.book.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Buku</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-start">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label">Ringkasan</label>
                        <textarea name="summary" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                    <div class="mb-3 text-start">
                      <label class="form-label">Genre</label>
                      <select name="genre_id" class="form-control" required>
                          <option value="">-- Pilih Genre --</option>
                          @foreach ($genres as $genre)
                              <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control" required>
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
            const bookId = this.getAttribute('data-id');
            const bookTitle = this.getAttribute('data-name');

            Swal.fire({
                title: 'Kamu yakin?',
                text: `Buku "${bookTitle}" akan dihapus!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${bookId}`).submit();
                }
            });
        });
    });
</script>
@endsection