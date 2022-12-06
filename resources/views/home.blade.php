<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Webinar</title>

        <link href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
        <link href="http://sertifikat.siwira.id/public/foto/logo_sertifikat_icon.ico" rel="shortcut icon">
        <link href="{{asset('assets/vendors/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" >
        <style>
            .a:hover {
                color: #fff;
                text-decoration: none;
            }
            .card-2022 {
                background-image: url('{{asset('assets/images/home/2022.jpg')}}');
                background-position: top !important;
            }
            .card-2023 {
                background-image: url('{{asset('assets/images/home/2024.png')}}');
                background-position: top !important;
            }
            .card-soon {
                /*background-image: url('{{asset('assets/images/home/soon.png')}}');*/
                background-color: #818181
            }
            .card-certificate {
                height: 290px;
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                border-radius: 10px;
                transition: 0.2s;
            }
            .card-certificate:hover {
                box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
            }

            .h1-certificate {
                position: absolute;
               margin-left: auto;
               margin-right: auto;
               left: 0;
               right: 0;
               text-align: center;
               top: 40%;
                /* bottom: 10px;
                padding-left: 20px; */
            }

            .owl-nav button.owl-next {
                position: absolute;
                outline: none;
                bottom: 45%;
                right: -45px;
            }
            .owl-nav button.owl-next:hover {
                background: transparent !important;
            }
            .owl-nav button.owl-prev {
                position: absolute;
                outline: none;
                bottom: 45%;
                left: -45px;
            }
            .owl-nav button.owl-prev:hover {
                background: transparent !important;
            }

            .text-orange {
                color: #f5862b;
            }
            .text-orange:hover {
                color: #f5862b;
            }
            .text-kukm {
                color: #105268;
            }
            .text-kukm:hover {
                color: #105268;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="font-weight-bold py-3">Pilih Tahun Anggaran:</h2>

            <div class="owl-carousel">
                <div class="item p-3">
                	<a href="{{asset('/login')}}" class="a text-orange">
                        <div class="card-2022 card-certificate border">
                            <h1 class="h1-certificate display-3 font-weight-bold">2022</h1>
                        </div>
                    </a>
                </div>
                <div class="item p-3">
                	<a href="https://e-sertifikat.kemenkopukm.go.id/login" class="a text-kukm">
                        <div class="card-2023 card-certificate border">
                            <h1 class="h1-certificate display-3 font-weight-bold">2023</h1>
                        </div>
                    </a>
                </div>
                <!-- <div class="item p-3">
                    <a href="javascript:void(0)" class="a text-white">
                        <div class="card-soon card-certificate border pt-2">
                            <h1 class="text-center display-3 font-weight-bold">Coming Soon</h1>
                            <h1 class="h1-certificate display-3 font-weight-bold">2024</h1>
                        </div>
                    </a>
                </div> -->
            </div>

            <h2 class="font-weight-bold py-3">Kontak Kami:</h2>
            <div class="row text-left">
                <div class="col-xl-4 col-lg-6 mb-2">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa fa-fw fa-map-marker-alt fa-3x"></i>
                            </div>
                            <div class="col">
                                <h5 class="font-weight-bold">Alamat Kantor</h5>
                                <small class="text-secondary">
                                    Jl. Hr. Rasuna Said Kav 3-4, Kuningan, Setia Budi, Jakarta Selatan, DKI Jakarta, 12940.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 mb-2">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col-3">
                                <i class="far fa-fw fa-envelope fa-3x"></i>
                            </div>
                            <div class="col">
                                <h5 class="font-weight-bold">Email</h5>
                                <small class="text-secondary">
                                    bti@kemenkopukm.go.id
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 mb-2">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa fa-fw fa-phone fa-3x"></i>
                            </div>
                            <div class="col">
                                <h5 class="font-weight-bold">Technical Support</h5>
                                <small class="text-secondary">
                                    <ol class="pl-4">
                                        <li class="mb-2">
                                            Sugianto<br>
                                            +62 812-9795-2899
                                        </li>
                                        <li class="mb-2">
                                            Edi Yanto<br>
                                            +62 858-8269-4727
                                        </li>
                                        <li class="mb-2">
                                            Aditya Bayu<br>
                                            +62 812-1029-4688
                                        </li>
                                    </ol>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/vendors/owlcarousel/owl.carousel.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.owl-carousel').owlCarousel({
                	startPosition: 0,
                    loop: false,
                    margin: 10,
                    nav: true,
                    navText:
                    [
                        "<img src='{{asset('assets/images/icon/arrow-left.png')}}' title='Previous Slide'>",
                        "<img src='{{asset('assets/images/icon/arrow-right.png')}}' title='Next Slide'>"
                    ],
                    responsive:{
                        0:{
                            items:1
                        },
                        992:{
                            items:2
                        }
                    }
                })
            })
        </script>
    </body>
</html>


