<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Laporan Pemasukan</title>
</head>
<body>
    <div class="text-center">
        <h5>Laporan Dana Pemasukan</h5>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pemasukan</th>
                    <th>File</th>
                    <th>Sumber</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>    
            <tbody>
                @foreach ($laporan as $k => $v)
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($v->tgl_pemasukan)->format('Y-m-d') }}</td>
                        <td>{{ $v->nama_file }}</td>
                        <td>{{ $v->sumber }}</td>
                        <td>{{ $v->deskripsi}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>