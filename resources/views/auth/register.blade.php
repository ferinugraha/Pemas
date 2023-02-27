<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<title>Pengaudan Masyarakat || Register</title>
	
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										{{-- <a href="index.html"><img src="{{ asset('assets/images/logo-full.png') }}" alt=""></a> --}}
									</div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="{{ route('registeruserstore') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        
                                        @method('GET')
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>NIK</strong></label>
                                            <input type="number" class="form-control" name="nik" placeholder="hellouser">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="name" placeholder="hellouser">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" placeholder="hellouser@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>No.Telp</strong></label>
                                            <input type="text" class="form-control" name="telp" placeholder="Masukan Nomor Anda">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="*******">
                                            <input type="password" class="form-control" style="display: none;" name="role" value="User">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login.index') }}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="vendor/global/global.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>
<script src="js/styleSwitcher.js"></script>
</body>
</html>