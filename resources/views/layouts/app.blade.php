<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title class="topic">@yield('title') - Webinar</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,800&display=swap">
	<link rel="shortcut icon" href="{{asset('assets/images/logo/garuda.png')}}">
	@yield('style')
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-xl navbar-light bg-white d-flex fixed-top shadow">
	    <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="{{url('kelas')}}">
                <img src="{{url('assets/images/logo/logo.png')}}" width="150" alt="SIWIRA" title="SIWIRA • Sistem Informasi Wirausaha">
            </a>
            <div>
            	@if(session("role") == 200)
            	<a href="{{url('profil')}}" class="btn btn-sm btn-active px-3 mr-3">Profil</a>
            	@endif
	        	<div class="btn btn-sm btn-outline" onclick="return logout()">Logout</div>
	        </div>
	    </div>
	</nav>
	@yield('content')
	@include('layouts.partials.script')
	@yield('script')
</body>
</html>