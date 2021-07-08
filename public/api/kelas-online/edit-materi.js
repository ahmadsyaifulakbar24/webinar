function materi() {
	let materi = $('#materi').val()
	window.saddress = false
	if(materi == '' || materi == null) {
		$('#materi').addClass('is-invalid')
		$('#materi-feedback').html('Masukkan materi.')
	}
	else {
		$('#materi').removeClass('is-invalid')
		$('#materi-feedback').html('')
		window.smateri = true
	}
}
function jpl() {
	var jpl = $('#jpl').val()
	window.stenaga_kerja_umkm = false
	if(jpl == '' || jpl == null) {
		$('#jpl').addClass('is-invalid')
		$('#jpl-feedback').html('Masukkan JPL.')
	}
	else if (!/^[0-9]*$/g.test(jpl)) {
		$('#jpl').addClass('is-invalid')
		$('#jpl-feedback').html('Masukkan angka dengan benar.')
	}
	else {
		$('#jpl').removeClass('is-invalid')
		$('#jpl-feedback').html('')
		window.sjpl = true
	}
}

$('#materi').keyup(function(){
	materi()
})
$('#jpl').keyup(function(){
	jpl()
})

//GET MATERI
$.ajax({
    url: apiServer + 'api/external_input/show_materi_by_id/'+materi_id,
	type: 'GET',
    dataType: 'JSON',
    success: function(result){
        let data = result.data
        $("#materi").val(data.materi)
        $("#jpl").val(data.jpl)
    }
})

// Get Pelatihan External
$.ajax({
	url: apiServer + 'api/get_pelatihan_external',
	type: 'GET',
	dataType: 'JSON',
	data: {
		token: token
	},
	success: function(result){
        let value = result.data
        $('#c2lsdmlh').val(value.id)
		$('#poster').attr('src',value.poster)
		$('.topik').prepend(value.topik)
		$('#tanggal').html(tanggal(value.tanggal))
		$('#jam').html(value.waktu.substr(0,5)+' WIB')
		$('#keterangan').html(value.keterangan)
	}
})

$('#update').click(function(){
    materi()
    jpl()

    if(smateri == true && sjpl == true) {
        let vmateri = $("#materi").val();
        let vjpl = $("#jpl").val();

        $.ajax({
            url: apiServer + "api/external_input/update_materi/"+materi_id,
            type: "PATCH",
            dataType: "JSON",
            headers: {
                "Accept": "application/json"
            },
            data: {
                materi: vmateri,
                jpl: vjpl
            },
            success: function(result) {
                window.location.href = '/kelas-online/kelas/'+token;
            },
            error : function(xhr, ajaxOptions, thrownError){
                console.log(xhr.responseText)
                let jsonResponse = JSON.parse(xhr.responseText)
                console.log(jsonResponse)
            }
        })
    }
})