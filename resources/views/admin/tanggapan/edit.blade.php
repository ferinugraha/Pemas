@extends('layouts.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Approve Pengaduan</h4>
                        <a href="{{ route('history') }}" class="btn btn-primary">
                            <span>Kembali</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="needs-validation" action="{{ route('proveadmin',$tanggapan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                                <input type="text" class="form-control" style="display:none;" name="id_pengaduan" value="{{ $tanggapan->id }}" id="validationCustom01" >
                                <input type="text" class="form-control" style="display:none;" name="id_petugas" value="<?php echo Auth::user()->id ?>" id="validationCustom01" >
                                                
                                <div class="row">
                                    <div class="col-xl-6">
                                        <?php
                                            $data_user = DB::table('users')->where('id', $tanggapan->user_id )->get();
                                        ?>
                                        @foreach ($data_user as $user)
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="validationCustom01"  value="{{ $user->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom02">NIK <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="validationCustom02"  value="{{ $user->nik }}"  readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="validationCustom02"  value="{{ $user->email }}"  readonly>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom06">Tgl Pengaduan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="validationCustom06" value="{{ $tanggapan->tgl_pengaduan }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mb-9 row">
                                            <div class="col-lg-6">
                                                <img src="{{ asset('uploads/'.$tanggapan->foto) }}" alt="" height="270" width="400">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <div class="form-group">
                                            <label for="country-floating">Deskripsi Pengaduan</label>
                                            <textarea class="form-control" cols="30" rows="4"
                                                readonly>{{ $tanggapan->isi_laporan }}</textarea>
                                        </div>
                                    </div>

                                    <div class="card-header"style="margin-bottom:30px;">
                                        <h4 class="card-title">Berikan Tanggapan!!</h4>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom06">Tgl Tanggapan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="validationCustom06" name="tgl_pengaduan" value="{{ old('tgl_pengaduan', $tanggapanAdmin->tgl_tanggapan ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom06">Status
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="default-select wide form-control" name="status" id="validationCustom05">
                                                    <option data-display="Select">Please select</option>
                                                    @php
                                                        $stats = ['Pending', 'Proses', 'Selesai'];
                                                    @endphp
                                                    @foreach ($stats as $status)
                                                        <option value="{{ $status }}" @if ($tanggapan->status ?? '' == $status)
                                                            selected
                                                        @endif>{{ $status }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="form-group">
                                            <label for="country-floating">Tanggapan Anda</label>
                                            <textarea name="tanggapan" class="form-control" cols="30" rows="4">{{ old('tanggapan', $tanggapanAdmin->tanggapan ?? '') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-lg-2 ms-auto">
                                            <button type="submit" class="btn btn-primary">Approve</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection