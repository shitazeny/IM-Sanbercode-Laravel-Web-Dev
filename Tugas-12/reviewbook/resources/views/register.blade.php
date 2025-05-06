<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up - SanberBook</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      background-color: #f0f2f5;
      padding: 30px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .title {
      text-align: center;
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 30px;
      color: #2c3e50;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
      color: #333;
    }

    input[type="text"],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .radio-group,
    .checkbox-group {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .radio-group label,
    .checkbox-group label {
      font-weight: normal;
    }

    textarea {
      resize: vertical;
    }

    .submit-btn {
      display: block;
      width: 100%;
      background-color: #003366;
      color: #fff;
      padding: 14px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      margin-top: 30px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
    }

    @media (max-width: 600px) {
      .radio-group,
      .checkbox-group {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="title">Sign Up Form</h1>

    <form action="{{ route('register.add') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="first_name" placeholder="Enter first name" required />
      </div>

      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="last_name" placeholder="Enter last name" required />
      </div>

      <div class="form-group">
        <label>Gender</label>
        <div class="radio-group">
          <label><input type="radio" name="gender" value="male" required /> Male</label>
          <label><input type="radio" name="gender" value="female" /> Female</label>
          <label><input type="radio" name="gender" value="other" /> Other</label>
        </div>
      </div>

      <div class="form-group">
        <label for="nationality">Nationality</label>
        <select id="nationality" name="nationality" required>
          <option value="">--Select--</option>
          <option value="Malaysia">Malaysia</option>
          <option value="Inggris">Inggris</option>
          <option value="Amerika">Amerika</option>
          <option value="Indonesia">Indonesia</option>
          <option value="China">China</option>
        </select>
      </div>

      <div class="form-group">
        <label>Languages Spoken</label>
        <div class="checkbox-group">
          <label><input type="checkbox" name="language[]" value="Bahasa Indonesia" /> Bahasa Indonesia</label>
          <label><input type="checkbox" name="language[]" value="English" /> English</label>
          <label><input type="checkbox" name="language[]" value="Other" /> Other</label>
        </div>
      </div>

      <div class="form-group">
        <label for="bio">Bio</label>
        <textarea id="bio" name="bio" rows="6" placeholder="Write something..." required></textarea>
      </div>

      <button type="submit" class="submit-btn">Sign Up</button>
    </form>
  </div>
</body>
</html>
