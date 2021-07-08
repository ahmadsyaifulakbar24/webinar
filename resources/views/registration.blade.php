<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Pengisian Daftar Hadir - Webinar</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap">
	<link rel="shortcut icon" href="{{asset('assets/images/logo/garuda.png')}}">
    <style>
		@media only screen and (max-width: 576px) {
		    .card-form {
		        margin: 10px;
		        /*margin-top: 170px;*/
		        border: 1px solid #eaebef;
		        border-radius: 5px;
		    }
		}
    </style>
</head>
<body class="bg-light">
    <div class="card-form-login">
        <div class="card-form">
            <div class="card-body">
        		<h5 class="font-weight-bold text-center">Pengisian Daftar Hadir</h5>
        		<hr>
                <form>
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Nama Lengkap*</label>
                        <input type="text" class="form-control" id="name" autofocus>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email*</label>
                        <input type="email" class="form-control" id="email">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="nik" class="font-weight-bold">NIK (Nomor Induk Kependudukan)*</label>
                        <input type="tel" class="form-control" id="nik" minlength="16" maxlength="16">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth" class="font-weight-bold">Tanggal Lahir*</label>
                        <input type="date" class="form-control" id="date_of_birth">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Jenis Kelamin*</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="gender" type="radio" class="custom-control-input" id="male" value="laki-laki">
                            <label class="custom-control-label" for="male">Laki-Laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="gender" type="radio" class="custom-control-input" id="female" value="perempuan">
                            <label class="custom-control-label" for="female">Perempuan</label>
                        </div>
                        <div id="gender"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="agency" class="font-weight-bold">Instansi</label>
                        <input type="text" class="form-control" id="agency">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="position" class="font-weight-bold">Jabatan</label>
                        <input type="text" class="form-control" id="position">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="font-weight-bold">Alamat*</label>
                        <textarea class="form-control" id="address" rows="3"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="province_id" class="font-weight-bold">Provinsi*</label>
                        <select class="custom-select" id="province_id" role="button">
                        	<option value="" disabled selected>Pilih</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="city_id" class="font-weight-bold">Kab/Kota*</label>
                        <select class="custom-select" id="city_id" role="button">
                        	<option value="" disabled selected>Pilih</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="font-weight-bold">Nomor Telepon*</label>
                        <input type="tel" class="form-control" id="phone_number">
                        <div class="invalid-feedback"></div>
                    </div>
                	<div class="form-group">
                        <label class="font-weight-bold">Pas Foto*</label><br>
                        <div class="d-inline-block" id="choose" role="button">
                            <img src="{{url('assets/images/blank.png')}}" width="200" class="rounded border" id="image"><br>
                            <span class="text-primary" style="padding-left:70px;cursor:pointer">Pilih File</span>
                        </div>
                        <input type="file" id="photo" class="d-none">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group pt-3">
                        <button class="btn btn-active btn-block" id="submit" disabled>Isi Daftar Hadir</button>
                    </div>
                    <a href="{{url('/')}}" class="btn btn-block btn-outline mb-3">Ambil Sertifikat</a>
                </form>
            </div>
        </div>
    </div>
	@include('layouts.partials.script')
    <script src="{{asset('api/auth/registration.js')}}"></script>
</body>
</html>