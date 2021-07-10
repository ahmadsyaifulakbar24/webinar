@extends('layouts/app')

@section('title','Ubah Kelas Online')

@section('content')
    <section class="text-left">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="d-flex align-items-center">
                    	<div class="text-dark mr-2" onclick="return history.back()" role="button">
                    		<i class="mdi mdi-24px mdi-arrow-left"></i>
                    	</div>
                        <h5 class="font-weight-bold mb-0">Ubah Kelas Online / Webinar</h5>
                    </div>
                    <div class="card p-4 mb-4 mt-3">
                    	<form>
                            <div class="form-group">
                                <label class="font-weight-bold">Poster</label><br>
                                <div class="d-inline-block" id="choose" role="button">
	                                <img src="{{url('assets/images/blank.png')}}" width="200" class="rounded border" id="image"><br>
	                                <span class="text-primary" style="padding-left:70px;cursor:pointer">Pilih File</span>
	                            </div>
                                <input type="file" id="poster" class="d-none" accept="image/*">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="topic" class="font-weight-bold">Topik</label>
                                <input type="text" class="form-control" id="topic">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-row">
	                            <div class="form-group col-md-6">
	                                <label for="unit_id" class="font-weight-bold">Unit</label>
	                                <select class="custom-select" id="unit_id" role="button">
	                                    <option disabled selected>Pilih</option>
	                                </select>
	                                <div class="invalid-feedback"></div>
	                            </div>
	                            <div class="form-group col-md-6">
	                                <label for="sub_unit_id" class="font-weight-bold">Jenis Kegiatan Pelatihan</label>
	                                <select class="custom-select" id="sub_unit_id" role="button" disabled>
	                                    <option disabled selected>Pilih</option>
	                                </select>
	                                <div class="invalid-feedback"></div>
	                            </div>
	                        </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="date" class="font-weight-bold">Tanggal</label>
                                    <input type="date" class="form-control" id="date">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="time" class="font-weight-bold">Jam</label>
                                    <input type="time" class="form-control" id="time">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="font-weight-bold">Keterangan</label>
								<div id="description"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="font-weight-bold">Status</label>
                                <select class="custom-select" id="status" role="button">
                                    <option disabled selected>Pilih</option>
                                    <option value="publish">Publish</option>
                                    <option value="unpublish">Save Draft/Unpublish</option>
                                    <option value="finish">Finish</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
	                        <div class="form-group pt-3">
	                            <button class="btn btn-active btn-block" id="submit" disabled>Simpan</button>
	                        </div>
	                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-photo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="my-3" id="image-form">
                        	<input type="file" class="d-none" id="image">
                        	<label class="image-text" for="image" style="cursor:pointer;">
                        		<i class="far fa-image fa-4x"></i>
                        		<p>Pilih file</p>
                        	</label>
                        </div>
                        <div class="text-left" id="image-preview" style="display:none"></div>
                        <div class="container">
                            <div class="row">
                                <button class="col btn btn-outline mr-2" data-dismiss="modal">Batal</button>
                                <button class="col btn btn-active ml-2" id="upload" disabled>Simpan</button>
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
    <script src="{{asset('assets/vendors/ckeditor/ckeditor.js')}}"></script>
    <script>
		let description = ''
        ClassicEditor.create(document.querySelector('#description')).then(editor => {
            description = editor
			editor.editing.view.document.on( 'keydown', ( evt, data ) => {
	        	$('#description').removeClass('is-invalid')
			})
        })
	</script>
	<script src="{{asset('api/admin/ubah-kelas.js')}}"></script>
@endsection