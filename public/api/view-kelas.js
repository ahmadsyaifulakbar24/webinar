$.ajax({
    url: `${api_url}/registration/fetch/${code}`,
    type: 'GET',
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        // console.log(result)
        let value = result.data
        $('#poster').attr('src', value.training.poster_url)
        $('#code').html(value.training.code)
        $('.topic').prepend(value.training.topic)
        let finish_date = (value.training.finish_date != null) ? ' s/d ' + tanggal(value.training.finish_date) : ''
        $('#date').html(tanggal(value.training.date) + finish_date)
        $('#time').html(value.training.time.substr(0, 5) + ' WIB')
        $('#description').html(value.training.description)
        if (value.training.status == 'finish') {
        	$('#download').show()
        	$('#download').attr('href', `${root}/sertifikat/${value.id}/${value.qrcode}`)
        } else {
        	$('#download').hide()
        }
        get_theory(value.training.id)
    }
})

// Materi
function get_theory(training_id) {
	$.ajax({
	    url: `${api_url}/training/fetch_theory`,
	    type: 'GET',
	    data: {
	        training_id: training_id
	    },
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("Authorization", "Bearer " + token)
	    },
	    success: function(result) {
	        // console.log(result)
	        let data = result.data
	        if (data != '') {
	            $.each(data, function(index, value) {
	                appendMateri = `<tr class="position-relative">
						<td class="text-truncate text-center">${index + 1}.</td>
						<td class="text-truncate">${value.theory}</td>
					</tr>`
	                $('#table-materi').append(appendMateri)
	            })
	        } else {
	            $("#empty-materi").show()
	        }
	    }
	})
}

// Keluar Kelas
$(document).on('click', '#delete', function() {
    $.ajax({
        url: `${api_url}/registration/delete/${code}`,
        type: 'DELETE',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = `${root}/kelas`
        },
        error: function(xhr) {
        	console.log(xhr)
        }
    })
})
