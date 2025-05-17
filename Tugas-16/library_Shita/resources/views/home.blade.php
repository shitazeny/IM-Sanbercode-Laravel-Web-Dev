@extends('index')
@section('judultitle', '')
@section('konten')
<div class="inner">
  <div class="grid-style">
    <div>
      <div class="box">
        <div class="image fit">
          <img src="{{asset('template/images/K1.png')}}" alt="Ilustrasi belajar daring" width="600" height="300">
        </div>

        <div class="content">
          <header class="align-center">
            <p>Materi berkualitas untuk menunjang proses belajar</p>
            <h2>Belajar Tanpa Batas</h2>
          </header>
          <p>RuangBaca menyediakan berbagai materi pembelajaran yang bisa diakses kapan saja dan di mana saja. Cocok untuk pelajar, guru, maupun siapa pun yang ingin terus belajar dengan cara yang fleksibel dan menyenangkan.</p>
        </div>
      </div>
    </div>

    <div>
      <div class="box">
        <div class="image fit">
          <img src="{{asset('template/images/K2.png')}}" alt="Ilustrasi akses literasi digital" width="600" height="300">
        </div>

        <div class="content">
          <header class="align-center">
            <p>Dukung literasi digital dengan akses mudah ke berbagai sumber</p>
            <h2>Sumber Belajar Terpercaya</h2>
          </header>
          <p>Dengan kurasi konten yang tepat dan bahasa yang mudah dipahami, RuangBaca hadir sebagai teman belajar yang dapat diandalkan. Jadikan waktu belajarmu lebih efektif dan terarah dengan materi dari kami.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="three" class="wrapper style2">
  <div class="inner">
  <header class="align-center">
    <p class="special">Jelajahi berbagai topik menarik melalui materi visual yang informatif</p>
    <h2>Galeri Pembelajaran RuangBaca</h2>
  </header>
  <div class="gallery">
    <div>
      <div class="image fit">
        <a href="#"><img src="{{ asset('template/images/k3.png') }}" alt="" width="600" height="300"></a>
      </div>
    </div>
    <div>
      <div class="image fit">
        <a href="#"><img src="{{ asset('template/images/k4.png') }}" alt="" width="600" height="300"></a>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
