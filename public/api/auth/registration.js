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
filterPhoneNumber(document.getElementById("phone_number"), function(value) {
    return /^\d*\.?\d*$/.test(value) // Allow digits and '.' only, using a RegExp
})

$.ajax({
    url: `${api_url}/param/province`,
    type: "GET",
    success: function(result) {
        // console.log(result)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.province}</option>`
            $('#province_id').append(append)
        })
    }
})

$('#province_id').change(function() {
    var province_id = $(this).val()
    $('#city_id').html('')
    $.ajax({
        url: `${api_url}/param/city`,
        type: "GET",
        data: {
            province_id: province_id
        },
        success: function(result) {
            // console.log(result)
            let append = `<option value="" disabled selected>Pilih</option>`
            $.each(result.data, function(index, value) {
                append += `<option value="${value.id}">${value.city}</option>`
            })
            $('#city_id').append(append)
        }
    })
})

$(document).ajaxStop(function() {
    $('#submit').attr('disabled', false)
})

$('form').submit(function(e) {
    e.preventDefault()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let fd = new FormData
    fd.append('name', $('#name').val())
    fd.append('email', $('#email').val())
    fd.append('nik', $('#nik').val())
    fd.append('date_of_birth', `${$('#month').val()}-${$('#date').val()}`)
    fd.append('gender', $('input[type=radio][name=gender]:checked').val())
    fd.append('agency', $('#agency').val())
    fd.append('position', $('#position').val())
    fd.append('address', $('#address').val())
    fd.append('province_id', $('#province_id').val())
    fd.append('city_id', $('#city_id').val())
    fd.append('phone_number', $('#phone_number').val())
    photo == null ? fd.append('photo', null) : fd.append('photo', photo, 'photo.jpg')
    $.ajax({
        url: `${api_url}/auth/registration`,
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        success: function(result) {
            location.href = `${root}?registration=success`
        },
        error: function(xhr) {
            $('#submit').attr('disabled', false)
            let err = xhr.responseJSON.errors
            // console.log(err)
            if (err.name) {
                $('#name').addClass('is-invalid')
                $('#name').siblings('.invalid-feedback').html('Masukkan nama lengkap.')
            }
            if (err.email) {
                $('#email').addClass('is-invalid')
                $('#email').siblings('.invalid-feedback').html('Masukkan email')
            }
            if (err.nik) {
                if (err.nik == "The nik has already been taken.") {
                    $('#nik').addClass('is-invalid')
                    $('#nik').siblings('.invalid-feedback').html('NIK telah digunakan')
                } else {
                    $('#nik').addClass('is-invalid')
                    $('#nik').siblings('.invalid-feedback').html('Masukkan NIK')
                }
            }
            if (err.date_of_birth) {
                $('#date_of_birth').addClass('is-invalid')
                $('#date_of_birth').siblings('.invalid-feedback').html('Masukkan tanggal lahir')
            }
            if (err.gender) {
                $('#gender').addClass('is-invalid')
                $('#gender').siblings('.invalid-feedback').html('Pilih jenis kelamin')
            }
            if (err.address) {
                $('#address').addClass('is-invalid')
                $('#address').siblings('.invalid-feedback').html('Masukkan alamat rumah')
            }
            if (err.province_id) {
                $('#province_id').addClass('is-invalid')
                $('#province_id').siblings('.invalid-feedback').html('Pilih provinsi')
            }
            if (err.city_id) {
                $('#city_id').addClass('is-invalid')
                $('#city_id').siblings('.invalid-feedback').html('Pilih kab/kota')
            }
            if (err.phone_number) {
                $('#phone_number').addClass('is-invalid')
                $('#phone_number').siblings('.invalid-feedback').html('Masukkan nomor telepon')
            }
            if (err.photo) {
                $('#photo').addClass('is-invalid')
                $('#photo').siblings('.invalid-feedback').html('Masukkan pas foto')
            }
        }
    })
})
