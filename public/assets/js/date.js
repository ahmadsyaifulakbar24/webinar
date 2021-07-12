function tanggal(date) {
	var day = []
	day[0] = 'Minggu'
	day[1] = 'Senin'
	day[2] = 'Selasa'
	day[3] = 'Rabu'
	day[4] = 'Kamis'
	day[5] = `Jum'at`
	day[6] = 'Sabtu'

	var month = []
	month['01'] = 'Jan'
	month['02'] = 'Feb'
	month['03'] = 'Mar'
	month['04'] = 'Apr'
	month['05'] = 'Mei'
	month['06'] = 'Jun'
	month['07'] = 'Jul'
	month['08'] = 'Agu'
	month['09'] = 'Sep'
	month['10'] = 'Okt'
	month['11'] = 'Nov'
	month['12'] = 'Des'

	var tgl = date.substr(8, 2)
	var bln = date.substr(5, 2)
	var thn = date.substr(0, 4)
	
	var hari = day[new Date(thn+'-'+bln+'-'+tgl).getDay()]
	var bulan = month[bln]
	var tanggal = hari+', '+tgl+' '+bulan+' '+thn

	return(tanggal)
}


function tanggal2(date) {
	var day = []
	day[0] = 'Minggu'
	day[1] = 'Senin'
	day[2] = 'Selasa'
	day[3] = 'Rabu'
	day[4] = 'Kamis'
	day[5] = `Jum'at`
	day[6] = 'Sabtu'

	var month = []
	month['01'] = 'Januari'
	month['02'] = 'Februari'
	month['03'] = 'Maret'
	month['04'] = 'April'
	month['05'] = 'Mei'
	month['06'] = 'Juni'
	month['07'] = 'Juli'
	month['08'] = 'Agustus'
	month['09'] = 'September'
	month['10'] = 'Oktober'
	month['11'] = 'November'
	month['12'] = 'Desember'

	var tgl = date.substr(8, 2)
	var bln = date.substr(5, 2)
	var thn = date.substr(0, 4)
	
	var hari = day[new Date(thn+'-'+bln+'-'+tgl).getDay()]
	var bulan = month[bln]
	var tanggal = tgl+' '+bulan+' '+thn

	return(tanggal)
}
// alert(tanggal('2020/02/20'))