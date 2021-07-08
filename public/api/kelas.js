$.ajax({
    url: `${api_url}/training/fetch_training_by_user`,
    type: 'GET',
    data: {
    	user_id: user_id
    },
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        // console.log(result)
        $.each(result.data, function(index, value) {
            append = `<div class="col-xl-3 col-md-4 col-sm-6 mb-4">
				<div class="card pb-5" style="height:100%">
					<a href="${root}/kelas/${value.id}" class="text-dark">
						<img class="card-img-top" src="${value.poster_url}">
						<p class="text-justify mt-3 px-3">Topik: <b>${value.topic}</b></p>
					</a>
					<div class="bg-light pointer text-secondary text-center border-top px-3 py-2 mb-4" style="position:absolute;bottom:-1.5rem;width:100%" onclick="return copyToClipboard('${value.code}')">
						<small><i class="fa fa-copy pr-2"></i>Salin kode kelas</small>
					</div>
				</div>
			</div>`
            $('#data').append(append)
        })
    }
})

// Role
$.ajax({
    url: `${api_url}/param/role`,
    type: 'GET',
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        // console.log(result)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.param}</option>`
            $('#role_id').append(append)
        })
    }
})

$('#code').keyup(function() {
	$('#kelas').hide()
    $('#search').show()
    $('#submit').hide()
})

$('#search').click(function(e) {
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')
    let code = $('#code').val()
    $.ajax({
        url: `${api_url}/training/fetch`,
        type: 'GET',
        data: {
            code: code
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            let value = result.data
            $('#kelas').show()
            $('#search').hide()
            $('#submit').show()
            $('#topic').html(value.topic)
            $('#date').html(tanggal(value.date))
            $('#time').html(value.time.substr(0, 5) + ' WIB')
        },
        error: function(xhr) {
            $('#kelas').hide()
            $('#search').show()
            $('#submit').hide()
            let err = xhr.responseJSON.data
            // console.log(err)
            if (err.message == "training data not found") {
                $('#code').addClass('is-invalid')
                $('#code').siblings('.invalid-feedback').html('Kelas tidak ditemukan atau telah ditutup')
            }
        }
    })
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let fd = new FormData
    fd.append('training_code', $('#code').val())
    fd.append('role_id', $('#role_id').val())
    $.ajax({
        url: `${api_url}/registration/create`,
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            location.href = `${root}/kelas`
        },
        error: function(xhr) {
			$('#submit').attr('disabled', false)
            let err = xhr.responseJSON.errors
            // console.log(err)
            if (err.training_code) {
	            $('#kelas').hide()
	            $('#search').show()
	            $('#submit').hide()
                $('#code').addClass('is-invalid')
                $('#code').siblings('.invalid-feedback').html('Kelas tidak ditemukan atau telah ditutup')
            }
            if (err.role_id) {
                $('#role_id').addClass('is-invalid')
                $('#role_id').siblings('.invalid-feedback').html('Pilih peran')
            }
        }
    })
})

function copyToClipboard(code) {
    var aux = document.createElement("input");
    aux.setAttribute("value", code);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
    $('#copy').fadeIn(200)
    setTimeout(function() {
        $('#copy').fadeOut(200)
    }, 2000)
}
