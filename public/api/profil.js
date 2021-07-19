$.ajax({
    url: `${api_url}/param/province`,
    type: "GET",
    success: function(result) {
        // console.log(result)
        $.each(result.data, function(index, value) {
            append = `<option value="${value.id}">${value.province}</option>`
            $('#province_id').append(append)
        })
        get_data()
    }
})

function get_city(province_id, city_id) {
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
            if (city_id != undefined) {
                $('#city_id').val(city_id)
                $('#submit').attr('disabled', false)
            }
        }
    })
}

$('#province_id').change(function() {
    get_city($(this).val())
})

let name
function get_data() {
    $.ajax({
        url: `${api_url}/user/fetch/${user_id}`,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            let value = result.data
            $('#name').val(value.name)
            name = value.name
            $('#email').val(value.email)
            $('#nik').val(value.nik)
            $('#date').val(value.date_of_birth.substr(8, 3))
            $('#month').val(value.date_of_birth.substr(0, 7))
            if (value.gender == "laki-laki") {
                $('#male').attr('checked', true)
            } else {
                $('#female').attr('checked', true)
            }
            $('#agency').val(value.agency)
            $('#position').val(value.position)
            $('#address').val(value.address)
            $('#province_id').val(value.province.id)
            get_city(value.province.id, value.city.id)
            $('#phone_number').val(value.phone_number)
            $('#image').attr('src', value.photo_url)
        }
    })
}

$('form').submit(function(e) {
    e.preventDefault()
    $('.alert').hide()
    $('#submit').attr('disabled', true)
    $('.is-invalid').removeClass('is-invalid')
    let fd = new FormData
    fd.append('name', name)
    fd.append('email', $('#email').val())
    fd.append('date_of_birth', `${$('#month').val()}-${$('#date').val()}`)
    fd.append('gender', $('input[type=radio][name=gender]:checked').val())
    fd.append('agency', $('#agency').val())
    fd.append('position', $('#position').val())
    fd.append('address', $('#address').val())
    fd.append('province_id', $('#province_id').val())
    fd.append('city_id', $('#city_id').val())
    if (photo != null) fd.append('photo', photo, 'photo.jpg')
    $.ajax({
        url: `${api_url}/user/update/${user_id}`,
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $('#success').show()
            $('html, body').scrollTop(0)
            $('#submit').attr('disabled', false)
            setTimeout(function() {
                $('#success').hide()
            }, 2000)
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
