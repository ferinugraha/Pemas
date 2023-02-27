@extends('layouts.petugas')

@section('content')

<?php
    use App\Models\User;
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
                                        <th>Tgl Pengaduan</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Isi Laporan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no= 1;
                                    ?>
                                    @foreach ($tanggapan1 as $item)
                                    <?php
                                        $data_user = DB::table('users')->where('id', $item->user_id )->get();
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$item->foto) }}" width="90px" height="90px" alt="image">
                                        </td>
                                        <td>{{ $item->tgl_pengaduan }}</td>
                                        @foreach ($data_user as $user)
                                            <td><?= $user->nik  ?></td>
                                            <td><?= $user->name  ?></td>
                                        @endforeach
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->isi_laporan }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('tanggapan2.destroy',$item->id) }}" method="POST">
                                                    <a class="btn btn-primary" href="{{ route('tanggapan2.edit',$item->id) }}">Approve</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>												
                                        </td>	
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