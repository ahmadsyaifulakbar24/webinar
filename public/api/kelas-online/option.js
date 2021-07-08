$.ajax({
    url: apiServer + "api/status_usaha",
    type: "GET",
    dataType: "JSON",
    success: function(result) {
        var append = ''
        $.each(result.data, function(index, value) {
            append += '<option value="'+value.id+'">'+value.params+'</option>'
        })
        $('#statusu').append(append)
    }
})
$.ajax({
    url: apiServer + "api/agama",
    type: "GET",
    dataType: "JSON",
    success: function(result) {
    	var append = ''
    	$.each(result.data, function(index, value) {
    		append += '<option value="'+value.id+'">'+value.params+'</option>'
    	})
    	$('#religion').append(append)
    }
})
$.ajax({
    url: apiServer + "api/pendidikan",
    type: "GET",
    dataType: "JSON",
    success : function(result) {
        var append = ''
        $.each(result.data, function(index, value) {
            append += '<option value="'+value.id+'">'+value.params+'</option>'
        })
        $('#education').append(append)
    }
})
$.ajax({
    url: apiServer + "api/pekerjaan_jabatan",
    type: "GET",
    dataType: "JSON",
    success : function(result) {
        var append = ''
        $.each(result.data, function(index, value) {
            append += '<option value="'+value.id+'">'+value.params+'</option>'
        })
        $('#profession').append(append)
    }
})
function textUppercase(str) {
    new_str = str.toLowerCase().replace(/\b[a-z]/g, function(txtVal) {
        return txtVal.toUpperCase();
    });
    return new_str;
}
$.ajax({
    url: apiServer + "api/provinsi",
    type: "GET",
    dataType: "JSON",
    success: function(result) {
        var append = '';
        $.each(result.data, function(index, value){
            append += '<option value="'+value.id+'">'+textUppercase(value.provinsi)+'</option>'
        })
        $('#province').append(append)
    } 
})
$('#province').change(function(){
    var provinsi_id = $('#province :selected').val()
    $('#district').html('')
    $.ajax({
        url: apiServer + "api/kab_kota",
        type: "GET",
        dataType: "JSON",
        data: {
            provinsi_id: provinsi_id
        },
        success: function(result) {
            var append = '<option disabled selected>Pilih</option>';
            $.each(result.data, function(index, value){
                append += '<option value="'+value.id+'">'+textUppercase(value.kab_kota)+'</option>'
            })
            $('#district').append(append)
        }
    })
})
$('#statusu').change(function(){
    var statusu = $('#statusu :selected').val()
    if(statusu == '83') {
        $('#data-koperasi').show()
        $('#data-umkm').hide()
    } else if (statusu == '84') {
        $('#data-koperasi').hide()
        $('#data-umkm').show()
    } else {
        $('#data-koperasi').hide()
        $('#data-umkm').hide()
    }
})
$.ajax({
    url: apiServer + "api/bidang_usaha_koperasi",
    type: "GET",
    dataType: "JSON",
    success : function(result) {
        var append = ''
        $.each(result.data, function(index, value) {
            append += '<option value="'+value.id+'">'+value.params+'</option>'
        })
        $('#sektor_usaha_koperasi').append(append)
    }
})

$.ajax({
    url: apiServer + "api/jenis_koperasi",
    type: "GET",
    dataType: "JSON",
    success : function(result) {
        var append = ''
        $.each(result.data, function(index, value) {
            append += '<option value="'+value.id+'">'+value.params+'</option>'
        })
        $('#jenis_koperasi').append(append)
    }
})
$.ajax({
    url: apiServer + "api/sektor_usaha_umkm",
    type: "GET",
    dataType: "JSON",
    success : function(result) {
        var append = ''
        $.each(result.data, function(index, value) {
            append += '<option value="'+value.id+'">'+value.params+'</option>'
        })
        $('#sektor_usaha').append(append)
    }
})
$.ajax({
    url: apiServer + "api/jenis_umkm",
    type: "GET",
    dataType: "JSON",
    success : function(result) {
        var append = ''
        $.each(result.data, function(index, value) {
            append += '<option value="'+value.id+'">'+value.params+'</option>'
        })
        $('#jenis_usaha').append(append)
    },
    complete: function() {
		var jenis_umkm_id = $('#jenis_usaha :selected').val()
    	$.ajax({
            url: apiServer + "api/bidang_usaha",
            type: "GET",
            dataType: "JSON",
            data: {
                jenis_umkm_id: jenis_umkm_id
            },
            success : function(result) {
                var append = ''
                $.each(result.data, function(index, value) {
                    append += '<option value="'+value.id+'">'+value.params+'</option>'
                })
                $('#bidang_usaha').append(append)
            }
        })
    }
})
$('#jenis_usaha').change(function(){
    var jenis_umkm_id = $('#jenis_usaha :selected').val()
    $('#bidang_usaha').html('')
    $.ajax({
        url: apiServer + "api/bidang_usaha",
        type: "GET",
        dataType: "JSON",
        data : {
            jenis_umkm_id : jenis_umkm_id
        },
        success : function(result) {
            var append = '<option disabled selected>Pilih</option>';
            $.each(result.data, function(index, value) {
                append += '<option value="'+value.id+'">'+value.params+'</option>'
            })
            $('#bidang_usaha').append(append)
        }
    })
})