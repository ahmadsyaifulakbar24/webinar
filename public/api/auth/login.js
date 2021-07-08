$(document).ready(function() {
	if (localStorage.getItem('token') != null) logout()
})

$('#form').submit(function(e) {
    e.preventDefault()
    $('.alert').hide()
    $('#submit').attr('disabled', true)
    $.ajax({
        url: `${api_url}/auth/login`,
        type: 'POST',
        data: {
            nik: $('#nik').val(),
            password: $('#password').val()
        },
        success: function(result) {
        	// console.log(result)
            let value = result.data
            localStorage.setItem('token', value.access_token)
            localStorage.setItem('user_id', value.user.id)
            localStorage.setItem('name', value.user.name)
            localStorage.setItem('role', value.user.user_role.id)
            localStorage.setItem('photo', value.user.photo_url)
            $.ajax({
                url: `${root}/session/login`,
                type: 'GET',
                data: {
                    token: value.access_token,
                    role: value.user.user_role.id
                },
                success: function(result) {
                	if (value.user.user_role.id == 1) {
	                    location.href = `${root}/admin/kelas`
                	}
                	else if (value.user.user_role.id == 200) {
	                    location.href = `${root}/kelas`
                	}
                }
            })
        },
        error: function(xhr) {
            let err = JSON.parse(xhr.responseText)
            // console.log(err)
            $('.alert-danger').show()
		    $('#submit').attr('disabled', false)
        }
    })
})
