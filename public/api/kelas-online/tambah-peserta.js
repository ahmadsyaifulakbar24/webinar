function name() {
	let name = $('#name').val()
	window.sname = false
	if(name == '' || name == null) {
		$('#name').addClass('is-invalid')
		$('#name-feedback').html('Masukkan nama lengkap.')
	}
	else if (!/^[a-z A-Z]*$/g.test(name)) {
		$('#name').addClass('is-invalid')
		$('#name-feedback').html('Masukkan nama lengkap dengan benar.')
	}
	else {
		$('#name').removeClass('is-invalid')
		$('#name-feedback').html('')
		window.sname = true
	}
}
function ktp() {
	let ktp = $('#ktp').val()
	window.sktp = false
	if(ktp == '' || ktp == null) {
		$('#ktp').addClass('is-invalid')
		$('#ktp-feedback').html('Masukkan Nomor KTP.')
	}
	else if (ktp.length < 16) {
		$('#ktp').addClass('is-invalid')
		$('#ktp-feedback').html('Minimal 16 digit.')
	}
	else {
		$('#ktp').removeClass('is-invalid')
		$('#ktp-feedback').html('')
		window.sktp = true
	}
}
function email() {
	let email = $('#email').val()
	window.semail = false
	let r = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
	if(email == '' || email == null) {
		$('#email').addClass('is-invalid')
		$('#email-feedback').html('Masukkan email.')
	}
	else if (!r.test(email)) {
		$('#email').addClass('is-invalid')
		$('#email-feedback').html('Masukkan email dengan benar.')
	}
	else {
		$('#email').removeClass('is-invalid')
		$('#email-feedback').html('')
		window.semail = true
	}
}
function phone() {
	let phone = $('#phone').val()
	window.sphone = false
	if(phone == '' || phone == null) {
		$('#phone').addClass('is-invalid')
		$('#phone-feedback').html('Masukkan nomor telepon.')
	}
	else if (!/^[0-9]*$/g.test(phone)) {
		$('#phone').addClass('is-invalid')
		$('#phone-feedback').html('Masukkan nomor telepon dengan benar.')
	}
	else if (phone.length < 9) {
		$('#phone').addClass('is-invalid')
		$('#phone-feedback').html('Minimal 10 digit.')
	}
	else if (phone.length > 14) {
		$('#phone').addClass('is-invalid')
		$('#phone-feedback').html('Maksimal 15 digit.')
	}
	else {
		$('#phone').removeClass('is-invalid')
		$('#phone-feedback').html('')
		window.sphone = true
	}
}
function place() {
	let place = $('#place').val()
	window.splace = false
	if(place == '' || place == null) {
		$('#place').addClass('is-invalid')
		$('#place-feedback').html('Masukkan tempat lahir.')
	}
	else if (!/^[a-z A-Z]*$/g.test(place)) {
		$('#place').addClass('is-invalid')
		$('#place-feedback').html('Masukkan tempat lahir dengan benar.')
	}
	else {
		$('#place').removeClass('is-invalid')
		$('#place-feedback').html('')
		window.splace = true
	}
}
function odate() {
	let date = $('#date').val()
	window.sdate = false
	if(date == '' || date == null) {
		$('#date').addClass('is-invalid')
		$('#date-feedback').html('Masukkan tanggal lahir.')
	}
	else if (date.length != 10) {
		$('#date').addClass('is-invalid')
		$('#date-feedback').html('Masukkan tanggal lahir dengan benar.')
	}
	else {
		$('#date').removeClass('is-invalid')
		$('#date-feedback').html('')
		window.sdate = true
	}
}
function status() {
	let status = $('#status').val()
	window.sstatus = false
	if(status == '' || status == null) {
		$('#status').addClass('is-invalid')
		$('#status-feedback').html('Pilih status.')
	}
	else {
		$('#status').removeClass('is-invalid')
		$('#status-feedback').html('')
		window.sstatus = true
	}
}
function gender() {
	let gender = $('input[type=radio][name=gender]:checked').val()
	window.sgender = false
	if(gender == '' || gender == undefined || gender == null) {
		$('#gender-feedback').html('Pilih jenis kelamin.')
	}
	else {
		$('#gender-feedback').html('')
		window.sgender = true
	}
}
function religion() {
	let religion = $('#religion').val()
	window.sreligion = false
	if(religion == '' || religion == null) {
		$('#religion').addClass('is-invalid')
		$('#religion-feedback').html('Pilih agama.')
	}
	else {
		$('#religion').removeClass('is-invalid')
		$('#religion-feedback').html('')
		window.sreligion = true
	}
}
function education() {
	let education = $('#education').val()
	window.seducation = false
	if(education == '' || education == null) {
		$('#education').addClass('is-invalid')
		$('#education-feedback').html('Pilih pendidikan terakhir.')
	}
	else {
		$('#education').removeClass('is-invalid')
		$('#education-feedback').html('')
		window.seducation = true
	}
}
function profession() {
	let profession = $('#profession').val()
	window.sprofession = false
	if(profession == '' || profession == null) {
		$('#profession').addClass('is-invalid')
		$('#profession-feedback').html('Pilih pekerjaan/ jabatan.')
	}
	else {
		$('#profession').removeClass('is-invalid')
		$('#profession-feedback').html('')
		window.sprofession = true
	}
}
function address() {
	let address = $('#address').val()
	window.saddress = false
	if(address == '' || address == null) {
		$('#address').addClass('is-invalid')
		$('#address-feedback').html('Masukkan alamat rumah.')
	}
	else {
		$('#address').removeClass('is-invalid')
		$('#address-feedback').html('')
		window.saddress = true
	}
}
function province() {
	let province = $('#province').val()
	window.sprovince = false
	if(province == '' || province == null) {
		$('#province').addClass('is-invalid')
		$('#province-feedback').html('Pilih provinsi peserta.')
	}
	else {
		$('#province').removeClass('is-invalid')
		$('#province-feedback').html('')
		window.sprovince = true
	}
}
function district() {
	let district = $('#district').val()
	window.sdistrict = false
	if(district == '' || district == null) {
		$('#district').addClass('is-invalid')
		$('#district-feedback').html('Pilih kabupaten/ kota peserta.')
	}
	else {
		$('#district').removeClass('is-invalid')
		$('#district-feedback').html('')
		window.sdistrict = true
	}
}
function statusu() {
	let statusu = $('#statusu').val()
	window.sstatusu = false
	if(statusu == '' || statusu == null) {
		$('#statusu').addClass('is-invalid')
		$('#statusu-feedback').html('Pilih status usaha.')
	} else {
		$('#statusu').removeClass('is-invalid')
		$('#statusu-feedback').html('')
		window.sstatusu = true
	}
}


$('#name').keyup(function(){
	name()
})
$('#ktp').keyup(function(){
	ktp()
})
$('#email').keyup(function(){
	email()
})
$('#phone').keyup(function(){
	phone()
})
$('#place').keyup(function(){
	place()
})
$('#date').keyup(function(){
	odate()
})
$('#status').change(function(){
	status()
})
$('input[type=radio][name=gender]').change(function(){
	gender()
})
$('#religion').change(function(){
	religion()
})
$('#education').change(function(){
	education()
})
$('#profession').change(function(){
	profession()
})
$('#address').keyup(function(){
	address()
})
$('#province').change(function(){
	province()
})
$('#district').change(function(){
	district()
})
$('#statusu').change(function(){
	statusu()
})

/*-------------------------------------------------------------------------------------------------------*/

$('#update').click(function(){
	
	name()
	ktp()
	email()
	phone()
	place()
	odate()
	status()
	gender()
	religion()
	education()
	profession()
	address()
	province()
	district()
	statusu()
	sphoto = $('#profile_picture').attr('src')

	if(sname == true && sktp == true && semail == true && sphone == true && splace == true && sdate == true && sstatus == true && sgender == true  && sreligion == true && seducation == true && sprofession == true && saddress == true && sprovince == true && sdistrict == true && sstatusu == true) {
		
		let id_kelas = $('#c2lsdmlh').val()
		let vname = $('#name').val()
		let vktp = $('#ktp').val()
		let vemail = $('#email').val()
		let vphone = $('#phone').val()
		let vgender = $('input[type=radio][name=gender]:checked').val()
		let vreligion = $('#religion').val()
		let veducation = $('#education').val()
		let vprofession = $('#profession').val()
		let vplace = $('#place').val()
		let date = $('#date').val()
		let vprovince = $('#province').val()
		let vdistrict = $('#district').val()
		let vaddress = $('#address').val()
		let vstatus = $('#status').val()
		let vstatusp = $('#statusp').val()

		let vstatusu = $('#statusu').val()

		let sektor_usaha_koperasi = $('#sektor_usaha_koperasi').val()
		let nama_koperasi = $('#nama_koperasi').val()
		let no_induk_koperasi = $('#no_induk_koperasi').val()
		let alamat_koperasi = $('#alamat_koperasi').val()
		let jenis_koperasi = $('#jenis_koperasi').val()
		let tenaga_kerja_kop = $('#tenaga_kerja_kop').val()
		let aset_koperasi = $('#aset_koperasi').val()
		let omset_koperasi = $('#omset_koperasi').val()

		let sektor_usaha = $('#sektor_usaha').val()
		let nama_usaha = $('#nama_usaha').val()
		let no_iumk = $('#no_iumk').val()
		let alamat_usaha = $('#alamat_usaha').val()
		let jenis_usaha = $('#jenis_usaha').val()
		let bidang_usaha = $('#bidang_usaha').val()
		let lama_usaha = $('input[type=radio][name=lama_usaha]:checked').val()
		let tenaga_kerja_umkm = $('#tenaga_kerja_umkm').val()
		let aset_umkm = $('#aset_umkm').val()
		let omset_umkm = $('#omset_umkm').val()

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})

		if(vstatusu == '83') {
			sektorUsahaKoperasi()
			namaKoperasi()
			alamatKoperasi()
			noIndukKoperasi()
			jenisKoperasi()
			tenagaKerjaKoperasi()
			asetKoperasi()
			omsetKoperasi()
			if(ssektor_usaha_koperasi==true && snama_koperasi==true && salamat_koperasi==true && sno_induk_koperasi==true && sjenis_koperasi==true && stenaga_kerja_kop==true && saset_koperasi==true && somset_koperasi==true) {
				$('#text').hide()
				$('#loading').show()
				$('#update').prop('disabled',true)
				$.ajax({
					url: apiServer + "api/external_input/profile",
					type: "POST",
					dataType: "JSON",
					headers: {
						"Accept": "application/json"
					},
					data: {
						pelatihan_external_id: id_kelas,
						nama: vname,
						no_ktp: vktp,
						email: vemail,
						no_telp: vphone,
						jenis_kelamin: vgender,

						agama_id: vreligion,
						pendidikan_id: veducation,
						pekerjaan_jabatan_id: vprofession,
						tempat_lahir: vplace,
						tanggal_lahir: date,
						alamat: vaddress,
						provinsi_id: vprovince,
						kab_kota_id: vdistrict,
						status: vstatus,

						status_usaha_id: vstatusu,
						
						nama_koperasi: nama_koperasi,
						no_induk_koperasi: no_induk_koperasi,
						alamat_koperasi: alamat_koperasi,
						jenis_koperasi_id: jenis_koperasi,
						bidang_usaha_koperasi_id: sektor_usaha_koperasi,
						tenaga_kerja_kop: tenaga_kerja_kop,
						asset_koperasi: aset_koperasi,
						omset_koperasi: omset_koperasi
					},
					success: function(result) {
						$('#alert-profil').fadeIn(300)
						$('#text').show()
						$('#loading').hide()
						$('#update').prop('disabled',false)
						setTimeout(function() {
							$('#tambah').hide()
							$('#finish').show()
						  	// window.location.href = '/edukukm/daftar-kelas';
							// $('#alert-profil').fadeOut(300)
						}, 1000)				
					},
					error : function(xhr, ajaxOptions, thrownError){
						console.log(xhr.responseText)
						let jsonResponse = JSON.parse(xhr.responseText)
						console.log(jsonResponse)
					}
				})
			} else {
				$('#modal-required').modal('show')
				$('#text-required').html('Harap lengkapi Data Koperasi.')
			}
		} else if(vstatusu == '84') {

			sektorUsaha()
			namaUsaha()
			// noIumk()
			alamatUsaha()
			jenisUsaha()
			bidangUsaha()
			lamaUsaha()
			tenagaKerjaUmkm()
			asetUmkm()
			omsetUmkm()

			if(ssektor_usaha==true && snama_usaha==true && salamat_usaha==true && sjenis_usaha==true && sbidang_usaha==true && slama_usaha==true && stenaga_kerja_umkm==true && saset_umkm==true && somset_umkm==true) {
				$('#text').hide()
				$('#loading').show()
				$('#update').prop('disabled',true)

				$.ajax({
					url: apiServer + "api/external_input/profile",
					type: "POST",
					dataType: "JSON",
					headers: {
						"Accept": "application/json"
					},
					data: {
						pelatihan_external_id: id_kelas,
						nama: vname,
						no_ktp: vktp,
						email: vemail,
						no_telp: vphone,
						jenis_kelamin: vgender,

						agama_id: vreligion,
						pendidikan_id: veducation,
						pekerjaan_jabatan_id: vprofession,
						tempat_lahir: vplace,
						tanggal_lahir: date,
						alamat: vaddress,
						provinsi_id: vprovince,
						kab_kota_id: vdistrict,
						status: vstatus,

						status_usaha_id: vstatusu,

						sektor_usaha_id: sektor_usaha,
						nama_usaha: nama_usaha,
						no_iumk: no_iumk,
						alamat_usaha: alamat_usaha,
						jenis_umkm_id: jenis_usaha,
						bidang_usaha_umkm_id: bidang_usaha,
						lama_usaha: lama_usaha,
						tenaga_kerja_umkm: tenaga_kerja_umkm,
						asset_umkm: aset_umkm,
						omset_umkm: omset_umkm
					},
					success: function(result) {
						$('#alert-profil').fadeIn(300)
						$('#text').show()
						$('#loading').hide()
						$('#update').prop('disabled',false)
						setTimeout(function() {
							$('#tambah').hide()
							$('#finish').show()
						  	// window.location.href = '/edukukm/daftar-kelas';
							// $('#alert-profil').fadeOut(300)
						}, 1000)				
					},
					error : function(xhr, ajaxOptions, thrownError){
						console.log(xhr.responseText)
						let jsonResponse = JSON.parse(xhr.responseText)
						console.log(jsonResponse)
					}
				})
			} else {
				$('#modal-required').modal('show')
				$('#text-required').html('Harap lengkapi Data UMKM.')
			}
		} else {
			$('#text').hide()
			$('#loading').show()
			$('#update').prop('disabled',true)
			$.ajax({
				url: apiServer + "api/external_input/profile",
				type: "POST",
				dataType: "JSON",
				headers: {
					"Accept": "application/json"
				},
				data: {
					pelatihan_external_id: id_kelas,
					nama: vname,
					no_ktp: vktp,
					email: vemail,
					no_telp: vphone,
					jenis_kelamin: vgender,

					agama_id: vreligion,
					pendidikan_id: veducation,
					pekerjaan_jabatan_id: vprofession,
					tempat_lahir: vplace,
					tanggal_lahir: date,
					alamat: vaddress,
					provinsi_id: vprovince,
					kab_kota_id: vdistrict,
					status: vstatus,

					status_usaha_id: vstatusu
				},
				success: function(result) {
					$('#alert-profil').fadeIn(300)
					$('#text').show()
					$('#loading').hide()
					$('#update').prop('disabled',false)
					setTimeout(function() {
						$('#tambah').hide()
						$('#finish').show()
					  	// window.location.href = '/edukukm/daftar-kelas';
						// $('#alert-profil').fadeOut(300)
					}, 1000)			
				},
				error : function(xhr, ajaxOptions, thrownError){
					console.log(xhr.responseText)
					let jsonResponse = JSON.parse(xhr.responseText)
					console.log(jsonResponse)
				}
			})
		}
	} else {
		$('#modal-required').modal('show')
		$('#text-required').html('Lengkapi biodata peserta terlebih dahulu.')
	}
})

$.ajax({
	url: apiServer + 'api/get_pelatihan_external',
	type: 'GET',
	dataType: 'JSON',
	data: {
		token: token
	},
	success: function(result){
		let value = result.data
		if(value.open == 'false') {
			$("#daftar-peserta").hide()
			$("#close-pelatihan").show()
		} else {
			$("#daftar-peserta").show()
		}
		$('#c2lsdmlh').val(value.id)
		$('#output').html(value.output)
		$('#poster').attr('src',value.poster)
		$('.topik').prepend(value.topik)
		$('#tanggal').html(tanggal(value.tanggal))
		$('#jam').html(value.waktu.substr(0,5)+' WIB')
		$('#keterangan').html(value.keterangan)
	}
})