<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<style>
    .container {
        width: 50%;
    }

    .judul {
        text-align: center;
    }
</style>

<?php
$daftarnilai = simplexml_load_file('daftar.xml');

if (isset($_POST['submitSave'])) {

    foreach ($daftarnilai->daftar as $daftar) {
        if ($daftar['id'] == $_POST['id']) {
            $daftar->name = $_POST['name'];
            $daftar->kelas = $_POST['kelas'];
            $daftar->matkul = $_POST['matkul'];
            $daftar->tugas = $_POST['tugas'];
            $daftar->uts = $_POST['uts'];
            $daftar->uas = $_POST['uas'];
            break;
        }
    }
    file_put_contents('daftar.xml', $daftarnilai->asXML());
    header('location:index.php');
}

foreach ($daftarnilai->daftar as $daftar) {
    if ($daftar['id'] == $_GET['id']) {
        $id = $daftar['id'];
        $name = $daftar->name;
        $kelas = $daftar->kelas;
        $matkul = $daftar->matkul;
        $tugas = $daftar->tugas;
        $uts = $daftar->uts;
        $uas = $daftar->uas;
        break;
    }
}

?>
<form method="post">
    <div class="container">
        <br><br>
        <h4 class="judul">- Edit Data Mahasiswa -</h4><br>
        <form method="post">
            <div class="form-group">
                <label for="usr">NIM :</label>
                <input type="text" readonly class="form-control-plaintext" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Nama :</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="usr">Kelas :</label>
                <input type="text" class="form-control" name="kelas" value="<?php echo $kelas; ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Mata Kuliah :</label>
                <input type="text" class="form-control" name="matkul" value="<?php echo $matkul; ?>">
            </div>
            <div class="form-group">
                <label for="usr">Nilai Tugas :</label>
                <input type="text" class="form-control" name="tugas" value="<?php echo $tugas; ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Nilai UTS :</label>
                <input type="text" class="form-control" name="uts" value="<?php echo $uts; ?>">
            </div>
            <div class=" form-group">
                <label for="pwd">Nilai UAS :</label>
                <input type="text" class="form-control" name="uas" value="<?php echo $uas; ?>">
            </div>
            <td>&nbsp;</td>
            <td><button type="submit" name="submitSave" class="btn btn-dark mb-5">Save</button></td>
        </form>
    </div>
</form>