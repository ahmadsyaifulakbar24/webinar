<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-size: 21px;
        }

        .jarak {
            margin: 0;
            position: absolute;
            width:100%;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .head {
            text-align: center;
            font-size: 27px !important;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .head2 {
            font-size: 27px !important;
        }
    </style>
</head>
<body>

    <div class="jarak">
        <div class="head">
            <div class="head2 text-uppercase">MATERI</div>
            <div class="head2 text-uppercase" id="topik">{{ $profile_external->pelatihan_external->topik }}</div>
            <div>{{ strftime('%d %B %Y', strtotime($profile_external->pelatihan_external->tanggal)) }},  {{ substr($profile_external->pelatihan_external->waktu, 0, 5) }} WIB</div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <table class="table table-bordered text-uppercase">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Materi Pelatihan</th>
                            <th>JPL</th>
                        </tr>
                    </thead>
                    <tbody id="table-materi">
                        @php 
                            $no = 1; 
                            $jumlahJPL = 0;
                        @endphp
                        @foreach($profile_external->pelatihan_external->materi_pelatihan as $materi)
                        <tr>
                            <td class="text-center" style="width:5%; vertical-align: middle;">{{ $no++ }}</td>
                            <td class="text-uppercase">{{ $materi->materi }}</td>
                            <td class="text-center" style="width:5%; vertical-align: middle;">{{ $materi->jpl }}</td>
                        </tr>
                        <?php
                            $jumlahJPL += $materi->jpl;
                        ?>
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-center font-weight-bold">Jumlah</td>
                            <td class="text-center font-weight-bold">{{ $jumlahJPL }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>