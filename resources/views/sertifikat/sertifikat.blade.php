<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" />

    <style>
        @font-face {
            font-family: 'Vivaldi Italic';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('css/font/VIVALDII.woff') }}") format('woff');
        }

        @font-face {
            font-family: 'Tahoma';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('css/font/tahoma.woff') }}") format('woff');
        }
        body {
            background:transparent;
            margin:0;
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
            font-size: 19px;
            font-weight: bold;
        }

        .vivaldi {
            font-family: "Vivaldi Italic";
            font-size: 65px;
            font-weight: bold;
        }

        .font-pelatihan {
            font-size: 27px !important;
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
<body>
    <img class="img-background" src="{{ asset('images/back_sertifikat.png') }}" style="width:99.9%">
    <div class="isi-content">
        <div class="text-center col-lg-7 d-block mx-auto" style="margin-top:170px;">
            <div class="tahoma" style="margin-top:15px;">Diberikan Kepada :</div> 
            <div class="vivaldi" style="margin-top:-15px;" id="nama">{{ $profile_external->nama }}</div>
            <div class="tahoma" style="margin-top:-15px;">Telah Mengikuti Kelas Online :</div>
            <div class="tahoma font-pelatihan upercase" id="topik">{{ $profile_external->pelatihan_external->topik }}</div>
            <div class="tahoma" id="tanggal">Pada Tanggal {{ strftime("%d %B %Y", strtotime($profile_external->pelatihan_external->tanggal)) }}</div>
            <div class="tahoma" id="jam">Pukul  {{ substr($profile_external->pelatihan_external->waktu, 0, 5) }} WIB</div>

            <div class="tahoma">Diselenggarakan oleh :</div>
            <div class="tahoma">Kementerian Koperasi dan Usaha Kecil dan Menengah Republik Indonesia</div>
        </div>
        <br>
        <div class="float-left">
            <div class="code text-center">
                @php
                    $link = "http://siwira.id./kelas-online/sertifikat/valid";
                @endphp
                <div class="qrcode mt-3">{!! QrCode::size(100)->generate($link) !!}</div>
                <div class="mt-2">
                    <p style="white-space: pre-line; line-height: 0.8;">
                        <small style="font-size:12px">Sertifikat Sudah Diotorisasi</small>
                        <small style="font-size:12px">Secara Elektronik</small>
                        <small style="font-size:12px">http://siwira.id/kelas-online</small>
                    </p>
                </div>
            </div>
        </div>
        <div class="float-right ttd-margin" style="margin-right: 200px;">
            <div class="col-lg-12 text-center">
                <div class="tahoma" id="ttd_tanggal">Jakarta, {{ strftime("%d %B %Y", strtotime($profile_external->pelatihan_external->tanggal)) }}</div>
                <div class="tahoma">DEPUTI BIDANG PENGEMBANGAN SDM &nbsp &nbsp &nbsp</div>
                <!-- <img class="img-fluid" src="{{ asset('images/capttd.png') }}" width="70%" style="position:absolute; right:50px; top:20px;"> -->
                <br><br><br>
                <div class="tahoma">Ir. Arif Rahman Hakim, MS</div>
            </div>
        </div>
    </div>
</body>
</html>