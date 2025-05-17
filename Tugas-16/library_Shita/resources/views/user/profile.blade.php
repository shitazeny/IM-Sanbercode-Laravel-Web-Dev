@extends('user.index')
@section('judultitle', 'Profile | User')
@section('konten')

<style>
  .profile-container {
    max-width: 700px;
    margin: 50px auto;
    background-color: #ffffff;
    padding: 40px 30px;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    font-family: 'Segoe UI', sans-serif;
  }

  .profile-header {
    text-align: center;
    margin-bottom: 30px;
  }

  .profile-header h2 {
    color: #3674B5;
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 15px;
  }

  .profile-picture {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #3674B5;
    margin-bottom: 10px;
  }

  .info-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
  }

  .info-row span {
    font-weight: 600;
    color: #555;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
  }

  .form-group input {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.3s;
  }

  .form-group input:focus {
    border-color: #3674B5;
    outline: none;
  }

  .button-group {
    text-align: center;
    margin-top: 25px;
  }

  .btn {
    display: inline-block;
    padding: 12px 28px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .btn-edit {
    background-color: #3674B5;
    color: white;
    margin: 5px;
  }

  .btn-edit:hover {
    background: linear-gradient(135deg, #295C9C, #3674B5);
  }

  .btn-cancel {
    background-color: #999;
    color: white;
    margin: 5px;
  }

  .btn-cancel:hover {
    background: linear-gradient(135deg, #777, #999);
  }

  .btn-update {
    background-color: #3674B5;
    color: white;
    margin: 5px;
  }

  .btn-update:hover {
    background: linear-gradient(135deg, #295C9C, #3674B5);
  }
</style>

<section id="one" class="wrapper style2">
  <div class="profile-container">

    <div class="profile-header">
      <h2>Profil Pengguna</h2>
      <img src="{{ asset('template/images/k3.png') }}" alt="Foto Profil" class="profile-picture">
    </div>

    <div id="view-profile">
      <div class="info-row">
        <span>Nama Lengkap:</span>
        <span>{{ Auth::user()->name }}</span>
      </div>
      <div class="info-row">
        <span>Email:</span>
        <span>{{ Auth::user()->email }}</span>
      </div>
      <div class="info-row">
        <span>Umur:</span>
        <span>{{ Auth::user()->profile->age ?? '-' }}</span>
      </div>
      <div class="info-row">
        <span>Alamat:</span>
        <span>{{ Auth::user()->profile->address ?? '-' }}</span>
      </div>

      <div class="button-group">
        <button class="btn btn-edit" onclick="toggleEdit(true)">Edit Profil</button>
      </div>
    </div>

    <form id="edit-profile" action="{{ route('user.profile.edit') }}" method="POST" style="display: none;">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" value="{{ Auth::user()->email }}" readonly>
      </div>

      <div class="form-group">
        <label for="age">Umur</label>
        <input type="text" name="age" id="age" value="{{ Auth::user()->profile->age ?? '' }}">
      </div>

      <div class="form-group">
        <label for="address">Alamat</label>
        <input type="text" name="address" id="address" value="{{ Auth::user()->profile->address ?? '' }}">
      </div>

      <div class="button-group">
        <button type="submit" class="btn btn-update">Simpan Perubahan</button>
        <button type="button" class="btn btn-cancel" onclick="toggleEdit(false)">Batal</button>
      </div>
    </form>
  </div>
</section>

<script>
  function toggleEdit(show) {
    document.getElementById('view-profile').style.display = show ? 'none' : 'block';
    document.getElementById('edit-profile').style.display = show ? 'block' : 'none';
  }
</script>
@endsection
