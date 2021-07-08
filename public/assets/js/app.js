// if (localStorage.getItem('name')) $('.name').html(localStorage.getItem('name'))
// if (localStorage.getItem('photo')) $('.avatar').attr('src', localStorage.getItem('photo'))
const token = localStorage.getItem('token')
const user_id = localStorage.getItem('user_id')
const role = localStorage.getItem('role')

$(document).on('keydown', 'input', function() {
	$(this).removeClass('is-invalid')
})
$(document).on('keydown', 'textarea', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('change', 'select', function() {
	$(this).removeClass('is-invalid')
})
$(document).on('click', 'input[name="gender"]', function() {
	$('#gender').removeClass('is-invalid')
})
$(document).on('change', 'input[type="date"]', function() {
	$(this).removeClass('is-invalid')
})
$(document).on('change', 'input[type=file]', function() {
    $(this).removeClass('is-invalid')
})

function logout() {
    $.ajax({
        url: `${api_url}/auth/logout`,
        type: 'POST',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function() {
            localStorage.clear()
            $.ajax({
                url: `${root}/session/logout`,
                type: 'GET',
                success: function() {
                    location.href = root
                }
            })
        }
    })
}
