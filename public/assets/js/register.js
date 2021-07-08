function name() {
	var name = $('#name').val()
	window.sname = false
	if(name == '' || name == null) {
		$('#name').addClass('is-invalid')
		$('#name-feedback').html('Masukkan nama lengkap.')
	}
	else if (!/^[a-z A-Z]*$/g.test(name)) {
		$('#name').addClass('is-invalid')
		$('#name-feedback').html('Masukkan nama lengkap dengan benar.')
	}
	else {
		$('#name').addClass('is-valid')
		$('#name').removeClass('is-invalid')
		$('#name-feedback').html('')
		window.sname = true
	}
}
function nik() {
	var nik = $('#nik').val()
	window.snik = false
	if(nik == '' || nik == null) {
		$('#nik').addClass('is-invalid')
		$('#nik-feedback').html('Masukkan NIK.')
	}
	else if (nik.length < 16) {
		$('#nik').addClass('is-invalid')
		$('#nik-feedback').html('Masukkan 16 digit angka.')
	}
	else if (nik.length > 16) {
		$('#nik').addClass('is-invalid')
		$('#nik-feedback').html('Maksimal 16 digit angka.')
	}
	else if (!/^[0-9]*$/g.test(nik)) {
		$('#nik').addClass('is-invalid')
		$('#nik-feedback').html('Masukkan NIK dengan benar.')
	}
	else {
		$('#nik').addClass('is-valid')
		$('#nik').removeClass('is-invalid')
		$('#nik-feedback').html('')
		window.snik = true
	}
}
function phone() {
	var phone = $('#phone').val()
	window.sphone = false
	if(phone == '' || phone == null) {
		$('#phone').addClass('is-invalid')
		$('#phone-feedback').html('Masukkan nomor telepon.')
	}
	else if (!/^[0-9]*$/g.test(phone)) {
		$('#phone').addClass('is-invalid')
		$('#phone-feedback').html('Masukkan nomor telepon dengan benar.')
	}
	else if (phone.length < 8) {
		$('#phone').addClass('is-invalid')
		$('#phone-feedback').html('Masukkan nomor telepon dengan benar.')
	}
	else if (phone.length > 20) {
		$('#phone').addClass('is-invalid')
		$('#phone-feedback').html('Masukkan nomor telepon dengan benar.')
	}
	else {
		$('#phone').addClass('is-valid')
		$('#phone').removeClass('is-invalid')
		$('#phone-feedback').html('')
		window.sphone = true
	}
}
function email() {
	var email = $('#email').val()
	window.semail = false
	var r = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
	if(email == '' || email == null) {
		$('#email').addClass('is-invalid')
		$('#email-feedback').html('Masukkan email.')
	}
	else if (!r.test(email)) {
		$('#email').addClass('is-invalid')
		$('#email-feedback').html('Masukkan email dengan benar.')
	}
	else {
		$('#email').addClass('is-valid')
		$('#email').removeClass('is-invalid')
		$('#email-feedback').html('')
		window.semail = true
	}
}
function password() {
	var password = $('#password').val()
	window.spassword = false
	if(password == '' || password == null) {
		$('#password').addClass('is-invalid')
		$('#password-feedback').html('Masukkan password.')
	}
	else if (password.length < 8) {
		$('#password').addClass('is-invalid')
		$('#password-feedback').html('Minimal 8 karakter.')
	}
	else {
		$('#password').addClass('is-valid')
		$('#password').removeClass('is-invalid')
		$('#password-feedback').html('')
		window.spassword = true
	}

	if(password.length > 0) {
		$('#btn-show1').show()
	} else {
		$('#btn-show1').hide()
	}
}
function repassword() {
	var password = $('#password').val()
	var repassword = $('#repassword').val()
	window.srepassword = false
	if(repassword == '' || repassword == null) {
		$('#repassword').addClass('is-invalid')
		$('#repassword-feedback').html('Masukkan password.')
	}
	else if (repassword.length < 8) {
		$('#repassword').addClass('is-invalid')
		$('#repassword-feedback').html('Minimal 8 karakter.')
	}
	else if (repassword != password) {
		$('#repassword').addClass('is-invalid')
		$('#repassword-feedback').html('Password tidak sama.')
	}
	else {
		$('#repassword').addClass('is-valid')
		$('#repassword').removeClass('is-invalid')
		$('#repassword-feedback').html('')
		window.srepassword = true
	}

	if(repassword.length > 0) {
		$('#btn-show2').show()
	} else {
		$('#btn-show2').hide()
	}
}
function checkbox() {
	var checkbox = $('#checkbox').is(':checked')
	window.scheckbox = false
	if(checkbox == false) {
		$('#checkbox-feedback').html('Harap centang syarat & ketentuan.')
	}
	else {
		$('#checkbox-feedback').html('')
		window.scheckbox = true
	}
}


$('#name').keyup(function(){
	name()
})
$('#nik').keyup(function(){
	nik()
})
$('#phone').keyup(function(){
	phone()
})
$('#email').keyup(function(){
	email()
})
$('#password').keyup(function(){
	password()
})
$('#repassword').keyup(function(){
	repassword()
})
$('#checkbox').change(function(){
	checkbox()
})

/*-------------------------------------------------------------------------------------------------------*/

$('#register').click(function(){
	
	name()
	nik()
	phone()
	email()
	password()
	repassword()
	checkbox()

	if(sname == true && snik == true && sphone == true && semail == true && spassword == true && srepassword == true && scheckbox == true) {
		
		var vname = $('#name').val()
		var vnik = $('#nik').val()
		var vemail = $('#email').val()
		var vphone = $('#phone').val()
		var vpassword = $('#password').val()
		var vrepassword = $('#repassword').val()

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})
		
		$.ajax({
			url: "http://siwira.id/api/user/register",
			type: "POST",
			dataType: "JSON",
			data: {
				name: vname,
				nik: vnik,
				no_hp: vphone,
				email: vemail,
				password: vpassword,
				password_confirmation: vrepassword
			},
			success: function(data){
				$('#wirausaha').hide()
				$('#done').show(function(){
					window.scrollTo(0,0)
				})
			},
			error: function(xhr, ajaxOptions, thrownError){
				// console.log(xhr.responseText)
				// console.log(jsonResponse)
				var jsonResponse = JSON.parse(xhr.responseText)
				var error = jsonResponse.errors

				if(error.name != null) {
					$('#name').addClass('is-invalid')
					if(error.name == 'The name field is required.') {
						$('#name-feedback').html('Masukkan nama lengkap.')
					}
				}

				if(error.nik != null) {
					$('#nik').addClass('is-invalid')
					if(error.nik == 'The nik field is required.') {
						$('#nik-feedback').html('Masukkan NIK.')
					}
					else if(error.nik == 'The nik must be 16 digits.') {
						$('#nik-feedback').html('Masukkan 16 digit angka.')
					}
					else if(error.nik == 'The nik has already been taken.') {
						$('#nik-feedback').html('NIK telah digunakan.')
					}
				}

				if(error.no_hp != null) {
					$('#phone').addClass('is-invalid')
					if(error.no_hp == 'The no hp field is required.') {
						$('#phone-feedback').html('Masukkan nomor telepon.')
					}
					else if(error.no_hp == 'The no hp must be between 8 and 20 digits.') {
						$('#phone-feedback').html('Masukkan nomor telepon dengan benar.')
					}
					else if(error.no_hp == 'The no hp has already been taken.') {
						$('#phone-feedback').html('Nomor telepon telah digunakan.')
					}
				}

				if(error.email != null) {
					$('#email').addClass('is-invalid')
					if(error.email == 'The email field is required.') {
						$('#email-feedback').html('Masukkan email.')
					}
					else if(error.email == 'The email must be a valid email address.') {
						$('#email-feedback').html('Masukkan email dengan benar.')
					}
					else if(error.email == 'The email has already been taken.') {
						$('#email-feedback').html('Email telah digunakan.')
					}
				}

				if(error.password != null) {
					if(error.password == 'The password field is required.') {
						$('#password').addClass('is-invalid')
						$('#password-feedback').html('Masukkan password.')
					}
					else if(error.password == 'The password must be at least 8 characters.') {
						$('#password').addClass('is-invalid')
						$('#password-feedback').html('Minimal 8 karakter.')
					}
					else if(error.password == 'The password confirmation does not match.') {
						$('#repassword').addClass('is-invalid')
						$('#repassword-feedback').html('Password tidak sama.')
					}
				}
			}
		})
	}
})


$('#btn-show1').click(function() {
	var text = $('#btn-show1').html()
	if(text == 'Tampilkan') {
		$('#password').attr('type','text')
		$('#btn-show1').html('Sembunyikan')
	} else {
		$('#password').attr('type','password')
		$('#btn-show1').html('Tampilkan')
	}
})

$('#btn-show2').click(function() {
	var text = $('#btn-show2').html()
	if(text == 'Tampilkan') {
		$('#repassword').attr('type','text')
		$('#btn-show2').html('Sembunyikan')
	} else {
		$('#repassword').attr('type','password')
		$('#btn-show2').html('Tampilkan')
	}
})

