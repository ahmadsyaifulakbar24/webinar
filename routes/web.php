<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('session/login', [SessionController::class, 'createSession']);
Route::get('session/logout', [SessionController::class, 'deleteSession']);

Route::group(['middleware'=>['afterMiddleware']], function () {
	Route::get('/', function () {
	    return view('login');
	});
	Route::get('pengisian-data-profil', function () {
	    return view('registration');
	});
});

Route::group(['middleware'=>['beforeMiddleware']], function () {
	Route::group(['middleware'=>['adminMiddleware']], function () {
		// Kelas
		Route::get('admin/kelas', function () {
		    return view('admin/kelas');
		});
		Route::get('admin/tambah/kelas', function() {
			return view('admin/tambah-kelas');
		});
		Route::get('admin/kelas/{code}', function($code) {
			return view('admin/view-kelas', compact('code'));
		});
		Route::get('admin/ubah/kelas/{code}', function($code) {
			return view('admin/ubah-kelas', compact('code'));
		});

		// Materi
		Route::get('admin/tambah/materi/{code}', function($code) {
			return view('admin/tambah-materi', compact('code'));
		});
		Route::get('admin/ubah/materi/{code}/{materi_id}', function($code, $theory) {
			return view('admin/ubah-materi', compact('code', 'theory'));
		});

		// Route::get('kelas-online/kelas/{token}/export', 'ExportController@profile_external_export')->name('peserta_external_export');
	});

	Route::group(['middleware'=>['userMiddleware']], function () {
		Route::get('kelas', function () {
		    return view('kelas');
		});
		Route::get('kelas/{code}', function($code) {
			return view('view-kelas', compact('code'));
		});
	});
	
	Route::get('sertifikat/{code}', function($code) {
		return view('sertifikat', compact('code'));
	});
});

Route::get('detail/{code}', function($code) {
	return view('detail', compact('code'));
});
