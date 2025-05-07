@extends('layout.master')
@section('judultitle', 'Register')
@section('konten')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="card shadow-lg">
        <div class="card-header text-white" style="background-color: #003366;">
          <h3 class="card-title mb-0 text-center">Sign Up Form</h3>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="{{ route('register.add') }}">
            @csrf
            
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label for="fname" class="form-label fw-bold">First Name</label>
                <input type="text" class="form-control" id="fname" name="first_name" placeholder="Enter first name" required>
              </div>
              <div class="col-md-6">
                <label for="lname" class="form-label fw-bold">Last Name</label>
                <input type="text" class="form-control" id="lname" name="last_name" placeholder="Enter last name" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Gender</label>
              <div class="d-flex gap-4">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                  <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                  <label class="form-check-label" for="other">Other</label>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="nationality" class="form-label fw-bold">Nationality</label>
              <select class="form-select" id="nationality" name="nationality" required>
                <option value="">--Select--</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Inggris">Inggris</option>
                <option value="Amerika">Amerika</option>
                <option value="Indonesia">Indonesia</option>
                <option value="China">China</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Languages Spoken</label>
              <div class="d-flex flex-wrap gap-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="language[]" id="bahasa" value="Bahasa Indonesia">
                  <label class="form-check-label" for="bahasa">Bahasa Indonesia</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="language[]" id="english" value="English">
                  <label class="form-check-label" for="english">English</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="language[]" id="other_lang" value="Other">
                  <label class="form-check-label" for="other_lang">Other</label>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label for="bio" class="form-label fw-bold">Bio</label>
              <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Write something about yourself..."></textarea>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="{{ route('welcome') }}" class="btn btn-outline-primary me-md-2" style="color: #003366;">Cancel</a>
              <button type="submit" class="btn px-4" style="background-color: #003366; color: white;">Sign Up</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection