<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF Pengaduan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No. ID</th>
				<th>NIK</th>
				<th>Laporan</th>
				<th>Status</th>
				<th>ID Jenis</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pengaduan as $p)
			<tr>
				<td>{{ $p->id_pengaduan }}</td>
				<td>{{$p->nik}}</td>
				<td>{{$p->isi_laporan}}</td>
				<td>{{$p->status}}</td>
				<td>{{$p->id_jenis}}</td>
				<td>{{$p->tgl_pengaduan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>