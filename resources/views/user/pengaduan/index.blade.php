@extends('layouts.user')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajukan Masalah Anda</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="needs-validation" action="{{ route('pengaduan.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Tgl Pengaduan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" name="tgl_pengaduan" id="validationCustom01"  required="">
                                                <div class="invalid-feedback">
                                                    Please enter a Tgl Pengaduan.
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <input type="text" class="form-control" style="display:none;" name="user_id" value="<?php echo Auth::user()->id ?>" id="validationCustom01" >
                                        <input type="text" class="form-control" style="display:none;" name="status" value="Pending" id="validationCustom01" >
                                    
                                        {{-- <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom06">Ulasan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="validationCustom06" name="isi_laporan"  required="">
                                                <div class="invalid-feedback">
                                                    Please enter a Ulasan.
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="mb-3 row">
                                            <div class="form-group">
                                                <label for="country-floating">Ulasan</label>
                                                <textarea name="isi_laporan" class="form-control" cols="30" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-lg-8 ms-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom06">Foto
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file"  id="validationCustom06" name="foto"  required="">
                                                <div class="invalid-feedback">
                                                    Please enter a Foto.
                                                </div>
                                            </div>
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