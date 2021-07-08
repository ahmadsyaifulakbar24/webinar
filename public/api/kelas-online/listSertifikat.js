$.ajax({
	url: apiServer + "api/sertifikat_external/"+ nik +"/profile_external_first",
	type: 'GET',
	dataType: 'JSON',
	success: function(result){
		let value = result.data
		$('#nik').prepend(value.no_ktp)
		$('#nama').html(value.nama)
		$('#ttl').html(value.tempat_lahir + ", " + tanggal2(value.tanggal_lahir))
		$('#telp').html(value.no_telp)
	}
})

$.ajax({
	url: apiServer + "api/sertifikat_external/"+ nik +"/pelatihan_external_by_nik",
	type: 'GET',
	dataType: 'JSON',
	success: function(result){
		let data = result.data
		let i = 1;
		$.each(data, function(key, value) {
			let pelatihan_external_id = value.pelatihan_external_id
			let profile_external_id = value.id
			$.ajax({
				url: apiServer + "api/get_pelatihan_external",
				type: 'GET',
				dataType: 'JSON',
				data: {
					pelatihan_external_id: pelatihan_external_id
				},
				success: function(result) {
					let datap = result.data
					$("#table-sertifikat").append(
						`<tr class="position-relative">
							<th>`+i+`.</th>
							<td class="text-capitalize" style="width:55%;">`+datap.topik+`</td>
							<td>
								<a href="/kelas-online/sertifikat/`+ profile_external_id +`/`+ nik +`/download_depan"><button class="btn btn-sm btn-primary">Tampak Depan</button></a>
								<a href="/kelas-online/sertifikat/`+ profile_external_id +`/`+ nik +`/download_belakang"><button class="btn btn-sm btn-primary">Tampak Belakang</button></a>
							</td>
						</tr>`
					)
					i++
				}
			})
		})
	}
})

