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
        $('#date').html(tanggal(value.date))
        $('#time').html(value.time.substr(0, 5) + ' WIB')
        $('#description').html(value.description)
        if (value.status == 'finish') {
        	$('#progress').hide()
        	$('#download').show()
        	$('#download').attr('href', `${root}/sertifikat/${code}/${user_id}`)
        } else {
        	$('#progress').show()
        	$('#download').hide()
        }
    }
})

// Materi
$.ajax({
    url: `${api_url}/training/fetch_theory`,
    type: 'GET',
    data: {
        training_id: code
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
					<td class="text-truncate">${value.jpl}</td>
				</tr>`
                $('#table-materi').append(appendMateri)
            })
        } else {
            $("#empty-materi").show()
        }
    }
})

// $.ajax({
//     url: `${api_url}/registration/fetch`,
//     type: 'GET',
//     data: {
//     	training_id: code
//     },
//     beforeSend: function(xhr) {
//         xhr.setRequestHeader("Authorization", "Bearer " + token)
//     },
//     success: function(result) {
//         console.log(result)
//     }
// })

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
