<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Pengisian Data Profil - Webinar</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/croppie/croppie.css')}}">
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
<body class="bg-light">
    <div class="card-form-login">
        <div class="card-form">
            <div class="card-body">
        		<h5 class="font-weight-bold text-center">Pengisian Data Profil</h5>
        		<hr>
                <form>
                    <div class="form-group">
                        <label for="name" class="font-weight-bold mb-0">Nama Lengkap*</label>
                        <div class="small text-secondary pb-2">*tanpa gelar</div>
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
                    <label for="date_of_birth" class="font-weight-bold d-block">Tanggal Lahir*</label>
	                <div class="form-group">
	                	<div class="row">
			                <div class="col-4">
			                    <select id="date" class="custom-select" role="button">
			                    	<option value="" disabled selected>Pilih</option>
			                    	@for ($i = 1; $i <= 31; $i++)
				                    	@if ($i < 10)
					                    	<option value="0{{$i}}">0{{$i}}</option>
				                    	@else
					                    	<option value="{{$i}}">{{$i}}</option>
				                    	@endif
			                    	@endfor
			                    </select>
			                </div>
			                <div class="col-8 pl-0">
			                    <input type="month" class="form-control" id="month">
			                </div>
		                </div>
		                <input type="hidden" id="date_of_birth">
	                    <div class="invalid-feedback"></div>
	                </div>
                    <div class="form-group">
                        <label class="d-block font-weight-bold">Jenis Kelamin*</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="gender" type="radio" class="custom-control-input" id="male" value="laki-laki">
                            <label class="custom-control-label" for="male" role="button">Laki-Laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="gender" type="radio" class="custom-control-input" id="female" value="perempuan">
                            <label class="custom-control-label" for="female" role="button">Perempuan</label>
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
                        <label for="address" class="font-weight-bold">Alamat Rumah*</label>
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
                        <input type="tel" class="form-control" id="phone_number" maxlength="15">
                        <div class="invalid-feedback"></div>
                    </div>
                	<div class="form-group">
                        <label class="font-weight-bold">Pas Foto*</label>
                        <div class="small text-secondary pb-2">*pasfoto nantinya digunakan sebagai foto peserta didalam e-sertifikat</div>
                        <div class="d-inline-block" id="choose" role="button">
                            <img src="{{url('assets/images/blank.png')}}" width="200" class="rounded border" id="image"><br>
                            <span class="text-active" style="padding-left:60px">Pilih Foto</span>
                        </div>
                        <input type="file" id="photo" class="none" accept="image/*">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group pt-3">
                        <button class="btn btn-active btn-block" id="submit" disabled>Submit</button>
                    </div>
                    <!-- <a href="{{url('/')}}" class="btn btn-block btn-outline mb-3">Ambil Sertifikat</a> -->
                </form>
            </div>
        </div>
        <div class="modal" id="modal-photo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="photo-body" class="none">
                        	<div id="photo-preview"></div>
                        	<div class="text-center">
		                        <i class="mdi mdi-24px mdi-refresh mdi-flip-h" id="RotateClockwise" role="button"></i>
		                        <i class="mdi mdi-24px mdi-refresh" id="RotateAntiClockwise" role="button"></i>
                        	</div>
                        </div>
                        <div class="container mt-3">
                        	<p class="text-danger none pb-3" id="feedback-file"></p>
                            <div class="row">
                                <button class="col btn btn-outline mr-2" data-dismiss="modal">Batal</button>
                                <button class="col btn btn-active ml-2" id="apply">Terapkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	@include('layouts.partials.script')
    <script src="{{asset('assets/js/photo.js')}}"></script>
    <script src="{{asset('assets/vendors/croppie/croppie.min.js')}}"></script>
    <script src="{{asset('api/auth/registration.js')}}"></script>
</body>
</html>