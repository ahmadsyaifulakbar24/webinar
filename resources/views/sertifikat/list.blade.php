<!Doctype html>
<html>
    <head>
    	<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <title class="topik"> • SIWIRA</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap" />
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/theme/style.css')}}" />
        <link rel="icon" href="{{asset('img/logo/garuda.png')}}" />
        <style type="text/css">
        	a.py-3:hover {
        		background: #eaebef;
        	}
        </style>
    </head>
    <body style="margin-top:30px">
        <section class="text-left">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    	<h5 class="font-weight-bold">
	                		<a href="{{ url('kelas-online/sertifikat') }}" class="text-dark mr-2">
	                    		<i class="fa fa-arrow-left"></i>
	                    	</a>
	                    </h5>
                        <div class="card p-4 mb-4 mt-3">
                        	<div class="row flex-sm-row-reverse">
                        		<div class="col-md-12 col-sm-12">
		                        	<div class="form-group">
			                        	<label class="text-secondary">NIK</label>
										<h6 class="font-weight-bold" id="nik"></h6>
									</div>
		                        	<div class="form-group">
			                        	<label class="text-secondary">Nama</label>
										<h6 class="font-weight-bold" id="nama"></h6>
									</div>
		                        	<div class="form-group">
			                        	<label class="text-secondary">Tempat Tanggal Lahir</label>
										<h6 class="font-weight-bold" id="ttl"></h6>
									</div>
		                        	<div class="form-group">
			                        	<label class="text-secondary">Telp/ HP</label>
										<h6 class="font-weight-bold" id="telp"></h6>
									</div>
								</div>
                            </div>
                            <div class="form-group mt-3">
	                        	<label class="text-secondary">Daftar Sertifikat</label>
								<div class="table-responsive">
									<table class="table table-sm table-hovered" style="overflow:scroll">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Topik</th>
												<th scope="col" colspan="2">Unduh Sertifikat</th>
											</tr>
										</thead>
										<tbody id="table-sertifikat"></tbody>
									</table>
								</div>
								<div class="text-center my-5" id="loading-sertifikat" style="display:none">
									<img src="{{url('images/ajax-loader.gif')}}">
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.partials.script-kelas')
		<script type="text/javascript" src="{{asset('/vendor/api/kelas-online/api-server.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendor/js/date.js')}}"></script>
        <script type="text/javascript">
            const nik = '{{Request::route("nik")}}'
        </script>
		<script type="text/javascript" src="{{asset('/vendor/api/kelas-online/listSertifikat.js')}}"></script>
    </body>
</html>