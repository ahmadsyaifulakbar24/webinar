<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unduh Excel</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
</head>
<body>
	<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
		<div class="loader" id="loading">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path-dark" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
			</svg>
		</div>
		<i class="mdi mdi-48px mdi-check" id="check" style="display: none"></i>
	</div>
	<table class="d-none" id="table">
		<tr>
			<th>Topik</th>
			<th>:</th>
			<td id="topic"></td>
		</tr>
		<tr>
			<th>Tanggal</th>
			<th>:</th>
			<td id="date"></td>
		</tr>
		<tr>
			<th>Tanggal Selesai</th>
			<th>:</th>
			<td id="finish_date"></td>
		</tr>
		<tr>
			<th>Jam</th>
			<th>:</th>
			<td id="time"></td>
		</tr>
		<tr>
			<th>Kode Kelas</th>
			<th>:</th>
			<td id="code"></td>
		</tr>
		<tr>
			<th>Jumlah Peserta</th>
			<th>:</th>
			<td id="total"></td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr>
			<th>QRCode</th>
			<th>No</th>
			<th>Nama Lengkap</th>
			<th>Email</th>
			<th>NIK (Nomor Induk Kependudukan)</th>
			<th>Nomor Telepon</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Instansi</th>
			<th>Provinsi</th>
			<th>Kab/Kota</th>
		</tr>
	</table>
    @include('layouts.partials.script')
	<script>const id = '{{$id}}'</script>
    <script src="{{asset('assets/js/date.js')}}"></script>
    <script src="{{asset('assets/vendors/excel/csv.js')}}"></script>
	<script>
    	$.ajax({
		    url: `${api_url}/training/fetch/${id}?with_registration=1`,
		    type: 'GET',
		    async: false,
		    beforeSend: function(xhr) {
		        xhr.setRequestHeader("Authorization", "Bearer " + token)
		    },
		    success: function(result) {
		        // console.log(result)
		        let value = result.data
		        $('#topic').html(value.topic)
		        $('#date').html(tanggal2(value.date))

				let finish_date
				if(value.finish_date != null) {
					finish_date = ' s/d ' + tanggal2(value.finish_date)
				} else {
					finish_date = tanggal2(value.date)
				}
		        $('#finish_date').html(finish_date)
		        $('#time').html(value.time.substr(0, 5) + ' WIB')
		        $('#code').html(value.code)
		        $('#total').html(value.registration.length + ' Orang')
		        $.each(value.registration, function(index, value) {
		        	append = `<tr>
		        		<td>${value.qrcode}</td>
		        		<td>${index + 1}</td>
		        		<td>${value.user.name}</td>
		        		<td>${value.user.email}</td>
		        		<td>'${value.user.nik}</td>
		        		<td>'${value.user.phone_number}</td>
		        		<td>${value.user.gender == 'laki-laki' ? 'Laki-Laki' : 'Perempuan'}</td>
		        		<td>${tanggal2(value.user.date_of_birth)}</td>
		        		<td>${value.user.agency == null ? '' : value.user.agency}</td>
		        		<td>${value.user.province.province}</td>
		        		<td>${value.user.city.city}</td>
		        	</tr>`
		        	$('#table').append(append)
		        })
		        exportTableToExcel('table', `KELAS-${value.code}`)
		        $('#loading').remove()
				$('#check').show()
		    }
		})
	</script>
</body>
</html>