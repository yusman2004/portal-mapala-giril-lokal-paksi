<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Detail Anggota | MAPALA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-success text-white">

            <h5 class="mb-0">
                Detail Anggota
            </h5>

        </div>

        <div class="card-body">

            <div class="text-center mb-4">

                @if($anggota->foto)

                    <img src="{{ asset('storage/' . $anggota->foto) }}"
                         width="150"
                         height="150"
                         class="rounded-circle"
                         style="object-fit: cover;">

                @else

                    <div class="display-1">
                        👤
                    </div>

                @endif

                <h4 class="mt-3">
                    {{ $anggota->nama_lengkap }}
                </h4>

            </div>

            <table class="table">

                <tr>
                    <th>NIM</th>
                    <td>{{ $anggota->nim ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $anggota->jenis_kelamin }}</td>
                </tr>

                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $anggota->no_hp ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Angkatan</th>
                    <td>{{ $anggota->angkatan ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>{{ $anggota->alamat ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{ $anggota->status }}</td>
                </tr>

            </table>

            <a href="{{ route('admin.anggota.edit', $anggota) }}"
               class="btn btn-warning">

                Edit

            </a>

            <a href="{{ route('admin.anggota.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

</body>

</html>