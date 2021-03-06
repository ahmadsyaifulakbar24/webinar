$.ajax({
    url: `${api_url}/param/unit`,
    type: 'GET',
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        // console.log(result)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.param}</option>`
            $('#unit_id').append(append)
        })
    }
})

$.ajax({
    url: `${api_url}/param/ttd`,
    type: 'GET',
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        // console.log(result)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.name}</option>`
            $('#ttd_id').append(append)
        })
    }
})

$('#unit_id').change(function() {
    sub_unit($(this).val())
})

function sub_unit(unit_id, sub_unit) {
	$.ajax({
        url: `${api_url}/param/sub_unit`,
        type: 'GET',
        data: {
            parent_id: unit_id
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	// console.log(result)
            let append = `<option disabled selected>Pilih</option>`
            $.each(result.data, function(index, value) {
                append += `<option value="${value.id}">${value.param}</option>`
            })
            $('#sub_unit_id').html(append)
            $('#sub_unit_id').attr('disabled', false)
            if (sub_unit != undefined) $('#sub_unit_id').val(sub_unit)
        	$('#submit').attr('disabled', false)
        }
    })
}

$('#choose').click(function() {
    $('#poster').click()
})

$('#finish_date_option').change(function() {
    if(this.checked) {
        $('#finish-date-form').removeClass('d-none');
        $(this).attr('value', '1');
    } else {
        $('#finish-date-form').addClass('d-none');
        $(this).attr('value', '0');
    }
})

function readFile() {
    if (this.files && this.files[0]) {
        var FR = new FileReader()
        FR.addEventListener("load", function(e) {
            document.getElementById("image").src = e.target.result
        })
        FR.readAsDataURL(this.files[0])
    }
}
document.getElementById("poster").addEventListener("change", readFile);

$.ajax({
    url: `${api_url}/training/fetch/${code}`,
    type: 'GET',
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
    	// console.log(result)
        let value = result.data
        $('#image').attr('src', value.poster_url)
        $('#topic').val(value.topic)
        $('#unit_id').val(value.unit.id)
        sub_unit(value.unit.id, value.sub_unit.id)
        $('#date').val(value.date)
        $('#time').val(value.time.substr(0, 5))
        $('#finish_date').val(value.finish_date)
        if(value.finish_date != null) {
            $('#finish_date_option').prop('checked', true);
            $('#finish-date-form').removeClass('d-none');
            $('#finish_date_option').attr('value', '1');
        }
        description.setData(value.description)
        $('#ttd_id').val(value.ttd.id)
        $('#status').val(value.status)
    },
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let fd = new FormData
    if ($('#poster')[0].files[0] != undefined) fd.append('poster', $('#poster')[0].files[0])
    fd.append('topic', $('#topic').val())
    fd.append('unit_id', $('#unit_id').val())
    fd.append('sub_unit_id', $('#sub_unit_id').val())
    fd.append('date', $('#date').val())
    fd.append('time', $('#time').val() + ':00')
    fd.append('finish_date_option', $('#finish_date_option').val())
    if($('#finish_date_option').val() == 1) {
        fd.append('finish_date', $('#finish_date').val())
    }
    fd.append('description', description.getData())
    fd.append('ttd_id', $('#ttd_id').val())
    fd.append('status', $('#status').val())
    $.ajax({
        url: `${api_url}/training/update/${code}`,
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
            if (err.poster) {
                $('#poster').addClass('is-invalid')
                $('#poster').siblings('.invalid-feedback').html('Masukkan poster')
            }
            if (err.topic) {
                $('#topic').addClass('is-invalid')
                $('#topic').siblings('.invalid-feedback').html('Masukkan topik')
            }
            if (err.unit_id) {
                $('#unit_id').addClass('is-invalid')
                $('#unit_id').siblings('.invalid-feedback').html('Pilih unit')
            }
            if (err.sub_unit_id) {
                $('#sub_unit_id').addClass('is-invalid')
                $('#sub_unit_id').siblings('.invalid-feedback').html('Pilih jenis kegiatan pelatihan')
            }
            if (err.date) {
                $('#date').addClass('is-invalid')
                $('#date').siblings('.invalid-feedback').html('Pilih tanggal')
            }
            if (err.time) {
                $('#time').addClass('is-invalid')
                $('#time').siblings('.invalid-feedback').html('Masukkan jam')
            }
            if (err.finish_date) {
                $('#finish_date').addClass('is-invalid')
                $('#finish_date').siblings('.invalid-feedback').html('Pilih tanggal selesai')
            }
            if (err.description) {
                $('#description').addClass('is-invalid')
                $('#description').siblings('.invalid-feedback').html('Masukkan keterangan')
            }
            if (err.ttd_id) {
                $('#ttd_id').addClass('is-invalid')
                $('#ttd_id').siblings('.invalid-feedback').html('Pilih tanda tangan')
            }
            if (err.status) {
                $('#status').addClass('is-invalid')
                $('#status').siblings('.invalid-feedback').html('Pilih status')
            }
        }
    })
})
