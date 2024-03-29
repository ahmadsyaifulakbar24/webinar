<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Daftar Hadir / Ambil Sertifikat - Webinar</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap">
	<link rel="shortcut icon" href="{{asset('assets/images/logo/garuda.png')}}">
    <style>
		body {
    		background: url('assets/images/background/webinar.jpg');
    		background-repeat: no-repeat;
    		background-attachment: fixed;
    		background-size: cover;
    	}
		@media only screen and (max-width: 576px) {
		    .card-form {
		        margin: 10px;
		        margin-top: 170px;
		        border: 1px solid #eaebef;
		        border-radius: 5px;
		    }
		}
    </style>
</head>
<body class="bg-lighet">
    <div class="card-form-login">
        <div class="card-form">
            <div class="card-body">
        		<h5 class="font-weight-bold text-center">Daftar Hadir / Ambil Sertifikat</h5>
        		<hr>
                <form id="form">
					<div class="alert alert-danger" id="alert" role="alert" style="display:none">
						<i class="mdi mdi-close-circle-outline pr-2"></i>NIK (Nomor Induk Kependudukan) dan Nomor Telepon tidak cocok.<br>Silahkan diingat dan coba masukan kembali.<br>Jika anda belum terdaftar didalam aplikasi, silahkan lakukan <a href="{{url('pengisian-data-profil')}}" class="text-danger">Pengisian Data Profil</a> terlebih dahulu.
					</div>
					@if(isset($_GET['registration']))
					<div class="alert alert-success" role="alert">
						<i class="mdi mdi-check-circle-outline pr-2"></i>NIK (Nomor Induk Kependudukan) Anda berhasil terdaftar didalam aplikasi, silahkan masuk untuk Ambil Sertifikat
					</div>
					@endif
                    <div class="form-group">
                        <label for="nik" class="font-weight-bold">NIK (Nomor Induk Kependudukan)</label>
                        <input type="tel" class="form-control" id="nik" minlength="16" maxlength="16" required autofocus>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="password" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group pt-3">
                        <button class="btn btn-active btn-block" id="submit">Masuk</button>
                    </div>
                     <div class="mx-auto text-center mt-3">
                        <a href="{{url('anggaran')}}" class="text-black-50">
                           <small>Pilih Tahun Anggaran</small>
                        </a>
                     </div>
                </form>
            </div>
        </div>
    </div>
	@include('layouts.partials.script')
    <script src="{{asset('api/auth/login.js')}}"></script>
</body>
</html>