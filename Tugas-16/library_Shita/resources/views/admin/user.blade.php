@extends('admin.index')
@section('judultitle', 'Data User | Admin')
@section('konten')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h3 style="margin-top: 40px;">Data User</h3>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <form action="{{ route('admin.user') }}" method="GET" class="d-flex flex-grow-1 me-2" style="max-width: 400px;">
            <div class="input-group shadow-sm">
                <input type="text" name="search" class="form-control" placeholder="Cari user..." value="{{ request('search') }}">
                <button class="btn text-white" style="background-color: #003366;" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="color: white; text-align: center;">No</th>
                    <th style="color: white; text-align: center;">Nama</th>
                    <th style="color: white; text-align: center;">Email</th>
                    <th style="color: white; text-align: center;">Umur</th>
                    <th style="color: white; text-align: center;">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td class="align-middle" style="text-align: center;">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="text-center">{{ $user->profile->age ?? '-' }}</td>
                    <td>{{ $user->profile->address ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted fst-italic">Belum ada data user.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
