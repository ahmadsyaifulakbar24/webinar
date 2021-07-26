$.ajax({
    url: `${api_url}/registration/fetch_by_qrcode/${code}`,
    type: 'GET',
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
        // console.log(result)
        let value = result.data
        $('#photo_url').attr('src', value.user.photo_url)
        $('#nik').html(value.user.nik)
        $('#name').html(value.user.name)
        $('#date_of_birth').html(tanggal2(value.user.date_of_birth))
        $('#topic').html(value.training.topic)
        let finish_date = (value.finish_date != null) ? ' s/d ' + tanggal2(value.finish_date) : ''
        $('#date').html(tanggal2(value.training.date) + finish_date)
        $('#time').html(value.training.time.substr(0, 5) + ' WIB')
        createQR(value.qrcode)
        $('#card').show()
        $('#loading').remove()
    },
    error: function(xhr) {
    	location.href = root
    }
})
