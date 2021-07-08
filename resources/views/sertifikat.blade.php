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
            margin-left: 200px;
        }

        .qrcode {
            padding-top: 25px;
            padding-left: 10px;
            margin-bottom: -20px;
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
	    	<img id="photo_url" style="width: 100px; position: absolute;top: 50%; left: 50%; margin-top: -160px; margin-left: -50px;">
	        <div class="text-center col-lg-7 d-block mx-auto" style="margin-top:200px;">
	            <div class="tahoma" style="margin-top:15px;">Diberikan Kepada :</div> 
	            <div class="vivaldi" id="name"></div>
	            <div class="tahoma">Sebagai : <span id="role">Peserta</span></div> 
	            <div class="tahoma">Pada Kelas Kelas Online :</div>
	            <div class="tahoma font-pelatihan upercase" id="topic"></div>
	            <div class="tahoma">Pada Tanggal <span id="date"></span>, Jam <span id="time"></span></div>
	            <div class="tahoma">Diselenggarakan oleh :</div>
	            <div class="tahoma">Kementerian Koperasi dan Usaha Kecil dan Menengah Republik Indonesia</div>
	        </div>
	        <br>
	        <div class="float-left">
	            <div class="code text-center">
	                <div class="qrcode mt-3"></div>
	                <!-- <div class="mt-2">
	                    <p style="white-space: pre-line; line-height: 0.8;">
	                        <small style="font-size:12px">Sertifikat Sudah Diotorisasi</small>
	                        <small style="font-size:12px">Secara Elektronik</small>
	                        <small style="font-size:12px">http://siwira.id/kelas-online</small>
	                    </p>
	                </div> -->
	            </div>
	        </div>
	        <div class="float-right ttd-margin" style="margin-right: 200px;">
	            <div class="col-lg-12 text-center">
	                <div class="tahoma">Jakarta, <span id="ttd_tanggal"></span></div>
	                <div class="tahoma">DEPUTI BIDANG PERKOPERASIAN</div>
	                <img class="img-fluid" src="{{ asset('assets/images/harkop.png') }}" width="25%" style="position:absolute; right:500px; top:20px;">
	                <img class="img-fluid" src="{{ asset('assets/images/cap.png') }}" width="35%" style="position:absolute; right:130px; top:20px;">
	                <img class="img-fluid" src="{{ asset('assets/images/ttd.png') }}" width="25%" style="position:absolute; right:100px; top:20px;">
	                <br><br><br>
	                <div class="tahoma">Ahmad Zabadi, SH., MM </div>
	            </div>
	        </div>
	    </div>
	</div>
    @include('layouts.partials.script')
	<script>const code = '{{$code}}'</script>
	<script>const user = '{{$user}}'</script>
    <script src="{{asset('assets/js/date.js')}}"></script>
    <script src="{{asset('assets/vendors/html2pdf/html2pdf.js')}}"></script>
    <script>
    	$.ajax({
		    url: `${api_url}/training/fetch/${code}`,
		    type: 'GET',
		    beforeSend: function(xhr) {
		        xhr.setRequestHeader("Authorization", "Bearer " + token)
		    },
		    success: function(result) {
		        // console.log(result)
		        let value = result.data
		        $('#topic').html(value.topic)
		        $('#date').html(tanggal2(value.date))
		        $('#time').html(value.time.substr(0, 5) + ' WIB')
		    }
		})
    	$.ajax({
		    url: `${api_url}/user/fetch/${user}`,
		    type: 'GET',
		    beforeSend: function(xhr) {
		        xhr.setRequestHeader("Authorization", "Bearer " + token)
		    },
		    success: function(result) {
		        // console.log(result)
		        let value = result.data
		        $('#name').html(value.name)
		        $('#photo_url').attr('src', value.photo_url)
		    }
		})
		let date = new Date()
        let y = date.getFullYear()
        let m = date.getMonth() + 1
        let d = date.getDate()
	    if (m.toString().length < 2) m = '0' + m
        if (d.toString().length < 2) d = '0' + d
        $('#ttd_tanggal').html(tanggal2(`${y}-${m}-${d}`))
    	
    	$(document).ajaxStop(function() {
    		// let filename = $("#file-name").text() + '.pdf'
    		let filename = 'Sertifikat.pdf'
            let element = $('#pdf').html()
            // console.log(element)
            let opt = {
                margin: [0.3, 0.3],
                filename: filename,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
            }
            html2pdf().from(element).set(opt).toPdf().get('pdf').then(function(pdf) {
            	$('#loading').remove()
            	$('#check').show()
            }).save()
            // window.close()
    	})
    </script>
</body>
</html>