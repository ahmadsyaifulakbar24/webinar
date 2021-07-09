<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Detail Peserta - Webinar</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap">
	<link rel="shortcut icon" href="{{asset('assets/images/logo/garuda.png')}}">
</head>
<body>
	<div class="container">
		<div class="my-3" id="card" style="display: none">
			<h5>Detail Peserta</h5>
			<hr>
			<div class="row">
				<div class="col-xl-2 col-lg-3">
					<div class="d-flex flex-column align-items-center">
						<img id="photo_url" class="img-fluid my-3">
						<div id="qrcode" class="d-inline-block my-3"></div>
					</div>
				</div>
				<div class="col-xl-8 col-lg-7">
					<table class="table table-borderless" border=0>
						<tr>
							<th>NIK (Nomor Induk Kependudukan)</th>
							<td id="nik"></td>
						</tr>
						<tr>
							<th>Nama Lengkap</th>
							<td id="name"></td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<td id="date_of_birth"></td>
						</tr>
						<tr>
							<th>Topik</th>
							<td id="topic"></td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td id="date"></td>
						</tr>
						<tr>
							<th>Jam</th>
							<td id="time"></td>
						</tr>
					</table>
					<div class="text-center">
						<img src="{{url('assets/images/valid.png')}}" class="mt-5">
						<div class="font-weight-bold font-italic">Oleh KEMENKOP UKM RI</div>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="path-dark" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
			<i class="mdi mdi-48px mdi-check" id="check" style="display: none"></i>
		</div>
	</div>
	@include('layouts.partials.script')
	<script>const code = '{{$code}}'</script>
	<script src="{{asset('assets/js/date.js')}}"></script>
	<script src="{{asset('assets/vendors/qrcode/qrcode.min.js')}}"></script>
	<script src="{{asset('api/detail.js')}}"></script>
</body>
</html>