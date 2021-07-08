function nik() {
    var nik = $('#nik').val()
    window.snik = false

    $('#feedback').hide()
	$('#feedback').html('')
    $('#search').attr('disabled','disabled')
    
    if(nik == '' || nik == null) {
		$('#nik').addClass('is-invalid')
		$('#nik-feedback').html('Harap isi bidang ini.')
	}
	else if(nik.length < 16) {
		$('#nik').addClass('is-invalid')
		$('#nik-feedback').html('Minimal 16 digit.')
	}
	else {
		$('#nik').removeClass('is-invalid')
		$('#nik-feedback').html('')

		window.snik = true
		
		if(nik.length > 15) {
			$('#search').removeAttr('disabled')
		}
	}
}

$('#nik').keyup(function() {
    var nik = $('#nik').val()
	window.snik = false

	$('#feedback').hide()
	$('#feedback').html('')
	
	if(nik == '' || nik == null) {
		$('#search').attr('disabled','disabled')
	}
	else if(nik.length < 16) {
		$('#search').attr('disabled','disabled')
	}
	else {
		window.snik = true
		$('#search').attr('disabled','disabled')
		
		if(nik.length > 15) {
			$('#search').removeAttr('disabled','disabled')
		}
	}
})

function search() {
    nik()

    var vnik = $('#nik').val()

    if(snik == true) {
		$.ajax({
			url: apiServer + "api/sertifikat_external/search_nik",
			type: "POST",
			dataType: "JSON",
			headers: {
				"Accept": "application/json",
				"Content-Type": "application/x-www-form-urlencoded"
			},
			data: {
				nik: vnik,
			},
			success: function(result) {
                window.location.replace("/kelas-online/sertifikat/"+ vnik +"/list");
				$('#text').hide()
				$('#loading').show()
                $('#search').prop('disabled',true)
			},
			error: function(xhr, ajaxOptions, thrownError){
				console.log(xhr.responseText)

				$('#nik').addClass('is-invalid')
				$('#nik-feedback').html('NIK salah.')
			
				$('#text').show()
				$('#loading').hide()
				$('#login').prop('disabled',false)
			}
		})
	}
}

$('#nik').bind('keypress', function(e) {
	var nik = e.keyCode || e.which;
	if(nik == 13) {
		search()
	}
})

$('#search').click(function(){
	search()
})