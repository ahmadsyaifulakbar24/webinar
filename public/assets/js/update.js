function name() {
	var name = $('#name').val()
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
function email() {
	var email = $('#email').val()
	window.semail = false
	var r = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
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
	var phone = $('#phone').val()
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
function nkp() {
	var nkp = $('#nkp').val()
	window.snkp = false
	if(nkp != '' || nkp != null) {
		if(!/^[0-9]*$/g.test(nkp)) {
			$('#nkp').addClass('is-invalid')
			$('#nkp-feedback').html('Masukkan nomor kartu prakerja dengan benar.')
		}
		else {
			$('#nkp').removeClass('is-invalid')
			$('#nkp-feedback').html('')
			window.snkp = true
		}
	}
}
function place() {
	var place = $('#place').val()
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
	var date = $('#date').val()
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
	var status = $('#status').val()
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
	var gender = $('input[type=radio][name=gender]:checked').val()
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
	var religion = $('#religion').val()
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
	var education = $('#education').val()
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
	var profession = $('#profession').val()
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
	var address = $('#address').val()
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
	var province = $('#province').val()
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
	var district = $('#district').val()
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
	var statusu = $('#statusu').val()
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
$('#email').keyup(function(){
	email()
})
$('#phone').keyup(function(){
	phone()
})
$('#nkp').keyup(function(){
	nkp()
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
	email()
	phone()
	nkp()
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

	if(sname == true && semail == true && sphone == true && snkp == true && splace == true && sdate == true && sstatus == true && sgender == true  && sreligion == true && seducation == true && sprofession == true && saddress == true && sprovince == true && sdistrict == true && sstatusu == true) {
		
		if(sphoto != 'img/user.jpg') {

			var vname = $('#name').val()
			var vnik = $('#nik').val()
			var vemail = $('#email').val()
			var vphone = $('#phone').val()
			var vnkp = $('#nkp').val()
			var vgender = $('input[type=radio][name=gender]:checked').val()
			var vreligion = $('#religion').val()
			var veducation = $('#education').val()
			var vprofession = $('#profession').val()
			var vplace = $('#place').val()
			var date = $('#date').val()
			var vprovince = $('#province').val()
			var vdistrict = $('#district').val()
			var vaddress = $('#address').val()
			var vstatus = $('#status').val()
			var vstatusp = $('#statusp').val()

			var vstatusu = $('#statusu').val()

			var sektor_usaha_koperasi = $('#sektor_usaha_koperasi').val()
			var nama_koperasi = $('#nama_koperasi').val()
			var no_induk_koperasi = $('#no_induk_koperasi').val()
			var alamat_koperasi = $('#alamat_koperasi').val()
			var jenis_koperasi = $('#jenis_koperasi').val()
			var tenaga_kerja_kop = $('#tenaga_kerja_kop').val()
			var aset_koperasi = $('#aset_koperasi').val()
			var omset_koperasi = $('#omset_koperasi').val()

			let sektor_usaha_id = $('#sektor_usaha').val()
			var nama_usaha = $('#nama_usaha').val()
			var no_iumk = $('#no_iumk').val()
			var alamat_usaha = $('#alamat_usaha').val()
			var jenis_usaha = $('#jenis_usaha').val()
			var bidang_usaha = $('#bidang_usaha').val()
			var lama_usaha = $('input[type=radio][name=lama_usaha]:checked').val()
			var tenaga_kerja_umkm = $('#tenaga_kerja_umkm').val()
			let aset_umkm = $('#aset_umkm').val()
			let omset_umkm = $('#omset_umkm').val()

			console.log(sektor_usaha_id)
			console.log(aset_umkm)
			console.log(omset_umkm)

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
						url: "http://siwira.id/api/user/update",
						type: "PATCH",
						dataType: "JSON",
						headers: {
							"Accept": "application/json"
						},
						data: {
							user_id: window.id,
							name: vname,
							nik: vnik,
							email: vemail,
							no_hp: vphone,
							jenis_kelamin: vgender,

							nkp: vnkp,
							agama_id: vreligion,
							pendidikan_id: veducation,
							pekerjaan_jabatan_id: vprofession,
							tempat_lahir: vplace,
							tanggal_lahir: date,
							alamat_rumah: vaddress,
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
							  	window.location.href = '/';
								// $('#alert-profil').fadeOut(300)
							}, 1000)				
						},
						error : function(xhr, ajaxOptions, thrownError){
							console.log(xhr.responseText)
							var jsonResponse = JSON.parse(xhr.responseText)
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
						url: "http://siwira.id/api/user/update",
						type: "PATCH",
						// dataType: "JSON",
						// headers: {
						// 	"Accept": "application/json"
						// },
						data: {
							user_id: window.id,
							name: vname,
							nik: vnik,
							email: vemail,
							no_hp: vphone,
							jenis_kelamin: vgender,

							nkp: vnkp,
							agama_id: vreligion,
							pendidikan_id: veducation,
							pekerjaan_jabatan_id: vprofession,
							tempat_lahir: vplace,
							tanggal_lahir: date,
							alamat_rumah: vaddress,
							provinsi_id: vprovince,
							kab_kota_id: vdistrict,
							status: vstatus,

							status_usaha_id: vstatusu,

							sektor_usaha_id: sektor_usaha_id,
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
							  	window.location.href = '/';
								// $('#alert-profil').fadeOut(300)
							}, 1000)				
						},
						error : function(xhr, ajaxOptions, thrownError){
							console.log(xhr.responseText)
							var jsonResponse = JSON.parse(xhr.responseText)
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
					url: "http://siwira.id/api/user/update",
					type: "PATCH",
					dataType: "JSON",
					headers: {
						"Accept": "application/json"
					},
					data: {
						user_id: window.id,
						name: vname,
						nik: vnik,
						email: vemail,
						no_hp: vphone,
						jenis_kelamin: vgender,

						nkp: vnkp,
						agama_id: vreligion,
						pendidikan_id: veducation,
						pekerjaan_jabatan_id: vprofession,
						tempat_lahir: vplace,
						tanggal_lahir: date,
						alamat_rumah: vaddress,
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
						  	window.location.href = '/';
							// $('#alert-profil').fadeOut(300)
						}, 1000)			
					},
					error : function(xhr, ajaxOptions, thrownError){
						console.log(xhr.responseText)
						var jsonResponse = JSON.parse(xhr.responseText)
						console.log(jsonResponse)
					}
				})
			}
		} else {
			$('#modal-required').modal('show')
			$('#text-required').html('Ubah foto terlebih dahulu.')
		}
	} else {
		$('#modal-required').modal('show')
		$('#text-required').html('Lengkapi biodata terlebih dahulu.')
	}
})