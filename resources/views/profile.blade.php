<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Profil Pengguna</h1>

        <div class="card">
            <div class="card-header">
                Informasi Pengguna
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama: {{ $user->nama }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
            </div>
        </div>

        <h2 class="mt-4">Ubah Informasi Profil</h2>
        <form action="{{ url('edituser') }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                <input type="hidden" class="form-control" name="user_id" value="{{ $user->id }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirm">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Lama</label>
                <input type="password" class="form-control" name="old_password">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        @if(session('error'))
        <div class="alert alert-danger mt-3">
            <ul>
                <li>{{ session('error') }}</li>
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success mt-3">
            <ul>
                <li>{{ session('success') }}</li>
            </ul>
        </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>