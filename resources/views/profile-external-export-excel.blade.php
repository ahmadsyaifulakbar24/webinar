<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <!-- Detail Kelas -->
            <th>unit</th>
            <th>Jenis Kegiatan Pelatihan</th>
            <th>Topik</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Waktu Pelaksanaan</th>
            <th>Keterangan</th>
            <th>Link dan Deskripsi Kelas</th>

            <!-- Profile Peserta -->
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nomor KTP</th>
            <th>Status</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Pendidikan Terakhir</th>
            <th>Alamat Rumah</th>
            <th>Email</th>
            <th>Telp/ Hp</th>
            <th>Kab/ Kota Peserta</th>
            <th>Pekerjaan/ Jabatan</th>
            <th>Status Usaha</th>
            <th>Sektor Usaha Koperasi/ UMKM</th>
            <th>Nama Koperasi/UMKM</th>
            <th>Alamat Koperasi/ UMKM</th>
            <th>Nomor Induk Koperasi(NIK)</th>
            <th>Jenis Usaha Koperasi/ UMKM</th>
            <th>Bidang Usaha UMKM</th>
            <th>Lama Usaha UMKM</th>
            <th>Jumlah Tenaga Koperasi/ UMKM</th>
            <th>Omset Koperasi per Tahun/ Omset Usaha per Bulan</th>
        </tr>

        <!-- Output Kelas -->
        @foreach($data_profile as $profile)
        <tr>
            <td>{{ !empty($pelatihan_external->unit) ? $pelatihan_external->unit->unit : '' }}</td>
            <td>{{ !empty($pelatihan_external->sub_unit) ? $pelatihan_external->sub_unit->sub_unit : ''}}</td>
            <td>{{ $pelatihan_external->topik }}</td>
            <td>{{ $pelatihan_external->tanggal }}</td>
            <td>{{ $pelatihan_external->waktu }}</td>
            <td>{{ $pelatihan_external->keterangan }}</td>
            <td>{{ $pelatihan_external->output }}</td>

            <!-- Output Profile Peserta -->
            <?php $no = 1; ?>
            <td>{{ $no++ }}</td>
            <td>{{ $profile->nama }}</td>
            <td>'{{ $profile->no_ktp }}</td>
            <td>{{ $profile->status }}</td>
            <td>{{ $profile->jenis_kelamin }}</td>
            <td>{{ $profile->tempat_lahir }}</td>
            <td>{{ $profile->tanggal_lahir }}</td>
            <td>{{ !empty($profile->agama) ? $profile->agama->params : '' }}</td>
            <td>{{ !empty($profile->pendidikan) ? $profile->pendidikan->params : '' }}</td>
            <td>{{ $profile->alamat }}</td>
            <td>{{ $profile->email }}</td>
            <td>'{{ $profile->no_telp }}</td>
            <td>{{ !empty($profile->kab_kota) ? $profile->kab_kota->kab_kota : '' }}</td>
            <td>{{ !empty($profile->pekerjaan_jabatan) ? $profile->pekerjaan_jabatan->params : '' }}</td>
            <td>{{ !empty($profile->status_usaha) ? $profile->status_usaha->params : '' }}</td>
            <td>
                {{ !empty($profile->bidang_usaha_koperasi) ? $profile->bidang_usaha_koperasi->params : '' }}
                {{ !empty($profile->sektor_usaha) ? $profile->sektor_usaha->params : '' }}    
            </td>
            <td>
                {{ $profile->nama_koperasi }}
                {{ $profile->nama_usaha }}
            </td>
            <td>
                {{ $profile->alamat_koperasi }}
                {{ $profile->alamat_usaha }}
            </td>
            <td> {{ $profile->no_induk_koperasi }}</td>
            <td> 
                {{ !empty($profile->jenis_koperasi) ? $profile->jenis_koperasi->params : '' }}
                {{ !empty($profile->jenis_umkm) ? $profile->jenis_umkm->params : '' }}    
            </td>
            <td>{{ !empty($profile->bidang_usaha_umkm) ? $profile->bidang_usaha_umkm->params : '' }}</td>
            <td>{{ $profile->lama_usaha }}</td>
            <td>
                {{ $profile->tenaga_kerja_kop }}
                {{ $profile->tenaga_kerja_umkm }}
            </td>
            <td>
                {{ $profile->omset_koperasi }}
                {{ $profile->omset_umkm }}
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>