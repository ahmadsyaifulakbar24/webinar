$.ajax({
    url: `${api_url}/training/fetch/${code}`,
    type: 'GET',
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        // console.log(result)
        let value = result.data
        $('#poster').attr('src', value.poster_url)
        $('#code').html(value.code)
        $('.topic').prepend(value.topic)
        let finish_date = (value.finish_date != null) ? ' s/d ' + tanggal(value.finish_date) : ''
        $('#date').html(tanggal(value.date) + finish_date)
        $('#time').html(value.time.substr(0, 5) + ' WIB')
        $('#description').html(value.description)
    }
})

$.ajax({
    url: `${api_url}/training/fetch_theory/${theory}`,
    type: 'GET',
    data: {
    	training_id: code
    },
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        // console.log(result)
        let value = result.data
        $('#theory').val(value.theory)
    }
})

$(document).ajaxStop(function() {
	$('#submit').attr('disabled', false)
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let fd = new FormData
    fd.append('training_id', code)
    fd.append('theory', $('#theory').val())
    $.ajax({
        url: `${api_url}/training/update_theory/${theory}`,
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("Authorization", "Bearer " + token)
	    },
        success: function(result) {
            location.href = `${root}/admin/kelas/${code}`
        },
        error: function(xhr) {
		    $('#submit').attr('disabled', false)
        	let err = xhr.responseJSON.errors
            // console.log(err)
            if (err.theory) {
                $('#theory').addClass('is-invalid')
                $('#theory').siblings('.invalid-feedback').html('Masukkan materi pelatihan')
            }
        }
    })
})
