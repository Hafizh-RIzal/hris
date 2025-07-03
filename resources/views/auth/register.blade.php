<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Pengguna</title>

  <!-- Bootstrap, Font Awesome, Animate -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f4f6f9;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }

    .register-box {
      background: #ffffff;
      padding: 2.5rem;
      border-radius: 15px;
      width: 100%;
      max-width: 480px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
    }

    .register-box h4 {
      font-weight: bold;
      color: #333;
    }

    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
      border-color: #0a58ca;
    }

    .form-check-label,
    .form-label,
    .alert {
      font-size: 0.9rem;
    }

    .form-select {
      font-size: 0.9rem;
    }

    .text-link {
      font-size: 0.9rem;
    }

    .alert-danger, .alert-success {
      padding: 0.75rem 1rem;
      border-radius: 10px;
    }
  </style>
</head>
<body>

  <div class="register-box animate__animated animate__fadeInDown">
    <h4 class="mb-4 text-center"><i class="fas fa-user-plus me-2"></i>Registrasi Pengguna</h4>

    {{-- Alert Error --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle me-1"></i> {{ $errors->first() }}
      </div>
    @endif

    {{-- Alert Success --}}
    @if (session('success'))
      <div class="alert alert-success">
        <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="role" class="form-label">Daftar Sebagai</label>
        <select name="role" class="form-select" required>
          <option value="">-- Pilih Role --</option>
          <option value="hrd" {{ old('role') == 'hrd' ? 'selected' : '' }}>HRD</option>
          <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
        </select>
      </div>

      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-paper-plane me-2"></i>Daftar Sekarang
        </button>
      </div>

      <div class="text-center text-link">
        Sudah punya akun? 
        <a href="{{ route('login') }}" class="text-decoration-none text-primary">Login di sini</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
