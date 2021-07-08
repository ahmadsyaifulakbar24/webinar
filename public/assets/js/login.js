function nik() {
	
	var nik = $('#nik').val()
	var pass = $('#pass').val()
	window.snik = false

	$('#feedback').hide()
	$('#feedback').html('')
	$('#login').attr('disabled','disabled')
	
	if(nik == '' || nik == null) {
		$('#nik').addClass('is-invalid')
		$('#nik-feedback').html('Harap isi bidang ini.')
	}
	else if(nik.length < 16) {
		$('#nik').addClass('is-invalid')
		$('#nik-feedback').html('Minimal 16 digit.')
	}
	else {
		$('#nik').removeClass('is-invalid')
		$('#nik-feedback').html('')

		window.snik = true
		
		if(nik.length > 15 && pass.length > 7) {
			$('#login').removeAttr('disabled')
		}
	}
}

function pass() {
	
	var nik = $('#nik').val()
	var pass = $('#pass').val()
	window.spass = false

	$('#feedback').hide()
	$('#feedback').html('')
	$('#login').attr('disabled','disabled')
	
	if(pass == '' || pass == null) {
		$('#pass').addClass('is-invalid')
		$('#pass-feedback').html('Masukkan password.')
	}
	else if (pass.length < 8) {
		$('#pass').addClass('is-invalid')
		$('#pass-feedback').html('Minimal 8 karakter.')
	}
	else {
		$('#pass').removeClass('is-invalid')
		$('#pass-feedback').html('')

		window.spass = true
		
		if(nik.length > 15 && pass.length > 7) {
			$('#login').removeAttr('disabled','disabled')
		}
	}
}

$('#nik').keyup(function() {
	
	var nik = $('#nik').val()
	var pass = $('#pass').val()
	window.snik = false

	$('#feedback').hide()
	$('#feedback').html('')
	
	if(nik == '' || nik == null) {
		$('#login').attr('disabled','disabled')
	}
	else if(nik.length < 16) {
		$('#login').attr('disabled','disabled')
	}
	else {
		window.snik = true
		$('#login').attr('disabled','disabled')
		
		if(nik.length > 15 && pass.length > 7) {
			$('#login').removeAttr('disabled','disabled')
		}
	}
})

$('#pass').keyup(function() {
	
	var nik = $('#nik').val()
	var pass = $('#pass').val()
	window.spass = false

	$('#feedback').hide()
	$('#feedback').html('')
	
	if(pass == '' || pass == null) {
		$('#login').attr('disabled','disabled')
		$('#btn-show').hide()
	}
	else if(pass.length < 8) {
		$('#login').attr('disabled','disabled')
	}
	else {
		window.spass = true
		$('#login').attr('disabled','disabled')
		
		if(nik.length > 15 && pass.length > 7) {
			$('#login').removeAttr('disabled','disabled')
		}
	}

	if(pass.length > 0) {
		$('#btn-show').show()
	} else {
		$('#btn-show').hide()
	}
})

function login() {
	nik()
	pass()
	
	var vnik = $('#nik').val()
	var vpass = $('#pass').val()

	if(snik == true && spass == true) {
		redirect = $('#login').data('redirect')

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})
		
		$.ajax({
			url: "http://siwira.id/api/user/login",
			type: "POST",
			dataType: "JSON",
			headers: {
				"Accept": "application/json",
				"Content-Type": "application/x-www-form-urlencoded"
			},
			data: {
				nik: vnik,
				password: vpass
			},
			success: function(result) {
				var data = result.data
				window.id = data.id

				$('#text').hide()
				$('#loading').show()
				$('#login').prop('disabled',true)

				$.ajax({
					url:'session/login',
					type: 'POST',
					data: {
						id : id
					},
					success: function(result) {

						$('#feedback').hide()
						$('#feedback').html('')

						$.ajax({
							url: "http://siwira.id/api/user/detail",
							type: "GET",
							dataType: "JSON",
							data: {
								user_id: id
							},
							success : function(data) {
								var res = data.data;
								if(res.jenis_kelamin == null || res.tanggal_lahir == null || res.profile_picture == 'http://siwira.id/images/profile') {
									window.location.href = 'profil'
								} else if(redirect != '') {
									window.location.href = redirect
								} else {
									window.location.href = '/'
								}
							}
						})
					}
				})
			},
			error: function(xhr, ajaxOptions, thrownError){
				// console.log(xhr.responseText)

				$('#feedback').show()
				$('#feedback').html('NIK atau password salah.')
			
				$('#text').show()
				$('#loading').hide()
				$('#login').prop('disabled',false)
			}
		})
	}
}

$('#nik').bind('keypress', function(e) {
	var nik = e.keyCode || e.which;
	if(nik == 13) {
		login()
	}
})
$('#pass').bind('keypress', function(e) {
	var pass = e.keyCode || e.which;
	if(pass == 13) {
		login()
	}
})
$('#login').click(function(){
	login()
})

$('#btn-show').click(function() {
	var text = $('#btn-show').html()
	if(text == 'Tampilkan') {
		$('#pass').attr('type','text')
		$('#btn-show').html('Sembunyikan')
	} else {
		$('#pass').attr('type','password')
		$('#btn-show').html('Tampilkan')
	}
})