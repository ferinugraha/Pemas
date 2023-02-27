@extends('layouts.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Akun Datatable</h4>
                        <a href="{{ route('akun.create') }}" class="btn btn-primary">
                            <span>Create</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>No.Telp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no= 1;
                                    ?>
                                    @foreach ($user as $item)
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>{{ $item->telp }}</td>
                                        {{-- <td><span class="badge light badge-success">Paid</span></td> --}}
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('akun.destroy',$item->id) }}" method="POST">
                                                    <a class="btn btn-primary" href="{{ route('akun.edit',$item->id) }}">Edit</a>
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