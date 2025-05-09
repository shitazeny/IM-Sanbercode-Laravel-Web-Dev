@extends('layout.master')
@section('judultitle', 'Home')
@section('konten')
<div class="container mt-5">
  <div class="row justify-content-center mb-5">
    <div class="col-12 text-center">
      <h3 class="display-4">Social Media Developer Santai Berkualitas</h3>
      <p class="lead">Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h3 class="h4 mb-4">Benefit Join di SanberBook</h3>
      <ul class="list-group mb-5">
        <li class="list-group-item"><i class="bi bi-check-circle me-2"></i> Mendapatkan Motivasi dari Sesama Developer</li>
        <li class="list-group-item"><i class="bi bi-check-circle me-2"></i> Sharing Knowledge dari Para Mastah Sanber</li>
        <li class="list-group-item"><i class="bi bi-check-circle me-2"></i> Dibuat oleh Calon Web Developer Terbaik</li>
      </ul>
    </div>
    
    <div class="col-md-6">
      <h3 class="h4 mb-4">Cara Bergabung ke SanberBook</h3>
      <ol class="list-group">
        <li class="list-group-item"><i class="bi bi-arrow-right-circle me-2"></i> Mengunjungi Website SanberCode</li>
        <li class="list-group-item"><i class="bi bi-arrow-right-circle me-2"></i> Mendaftar <a href="{{ route('register') }}" class="text-decoration" style="color: #003366;">Akun</a></li>
        <li class="list-group-item"><i class="bi bi-arrow-right-circle me-2"></i> Selesai!</li>
      </ol>
    </div>
  </div>
</div>
@endsection