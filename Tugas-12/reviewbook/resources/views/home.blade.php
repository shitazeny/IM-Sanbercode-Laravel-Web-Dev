<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SanberBook - Day 1</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f0f2f5;
      color: #333;
      padding: 40px 20px;
    }

    .container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .title {
      text-align: center;
      margin-bottom: 30px;
    }

    .title h1 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #2c3e50;
    }

    .subtitle {
      text-align: center;
      margin-bottom: 20px;
    }

    .subtitle h3 {
      font-weight: 700;
      font-size: 1.4rem;
      margin-bottom: 10px;
    }

    .subtitle p {
      font-size: 1rem;
      color: #555;
    }

    h3 {
      margin-top: 30px;
      font-size: 1.2rem;
      color: #2c3e50;
    }

    ul, ol {
      margin-top: 10px;
      padding-left: 20px;
      line-height: 1.6;
    }

    a {
      color: #3498db;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="title">
      <h1>SanberBook</h1>
    </div>

    <div class="subtitle">
      <h3>Social Media Developer Santai Berkualitas</h3>
      <p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>
    </div>

    <h3>Benefit Join di SanberBook</h3>
    <ul>
      <li>Mendapatkan Motivasi dari Sesama Developer</li>
      <li>Sharing Knowledge dari Para Mastah Sanber</li>
      <li>Dibuat oleh Calon Web Developer Terbaik</li>
    </ul>

    <h3>Cara Bergabung ke SanberBook</h3>
    <ol>
      <li>Mengunjungi Website SanberCode</li>
      <li>Mendaftar <a href="{{ route('register') }}">Akun</a></li>
      <li>Selesai!</li>
    </ol>
  </div>
</body>
</html>
