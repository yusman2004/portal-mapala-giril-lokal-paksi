<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Admin | MAPALA Giril Lokal Paksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body {
            min-height: 100vh;
            background:
                linear-gradient(
                    rgba(0, 0, 0, .65),
                    rgba(0, 0, 0, .65)
                ),
                url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b')
                center/cover;

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 430px;

            background: rgba(255, 255, 255, .97);

            border-radius: 20px;

            padding: 35px;

            box-shadow: 0 15px 50px rgba(0,0,0,.3);
        }

        .logo {
            width: 80px;
            height: 80px;

            border-radius: 50%;

            background: #1b4332;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: auto;

            font-size: 30px;
            font-weight: bold;
        }

        .btn-login {
            background: #1b4332;
            color: white;

            border: none;

            padding: 12px;

            border-radius: 10px;
        }

        .btn-login:hover {
            background: #2d6a4f;
            color: white;
        }

    </style>
</head>

<body>

<div class="login-card">

    <div class="logo mb-3">
        M
    </div>

    <h4 class="text-center fw-bold">
        MAPALA GIRIL LOKAL PAKSI
    </h4>

    <p class="text-center text-muted mb-4">
        Panel Administrator
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Email Admin
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="admin@mapala.test"
                   value="{{ old('email') }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   required>

        </div>

        <div class="form-check mb-3">

            <input type="checkbox"
                   name="remember"
                   value="1"
                   class="form-check-input"
                   id="remember">

            <label class="form-check-label"
                   for="remember">

                Ingat saya

            </label>

        </div>

        <button type="submit"
                class="btn btn-login w-100">

            LOGIN ADMIN

        </button>

    </form>

    <div class="text-center mt-4">

        <small class="text-muted">
            © {{ date('Y') }} MAPALA Giril Lokal Paksi
        </small>

    </div>

</div>

</body>
</html>