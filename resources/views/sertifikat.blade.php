<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Unduh Sertifikat</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">

    <style>
        @font-face {
            font-family: 'Vivaldi Italic';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('assets/css/font/VIVALDII.woff') }}") format('woff');
        }

        @font-face {
            font-family: 'Tahoma';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('assets/css/font/tahoma.woff') }}") format('woff');
        }
        body {
            background:transparent;
            margin:0;
            font-size: 10px !important;
        }
        .img-background {
            position: relative;
            z-index: 1;
            top: 0;
            width: 100%;
        }
        .isi-content{
            position:absolute;
            top:120px;
            z-index:2;
            width:100%;
        }
        .tahoma {
            font-family: "Tahoma";
            /*font-size: 19px;*/
            font-size: 13px;
            font-weight: bold;
        }

        .vivaldi {
            font-family: "Vivaldi Italic";
            /*font-size: 65px;*/
            font-size: 40px;
            font-weight: bold;
        }

        .font-pelatihan {
            /*font-size: 27px !important;*/
            font-size: 17px !important;
            font-weight: bold;
        }

        .upercase {
            text-transform: uppercase;
        }

        @page {
            size: auto;
        }

        .foto {
            border: 1px solid #000000;
            width: 90px;
            height: 120px;
        }

        .ttd-margin {
            margin-right: 250px;
        }

        .code {
            margin-top: -40px;
            margin-left: 250px;
        }

        .qrcode {
            padding-top: 80px;
            padding-left: 0px;
            margin-bottom: -10px;
        }
    </style>

</head>
<body class="text-center">
	<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
		<div class="loader" id="loading">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path-dark" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
			</svg>
		</div>
		<i class="mdi mdi-48px mdi-check" id="check" style="display: none"></i>
	</div>
	<div class="d-none" id="pdf">
		<img class="img-background" src="{{ asset('assets/images/back_sertifikat.png') }}" style="width:97%">
		<div class="isi-content">
			<!-- <img id="photo_url" style="width: 100px; position: absolute;top: 50%; left: 50%; margin-top: -190px; margin-left: -50px;"> -->
			<img id="photo_url" style="width: 80px; margin-top: 100px;" class="text-center">
			<div class="text-center col-lg-9 d-block mx-auto" style="margin-top:10px;">
				<div class="tahoma">Diberikan Kepada :</div> 
				<div class="vivaldi" id="name" style="margin-top:-7px;"></div>
				<div class="tahoma">Sebagai <u id="role"></u></div> 
				<div class="tahoma">Kelas Online/ Webinar :</div>
				<div class="tahoma font-pelatihan upercase" id="topic"></div>
				<div class="tahoma">Pada Tanggal <span id="date"></span><span id="time"></span></div>
				<div class="tahoma">Diselenggarakan oleh :</div>
				<div class="tahoma">Kementerian Koperasi dan Usaha Kecil dan Menengah Republik Indonesia</div>
			</div>
			<br>
			<div class="float-left">
				<div class="code text-center">
					<div class="qrcode" id="qrcode">{!! QrCode::size(70)->generate(Request::root().'/detail/'.$qrcode) !!}</div>
					<div class="mt-2">
						<p style="white-space: pre-line; line-height: 0.8;">
							<small style="font-size:10px">Pindai untuk memeriksa</small>
							<small style="font-size:10px">keaslian dokumen</small>
							<!-- <small style="font-size:12px">http://siwira.id/kelas-online</small> -->
						</p>
					</div>
				</div>
			</div>
			<div class="float-right ttd-margin" style="margin-right: 170px;margin-top: 20px;">
				<div class="col-lg-12 text-center ttd">
					<div class="tahoma">Jakarta, <span id="ttd_tanggal"></span></div>
					<div class="tahoma" id="ttd_unit"></div>
					<div class="tahoma harkopnas">Selaku Ketua Panitia Peringatan Hari Koperasi ke 74</div>
					<img class="img-fluid harkopnas" src="{{ asset('assets/images/harkop.png') }}" width="90" style="position:absolute; right:350px; top:10px;">
					<img class="img-fluid cap" src="{{ asset('assets/images/cap.png') }}" width="90" style="position:absolute; right:175px; top:30px;z-index: 99;">
					<img class="img-fluid ttd_path" width="100" style="position:absolute; right:120px; top:30px;" id="ttd_path">
					<br><br><br>
					<div class="tahoma" id="ttd_name"></div>
				</div>
			</div>
		</div>
		
		<div id="materiData" style="margin-top : 75px">
			<div class="container">
				<div class="row justify-content-md-center align-items-center">
					<div class="col-md-10">
						<div class="tahoma" style="font-size: 25px;">Kelas Online/ Webinar :</div>
						<div id="topic2" style="font-size: 20px;"></div>
						<table class="table table-bordered mt-4">
							<thead style="font-size: 25px;">
								<tr>
									<th style="width: 10%">No</th>
									<th>Materi</th>
								</tr>
							</thead>
							<tbody id="materi" style="font-size: 20px;"> </tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-2">
						<div class="text-center">
							<div id="qrcode" style="margin-top: 30px">{!! QrCode::size(70)->generate(Request::root().'/detail/'.$qrcode) !!}</div>
							<div class="mt-2">
								<p style="white-space: pre-line; line-height: 0.8;">
									<small style="font-size:10px">Pindai untuk memeriksa</small>
									<small style="font-size:10px">keaslian dokumen</small>
									<!-- <small style="font-size:12px">http://siwira.id/kelas-online</small> -->
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @include('layouts.partials.script')
	<script>const code = '{{$code}}'</script>
    <script src="{{asset('assets/js/date.js')}}"></script>
	<script src="{{asset('assets/vendors/qrcode/qrcode.min.js')}}"></script>
    <script src="{{asset('assets/vendors/html2pdf/html2pdf.js')}}"></script>
    <script>
    	$.ajax({
		    url: `${api_url}/registration/fetch/${code}`,
		    type: 'GET',
		    async: false,
		    beforeSend: function(xhr) {
		        xhr.setRequestHeader("Authorization", "Bearer " + token)
		    },
		    success: function(result) {
		        // console.log(result)
		        let value = result.data
				let finish_date
		        $('#topic').html(value.training.topic)
				if(value.training.finish_date != null) {
					finish_date = ' s/d ' + tanggal2(value.training.finish_date)
					$('#time').addClass('d-none');
				} else { finish_date = '' }
		        $('#date').html(tanggal2(value.training.date) + finish_date)
		        $('#time').html(', Jam ' + value.training.time.substr(0, 5) + ' WIB')
		        
		        $('#name').html(value.user.name)
		        $('#photo_url').attr('src', value.user.photo_url)
		        
		        $('#role').html(value.role.param)
		        
		        $('#ttd_name').html(value.training.ttd.name)
		        $('#ttd_unit').html(value.training.ttd.unit)
		        $('#ttd_path').attr('src', `${root}/${value.training.ttd.ttd_path}`)

		        if (value.training.harkopnas == 0) {
		        	$('.harkopnas').hide()
		        	$('.cap').css('top', '20px')
		        	$('.ttd_path').css('top', '10px')
		        	if (value.training.ttd.id != 3) {
			        	$('.ttd').css('margin-right', '140px')
		        	} else {
			        	$('.ttd').css('margin-right', '20px')
		        	}
		        }

		        let date = new Date()
		        let y = date.getFullYear()
		        let m = date.getMonth() + 1
		        let d = date.getDate()
			    if (m.toString().length < 2) m = '0' + m
		        if (d.toString().length < 2) d = '0' + d
		        $('#ttd_tanggal').html(tanggal2(`${y}-${m}-${d}`))

				var no = 1
				if(Array.isArray(value.training.theory) && !value.training.theory.length) {
					$('#materiData').addClass('d-none')
				} else {
					$('#topic2').html('"' + value.training.topic + '"')
					$.each(value.training.theory, function(index, value) {
						appendMateri = `
							<tr>
								<td>`+ no++ +`</td>
								<td class="text-left">`+ value.theory +`</td>
							</tr>
						`
						$('#materi').append(appendMateri)
					})
				}
		        // new QRCode(document.getElementById('qrcode'), {
			    //     text: `${root}/detail/${value.qrcode}`,
			    //     width: 70,
			    //     height: 70,
			    //     colorDark: '#000000',
			    //     colorLight: '#ffffff',
			    //     correctLevel: QRCode.CorrectLevel.H
			    // })

				let filename = `${value.training.code}_${value.user.nik}.pdf`
				let element = $('#pdf').html()
				let opt = {
					margin: [0, 0],
					filename: filename,
					image: { type: 'jpeg', quality: 0.98 },
					html2canvas: { scale: 3 },
					jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
				}
				html2pdf().from(element).set(opt).toPdf().get('pdf').then(function(pdf) {
					$('#loading').remove()
					$('#check').show()
				}).save()
		    }
		})
    </script>
</body>
</html>