<!Doctype html>
<html>
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="bg-light">
        <div class="card-form-login">
            <div class="card-form">
                <div class="card-body">
                    <div class="text-center">
                        <a href="/">
                            <img src="{{ asset('img/logo/3.png') }}" class="pt-3 pb-5" width="200" />
                        </a>
                    </div>
                    <div id="form">
                        <div class="form-group pb-3">
                            <label for="nik" class="font-weight-bold">Nomor Induk Kependudukan (NIK)</label>
                            <input name="nik" type="tel" class="form-control" id="nik" minlength="16" maxlength="16" placeholder="Masukkan NIK" autofocus>
                            <div class="invalid-feedback" id="nik-feedback"></div>
                        </div>
                        <div class="form-group pb-1">
                            <button class="btn btn-active btn-block" id="search" data-redirect="<?php if(isset($_GET['redirect'])){echo $_GET['redirect'];} ?>" disabled>
                                <span id="text">Cari Sertifikat</span>
                                <span id="loading" style="display:none"><i class="fa fa-circle-notch fa-spin"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/api/kelas-online/api-server.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/api/kelas-online/sertifikatExternal.js') }}"></script>
    </body>
</html>