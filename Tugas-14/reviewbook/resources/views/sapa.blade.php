@extends('layout.master')
@section('judultitle', 'Dashboard')
@section('konten')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="card shadow-lg border-0 overflow-hidden">
        <div class="card-header text-white text-center py-4" style="background-color: #003366;">
          <i class="bi bi-check-circle-fill display-1 mb-3"></i>
          <h2 class="card-title mb-0">Selamat Datang di SanberBook!</h2>
        </div>
        <div class="card-body p-5 text-center">
          <div class="mb-4">
            <h3 class="fw-bold mb-3" style="color: #003366;">
              {{ session('full_name') ? session('full_name') : 'Pengguna Baru' }}
            </h3>
            <p class="lead">
              Terima kasih telah bergabung di <strong>SanberBook</strong>.<br/>
              Sosial media developer santai berkualitas.
            </p>
          </div>
          
          <div class="row g-4 mb-4">
            <div class="col-md-4">
              <div class="card h-100 border-0 bg-light">
                <div class="card-body">
                  <i class="bi bi-people-fill fs-1 mb-3" style="color: #003366;"></i>
                  <h5>Komunitas</h5>
                  <p class="small">Terhubung dengan developer lain</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card h-100 border-0 bg-light">
                <div class="card-body">
                  <i class="bi bi-book-fill fs-1 mb-3" style="color: #003366;"></i>
                  <h5>Belajar</h5>
                  <p class="small">Akses materi dan tutorial</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card h-100 border-0 bg-light">
                <div class="card-body">
                  <i class="bi bi-share-fill fs-1 mb-3" style="color: #003366;"></i>
                  <h5>Berbagi</h5>
                  <p class="small">Bagikan pengetahuan dan pengalaman</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="card-footer bg-light py-3 text-center">
          <p class="mb-0">© 2025 SanberBook - Sosial Media Developer Santai Berkualitas</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection