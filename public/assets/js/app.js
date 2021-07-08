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

function createQR(code) {
    var qrcode = new QRCode(document.getElementById('qrcode'), {
        text: `${root}/detail/${code}`,
        width: 150,
        height: 150,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    })
}

function downloadQR(id) {
    let filename = $('#qrcode' + id).data('filename')
    html2canvas(document.querySelector('#qrcode' + id), {
        scale: 1
    }).then(function(canvas) {
        saveQR(canvas.toDataURL(), filename + '.png')
    })
}

function saveQR(uri, filename) {
    var link = document.createElement('a')
    if (typeof link.download === 'string') {
        link.href = uri
        link.download = filename
        document.body.appendChild(link)
        link.click()
        document.body.removeChild(link)
    } else {
        window.open(uri)
    }
}
