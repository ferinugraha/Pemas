<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Bukti Pembayaran</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table td, table th {
        border: 1px solid black;
        padding: 5px;
    }

    </style>
</head>
<body>
    <h3 align="center">Laporan Hasil Pengaduan</h3>
    <table class="table align-items-center mt-4 mb-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Petugas</th>
                <th>Tgl Pengaduan</th>
                <th>NIK</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no= 1;
            ?>
            @foreach($history as $row)
            <?php
                $data_user = DB::table('users')->where('id', $row->user_id )->get();
                $data_petugas = DB::table('tanggapan')->where('id_pengaduan', $row->id )->get();
            ?>
            <tr>
                <td><?= $no++ ?></td>
                @foreach ($data_petugas as $petugas)
                    <?php
                        $user_petugas = DB::table('users')->where('id', $petugas->id_petugas )->get();
                    ?>
                    @foreach ($user_petugas as $user_petugas)
                        <td>{{ $user_petugas->name }}</td>
                    @endforeach
                @endforeach
                <td>{{ $row->tgl_pengaduan }}</td>
                @foreach ($data_user as $user)
                    <td><?= $user->nik  ?></td>
                    <td><?= $user->name  ?></td>
                @endforeach
                <td>{{ $row->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>