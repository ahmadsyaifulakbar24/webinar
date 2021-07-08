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
        $('#ubah').attr('href', `${root}/admin/ubah/kelas/${code}`)
        $('#tambah-materi').attr('href', `${root}/admin/tambah/materi/${code}#materi`)
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
					<td class="text-truncate">
						<a href="${root}/admin/ubah/materi/${code}/${value.id}#materi" class="btn btn-sm btn-outline-primary">Ubah</a>
						<div class="btn btn-sm btn-outline-danger theory" data-id="${value.id}" data-name="${value.theory}">Hapus</div>
					</td>
				</tr>`
                $('#table-materi').append(appendMateri)
            })
        } else {
            $("#empty-materi").show()
        }
    }
})

// Peserta
$.ajax({
    url: `${api_url}/registration/fetch`,
    type: 'GET',
    data: {
        training_id: code
    },
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        console.log(result)
        if (result.data != '') {
            $.each(result.data, function(index, value) {
                append = `<tr class="position-relative">
					<td class="text-truncate text-center">${index + 1}.</td>
					<td class="text-truncate text-capitalize">${value.user.name}</td>
					<td class="text-truncate">${value.user.nik}</td>
					<td class="text-truncate">${value.user.province.province}</td>
					<td class="text-truncate">
						<a href="${root}/sertifikat/${code}/${value.user.id}" target="_blank" class="btn btn-sm btn-outline-primary">Unduh Sertifikat</a>
					</td>
				</tr>`
	            $('#table-peserta').append(append)
            })
            $('#option-delete').hide()
        } else {
            $('#empty').show()
        }
    }
})

// Delete Materi
$(document).on('click', '.theory', function() {
    let id = $(this).attr('data-id')
    let name = $(this).attr('data-name')
    $('#delete-theory').attr('data-id', id)
    $('#modal-theory .theory-name').html(name)
    $('#modal-theory').modal('show')
})
$(document).on('click', '#delete-theory', function() {
    let id = $(this).attr('data-id')
    $.ajax({
        url: `${api_url}/training/delete_theory/${id}`,
        type: 'DELETE',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = `${root}/admin/kelas/${code}`
        }
    })
})

// Delete Kelas
$(document).on('click', '#delete', function() {
    $.ajax({
        url: `${api_url}/training/delete/${code}`,
        type: 'DELETE',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = `${root}/admin/kelas`
        },
        error: function(xhr) {
        	console.log(xhr)
        }
    })
})
