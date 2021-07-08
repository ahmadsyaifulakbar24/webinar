@extends('layouts/app')

@section('title','Kelas')

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
            <h5 class="font-weight-bold text-left">Daftar Kelas Online</h5>
            <div class="row my-4" id="data">
				<div class="col-xl-3 col-md-4 col-sm-6 mb-4">
	                <div class="card text-center d-flex justify-content-center py-5" style="height:100%" data-toggle="modal" data-target="#modal-kelas" role="button">
	                    <i class="mdi mdi-48px mdi-plus"></i>
	                    <h6>Tambah Kelas Online</h6>
	                </div>
            	</div>
            </div>
        </div>
    </section>
    <div class="modal" id="modal-kelas" tabindex="-1" role="dialog" aria-labelledby="deleteTitle" aria-hidden="true">
    	<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="mb-0">Tambah Kelas Online</h5>
    			</div>
    			<form class="modal-body">
	    			<div class="form-group">
	    				<label for="code">Kode Kelas</label>
	    				<input type="text" class="form-control" id="code" minlength="6" maxlength="6" required>
	    				<div class="invalid-feedback"></div>
	    			</div>
	    			<div id="kelas" style="display: none;">
                    	<div class="form-group">
                        	<label class="text-secondary">Topik</label>
							<h6 class="font-weight-bold" id="topic"></h6>
						</div>
						<div class="form-row">
	                    	<div class="col form-group">
	                        	<label class="text-secondary">Tanggal</label>
								<h6 class="font-weight-bold" id="date"></h6>
							</div>
	                    	<div class="col form-group">
	                        	<label class="text-secondary">Jam</label>
								<h6 class="font-weight-bold" id="time"></h6>
							</div>
						</div>
		    			<div class="form-group">
		    				<label for="role_id">Peran</label>
		    				<select class="custom-select" id="role_id" role="button">
		    					<option value="" disabled selected>Pilih</option>
		    				</select>
		    				<div class="invalid-feedback"></div>
		    			</div>
		    		</div>
	    			<div class="container">
	        			<div class="row pt-3">
	            			<div class="col btn btn-outline mr-2" data-toggle="modal" data-dismiss="modal">Batal</div>
	            			<div class="col btn btn-active ml-2" id="search">Cari</div>
	            			<button class="col btn btn-active ml-2" id="submit" style="display: none">Tambah</button>
	            		</div>
	            	</div>
	            </form>
    		</div>
    	</div>
    </div>
    <div class="none" id="copy">Kode kelas telah disalin</div>
@endsection

@section('script')
    <script src="{{asset('assets/js/date.js')}}"></script>
	<script src="{{asset('api/kelas.js')}}"></script>
@endsection