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
            <div class="row my-4" id="data"></div>
			<div id="loading" class="none">
				<div class="state d-flex flex-column justify-content-center align-items-center py-5">
					<div class="loader">
						<svg class="circular" viewBox="25 25 50 50">
							<circle class="path-dark" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
						</svg>
					</div>
				</div>
			</div>
			<div class="card-footers hide" id="pagination">
				<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
					<small class="text-secondary pb-3 pb-md-0" id="pagination-label"></small>
					<nav>
						<ul class="pagination pagination-sm mb-0" data-filter="request">
							<li class="page page-item disabled" id="first" role="button">
								<span class="page-link"><i class="mdi mdi-chevron-double-left"></i></span>
							</li>
							<li class="page page-item disabled" id="prev" role="button">
								<span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
							</li>
							<li class="page page-item" id="prevCurrentDouble" role="button"><span class="page-link"></span></li>
							<li class="page page-item" id="prevCurrent" role="button"><span class="page-link"></span></li>
							<li class="page page-item" id="current" role="button"><span class="page-link"></span></li>
							<li class="page page-item" id="nextCurrent" role="button"><span class="page-link"></span></li>
							<li class="page page-item" id="nextCurrentDouble" role="button"><span class="page-link"></span></li>
							<li class="page page-item" id="next" role="button">
								<span class="page-link"><i class="mdi mdi-chevron-right"></i></span>
							</li>
							<li class="page page-item" id="last" role="button">
								<span class="page-link"><i class="mdi mdi-chevron-double-right"></i></span>
							</li>
						</ul>
					</nav>
				</div>
			</div>
        </div>
    </section>
    <div class="none" id="copy">Kode kelas telah disalin</div>
@endsection

@section('script')
	<script src="{{asset('api/admin/kelas.js')}}"></script>
@endsection