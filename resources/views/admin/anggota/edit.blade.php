<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Anggota | MAPALA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-success text-white">

            <h5 class="mb-0">
                Edit Data Anggota
            </h5>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('admin.anggota.update', $anggota) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @include('admin.anggota._form')

                <div class="mt-4">

                    <button class="btn btn-success">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.anggota.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>