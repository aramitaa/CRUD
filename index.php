<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<style>
	table {
		width: 50%;
	}
</style>

<br>
<?php
if (isset($_GET['action'])) {
	$daftarnilai = simplexml_load_file('daftar.xml');
	$id = $_GET['id'];
	$index = 0;
	$i = 0;
	foreach ($daftarnilai->daftar as $daftar) {
		if ($daftar['id'] == $id) {
			$index = $i;
			break;
		}
		$i++;
	}
	unset($daftarnilai->daftar[$index]);
	file_put_contents('daftar.xml', $daftarnilai->asXML());
}
$daftarnilai = simplexml_load_file('daftar.xml');

?>
<br>


<div class="container">
	<h4><strong> Daftar Nilai Mahasiswa TAU</strong></h4>
	<br>

	<a href="add.php"><button type="button" class="btn btn-dark mb-4">Add Data Mahasiswa</button></a>

	<table class="table table-striped table-hover" cellpadding="2" cellspacing="2" border="1">
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Matkul</th>
			<th>Nilai Tugas</th>
			<th>Nilai UTS</th>
			<th>Nilai UAS</th>
			<th>Option</th>
		</tr>

		<?php $no = 1; ?>
		<?php foreach ($daftarnilai->daftar as $daftar) : ?>

			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $daftar['id']; ?></td>
				<td><?php echo $daftar->name; ?></td>
				<td><?php echo $daftar->kelas; ?></td>
				<td><?php echo $daftar->matkul; ?></td>
				<td><?php echo $daftar->tugas; ?></td>
				<td><?php echo $daftar->uts; ?></td>
				<td><?php echo $daftar->uas; ?></td>
				<td><a href="edit.php?id=<?php echo $daftar['id']; ?>"><button type="button" class="btn btn-warning">Edit</button></a> |
					<a href="index.php?action=delete&id=<?php echo $daftar['id']; ?>" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger">Delete</button< /a>
				</td>

			</tr>

			<?php $no++; ?>
		<?php endforeach; ?>

	</table>

	<?php echo 'Total Mahasiswa : ' . count($daftarnilai); ?>
</div>