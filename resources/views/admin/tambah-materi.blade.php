@extends('layouts/app')

@section('content')
    <section class="text-left">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="d-flex align-items-center">
                    	<div class="text-dark mr-2" onclick="return history.back()" role="button">
                    		<i class="mdi mdi-24px mdi-arrow-left"></i>
                    	</div>
                        <h5 class="font-weight-bold mb-0">Tambah Materi</h5>
                    </div>
                    <div id="biodata" class="mt-3">
                        <div class="card p-4 mb-4">
                            <h3 class="font-weight-bold text-center pt-4 pb-5">Daftar Kelas</h3>
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
                        </div>
                        <form class="card p-4 mb-4" id="materi">
                            <h3 class="font-weight-bold text-center py-4">Materi</h3>
                            <div class="form-group">
                                <label for="theory" class="font-weight-bold">Materi Pelatihan</label>
                                <textarea class="form-control" id="theory" rows="4"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
		                    <div class="form-group pt-3">
		                        <button class="btn btn-active btn-block" id="submit">Tambah Materi</button>
		                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
	<script>const code = '{{$code}}'</script>
    <script src="{{asset('assets/js/date.js')}}"></script>
	<script src="{{asset('api/admin/tambah-materi.js')}}"></script>
@endsection