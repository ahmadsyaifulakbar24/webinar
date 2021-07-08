@extends('layouts/app')

@section('style')
	<style>
		#option .modal-content a:hover {
    		background: #eaebef;
    	}
		#option .modal-content div:hover {
    		background: #eaebef;
    	}
	</style>
@endsection

@section('content')
    <section class="text-left">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                	<h5 class="font-weight-bold">
                		<a href="{{url('kelas')}}" class="text-dark">
                    		<i class="mdi mdi-24px mdi-arrow-left"></i>
                    	</a>
                		<i class="mdi mdi-24px mdi-dots-vertical pointer float-right p-1" data-toggle="modal" data-target="#option"></i>
                    </h5>
                    <div class="card p-4 mb-4 mt-3">
                    	<div class="row flex-sm-row-reverse">
                        	<div class="col-md-4 col-sm-4 form-group">
                        		<div class="form-group">
		                        	<label class="text-secondary">Kode Kelas</label>
									<h6 class="font-weight-bold" id="code"></h6>
								</div>
                        		<img id="poster" class="rounded" style="width:100%">
                        	</div>
                    		<div class="col-md-8 col-sm-8">
	                        	<div class="form-group">
		                        	<label class="text-secondary">Topik</label>
									<h6 class="font-weight-bold topic"></h6>
								</div>
	                        	<div class="form-group">
		                        	<label class="text-secondary">Tanggal</label>
									<h6 class="font-weight-bold" id="date"></h6>
								</div>
	                        	<div class="form-group">
		                        	<label class="text-secondary">Jam</label>
									<h6 class="font-weight-bold" id="time"></h6>
								</div>
	                        	<div class="form-group">
		                        	<label class="text-secondary">Keterangan</label>
									<h6 class="font-weight-bold" id="description"></h6>
								</div>
							</div>
						</div>
						<div class="form-group mt-3">
                        	<label class="text-secondary">Daftar Materi</label>
							<div class="table-responsive">
								<table class="table table-sm table-hovered" style="overflow:scroll">
									<thead>
										<tr>
											<th scope="col" class="text-center">No.</th>
											<th scope="col">Materi</th>
											<th scope="col">JPL</th>
											<th scope="col" colspan="2">Action</th>
										</tr>
									</thead>
									<tbody id="table-materi"></tbody>
								</table>
							</div>
							<div class="text-center my-5" id="empty-materi" style="display:none">
								<h6>Belum ada Materi</h6>
							</div>
						</div>
                    	<div class="form-group mt-3">
                        	<label class="text-secondary">Daftar Peserta</label>
							<div class="table-responsive">
								<table class="table table-sm table-hovered" style="overflow:scroll">
									<thead>
										<tr>
											<th scope="col" class="text-center">No.</th>
											<th scope="col">Nama</th>
											<th scope="col">Nomor KTP</th>
											<th scope="col">Provinsi</th>
										</tr>
									</thead>
									<tbody id="table-peserta"></tbody>
								</table>
							</div>
							<div class="text-center my-5" id="empty" style="display:none">
								<h6>Belum ada peserta</h6>
							</div>
							<!-- <nav id="pagination">
								<ul class="pagination justify-content-end">
									<li class="page page-item disabled" id="first">
										<span class="page-link" tabindex="-1"><i class="pr-0 fa fa-angle-double-left"></i></span>
									</li>
									<li class="page page-item disabled" id="prev">
										<span class="page-link"><i class="pr-0 fa fa-angle-left"></i></span>
									</li>
									<li class="page page-item" id="prevCurrentDouble"><span class="page-link"></span></li>
									<li class="page page-item" id="prevCurrent"><span class="page-link"></span></li>
									<li class="page page-item" id="current"><span class="page-link"></span></li>
									<li class="page page-item" id="nextCurrent"><span class="page-link"></span></li>
									<li class="page page-item" id="nextCurrentDouble"><span class="page-link"></span></li>
									<li class="page page-item" id="next">
										<span class="page-link"><i class="pr-0 fa fa-angle-right"></i></span>
									</li>
									<li class="page page-item" id="last">
										<span class="page-link"><i class="pr-0 fa fa-angle-double-right"></i></span>
									</li>
								</ul>
							</nav> -->
						</div>
                    </div>
                </div>
            </div>
            <div class="modal" id="option" tabindex="-1" role="dialog" aria-labelledby="optionTitle" aria-hidden="true">
            	<div class="modal-dialog modal-dialog-centered" role="document">
            		<div class="modal-content text-center">
        				<a class="text-dark border-bottom rounded-top py-3" id="ubah">Ubah</a>
						<a class="text-dark border-bottom py-3" id="tambah-materi">Tambah Materi</a>
        				<div class="text-danger border-bottom py-3" id="option-delete" data-toggle="modal" data-target="#modal-delete" data-dismiss="modal" role="button">Hapus Kelas</div>
        				<div class="text-dark rounded-bottom py-3" data-dismiss="modal" role="button">Batal</div>
            		</div>
            	</div>
            </div>
            <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
            	<div class="modal-dialog modal-dialog-centered" role="document">
            		<div class="modal-content text-center p-3">
            			<p class="py-5">Anda yakin ingin hapus kelas <span class="font-weight-bold topic"></span>?</p>
            			<div class="container">
                			<div class="row">
	                			<button class="col btn btn-outline-danger mr-2" data-toggle="modal" data-target="#option" data-dismiss="modal">Batal</button>
	                			<button class="col btn btn-danger ml-2" id="delete">Hapus</button>
	                		</div>
	                	</div>
            		</div>
            	</div>
            </div>
            <div class="modal" id="modal-theory" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
            	<div class="modal-dialog modal-dialog-centered" role="document">
            		<div class="modal-content text-center p-3">
            			<p class="py-5">Anda yakin ingin hapus materi <span class="font-weight-bold theory-name"></span>?</p>
            			<div class="container">
                			<div class="row">
	                			<button class="col btn btn-outline-danger mr-2" data-toggle="modal" data-dismiss="modal">Batal</button>
	                			<button class="col btn btn-danger ml-2" id="delete-theory">Hapus</button>
	                		</div>
	                	</div>
            		</div>
            	</div>
            </div>
        </div>
    </section>
@section('content')

@section('script')
	<script>const code = '{{$code}}'</script>
    <script src="{{asset('assets/js/date.js')}}"></script>
	<script src="{{asset('api/admin/view-kelas.js')}}"></script>
@endsection