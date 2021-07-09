@extends('layouts/app')

@section('title','Daftar Kelas Online')

@section('style')
	<style>
		#copy {
			z-index: 1;
			position: fixed;
			background: black;
			padding: 10px 30px;
			color: white;
			border-radius: 5px;
			left: 10px;
			bottom: 10px;
		}
	</style>
@endsection

@section('content')
    <section class="text-left">
        <div class="container">
            <h5 class="font-weight-bold text-left">Daftar Kelas Online / Webinar</h5>
            <div class="row my-4" id="data">
				<div class="col-xl-3 col-md-4 col-sm-6 mb-4">
	                <a href="{{url('admin/tambah/kelas')}}">
		                <div class="card text-center d-flex justify-content-center py-5 px-4" style="height:100%">
		                    <i class="mdi mdi-48px mdi-plus"></i>
		                    <h6>Tambah Kelas Online / Webinar</h6>
		                </div>
	                </a>
            	</div>
            </div>
        </div>
    </section>
    <div class="none" id="copy">Kode kelas telah disalin</div>
@endsection

@section('script')
	<script src="{{asset('api/admin/kelas.js')}}"></script>
@endsection