@extends('admin.index')
@section('judultitle', 'Comments | Admin')
@section('konten')

<div class="container py-4">
    <h3 class="mb-4">💬 Daftar Komentar</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" style="color: white;">No</th>
                    <th class="text-center" style="color: white;">Nama User</th>
                    <th class="text-center" style="color: white;">Buku</th>
                    <th class="text-center" style="color: white;">Komentar</th>
                    <th class="text-center" style="color: white;">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comments as $comment)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $comment->user->name ?? '-' }}</td>
                    <td>{{ $comment->book->title ?? '-' }}</td>
                    <td>{{ $comment->content }}</td>
                    <td class="text-center">{{ $comment->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted fst-italic">Belum ada komentar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
