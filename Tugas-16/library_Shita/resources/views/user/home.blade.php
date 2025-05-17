@extends('user.index')
@section('judultitle', 'Home | User')
@section('konten')
<style>
  .book-card {
      background-color: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }

  .book-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
  }

  .book-content {
      padding: 16px;
      text-align: center;
  }

  .book-title {
      font-size: 18px;
      font-weight: 600;
      color: #1f2937;
      margin-bottom: 6px;
  }

  .book-genre {
      font-size: 14px;
      color: #6b7280;
      margin-bottom: 8px;
  }

  .book-rating {
      color: #fbbf24;
      margin-bottom: 12px;
  }

  .book-button {
      display: inline-block;
      padding: 8px 20px;
      background-color: #3674B5;
      color: white;
      border-radius: 6px;
      font-size: 14px;
      text-decoration: none;
      transition: background-color 0.3s ease;
  }

  .book-button:hover {
      background-color: #2b5d91;
  }

  .comment-card {
      background-color: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 12px;
      padding: 16px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .comment-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }

  .comment-card p {
      font-style: italic;
      color: #4b5563;
      margin-bottom: 8px;
  }

  .comment-card .comment-author {
      display: flex;
      align-items: center;
      gap: 12px;
  }

  .comment-card .comment-author img {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
  }

  .comment-card .comment-author .author-info h4 {
      font-weight: 600;
      color: #1f2937;
  }

  .comment-card .comment-author .author-info p {
      font-size: 14px;
      color: #6b7280;
  }

  .comment-card .rating {
      color: #fbbf24;
      font-size: 16px;
  }

  .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 24px;
  }

  .container {
      padding: 2rem;
  }

  .header h2 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 24px;
      color: #111827;
  }
</style>

<div class="container">
  <div class="header">
      <h2>📚 Rekomendasi Buku Minggu Ini</h2>
  </div>
  <div class="grid">
      <div class="book-card">
          <img src="{{ asset('template/images/laskarPelangi.jpg') }}" alt="Buku 1">
          <div class="book-content">
              <div class="book-title">Laskar Pelangi</div>
              <div class="book-genre">Genre: Inspiratif</div>
              <div class="book-rating">&#9733; &#9733; &#9733; &#9733; &#9734; (4.2)</div>
          </div>
      </div>

      <div class="book-card">
          <img src="{{ asset('template/images/kerajaanAwan.jpg') }}" alt="Buku 2">
          <div class="book-content">
              <div class="book-title">Kerajaan Awan</div>
              <div class="book-genre">Genre: Fantasi</div>
              <div class="book-rating">&#9733; &#9733; &#9733; &#9733; &#9733; (5.0)</div>
          </div>
      </div>

      <div class="book-card">
          <img src="{{ asset('template/images/dilan.jpg') }}" alt="Buku 3">
          <div class="book-content">
              <div class="book-title">Dilan 1990</div>
              <div class="book-genre">Genre: Romantis</div>
              <div class="book-rating">&#9733; &#9733; &#9733; &#9733; &#9734; (4.3)</div>
          </div>
      </div>

      <div class="book-card">
          <img src="{{ asset('template/images/bukuMisteri.jpg') }}" alt="Buku 4">
          <div class="book-content">
              <div class="book-title">Hantu di Rumah Kos</div>
              <div class="book-genre">Genre: Misteri</div>
              <div class="book-rating">&#9733; &#9733; &#9733; &#9733; &#9733; (5.0)</div>
          </div>
      </div>
  </div>

 <section class="px-4 py-12 bg-gray-50">
    <div class="header">
        <h2 style="margin-top: 50px; font-size: 24px; font-weight: bold;">📚 Komentar Pembaca tentang Buku</h2>
    </div>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      
        <div class="comment-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
            <p class="text-gray-700 italic mb-4">
                "Buku ini sangat menginspirasi! Cerita yang dikemas begitu menarik dan penuh makna. Bisa banget jadi bahan bacaan wajib!"
            </p>
            <div class="comment-author flex items-center gap-4">
                <div class="author-info">
                    <h4 class="font-semibold text-gray-800">Dede Sunarde</h4>
                    <p class="text-sm text-gray-500">Baca: "Jalan Kehidupan"</p>
                </div>
            </div>
        </div>

        <div class="comment-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
            <p class="text-gray-700 italic mb-4">
                "Penuh dengan wawasan baru! Buku ini memberikan perspektif yang berbeda tentang kehidupan sehari-hari."
            </p>
            <div class="comment-author flex items-center gap-4">
                <div class="author-info">
                    <h4 class="font-semibold text-gray-800">Siti Aisyah</h4>
                    <p class="text-sm text-gray-500">Baca: "Rahasia Alam"</p>
                </div>
            </div>
        </div>

        <div class="comment-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
            <p class="text-gray-700 italic mb-4">
                "Cerita yang menegangkan dan plot twist yang luar biasa. Kalian harus baca buku ini kalau suka cerita thriller!"
            </p>
            <div class="comment-author flex items-center gap-4">
                <div class="author-info">
                    <h4 class="font-semibold text-gray-800">Rizky Nugraha</h4>
                    <p class="text-sm text-gray-500">Baca: "Cahaya Malam"</p>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
@endsection
