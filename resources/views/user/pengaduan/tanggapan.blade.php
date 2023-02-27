@extends('layouts.user')

@section('content')

<?php
    use App\Models\User;
    use App\Models\Tanggapan;
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pengaduan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama Pengadu</th>
                                        <th>Isi Laporan</th>
                                        <th>Tanggapan</th>
                                        <th>Tgl di Tanggapi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no= 1;
                                    ?>
                                    @foreach ($pengaduans as $item)
                                    <?php
                                        $data_user = DB::table('users')->where('id', $item->user_id )->get();
                                        $data_tanggapan = DB::table('tanggapan')->where('id_pengaduan', $item->id )->get();
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$item->foto) }}" width="90" height="90" alt="">
                                        </td>
                                        @foreach ($data_user as $user)
                                            <td>{{ $user->name }}</td>
                                        @endforeach
                                        <td>{{ $item->isi_laporan }}</td>
                                        @foreach ($data_tanggapan as $tanggapan)
                                            <td>{{ $tanggapan->tanggapan }}</td>
                                            <td>{{ $tanggapan->tgl_tanggapan }}</td>
                                        @endforeach
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection