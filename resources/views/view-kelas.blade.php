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
                	<div class="font-weight-bold d-flex align-items-center justify-content-between">
                		<a href="{{url('kelas')}}" class="text-dark">
                    		<i class="mdi mdi-24px mdi-arrow-left"></i>
                    	</a>
                    	<div>
                    		<a target="_blank" class="btn btn-sm btn-outline-primary" id="download" style="display:none">Unduh Sertifikat</a>
                    		<!-- <div class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-delete">Keluar Kelas</div> -->
                    	</div>
                		<small class="font-weight-bol font-italic" id="progress" style="display:none">Masih dalam proses pembuatan sertifikat, mohon tunggu.</small>
                    </div>
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
										</tr>
									</thead>
									<tbody id="table-materi"></tbody>
								</table>
							</div>
							<div class="text-center my-5" id="empty-materi" style="display:none">
								<h6>Belum ada Materi</h6>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
            	<div class="modal-dialog modal-dialog-centered" role="document">
            		<div class="modal-content text-center p-3">
            			<p class="py-5">Anda yakin ingin keluar dari kelas <span class="font-weight-bold topic"></span>?</p>
            			<div class="container">
                			<div class="row">
	                			<button class="col btn btn-outline-danger mr-2" data-toggle="modal" data-target="#option" data-dismiss="modal">Batal</button>
	                			<button class="col btn btn-danger ml-2" id="delete">Keluar</button>
	                		</div>
	                	</div>
            		</div>
            	</div>
            </div>
        </div>
    </section>
@endsection

@section('script')
	<script>const code = '{{$code}}'</script>
    <script src="{{asset('assets/js/date.js')}}"></script>
	<script src="{{asset('api/view-kelas.js')}}"></script>
@endsection