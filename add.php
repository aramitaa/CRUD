<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .container {
        width: 50%;
    }

    .judul {
        text-align: center;
    }
</style>

<?php
if (isset($_POST['submitSave'])) {
    $daftarnilai = simplexml_load_file('daftar.xml');
    $daftar = $daftarnilai->addChild('daftar');
    $daftar->addAttribute('id', $_POST['id']);
    $daftar->addChild('name', $_POST['name']);
    $daftar->addChild('kelas', $_POST['kelas']);
    $daftar->addChild('matkul', $_POST['matkul']);
    $daftar->addChild('tugas', $_POST['tugas']);
    $daftar->addChild('uts', $_POST['uts']);
    $daftar->addChild('uas', $_POST['uas']);
    file_put_contents('daftar.xml', $daftarnilai->asXML());
    header('location:index.php');
}
?>

<body>
    <div class="container">
        <br><br>
        <h4 class="judul">- Data Mahasiswa -</h4><br>
        <form method="post">
            <div class="form-group">
                <label for="usr">NIM :</label>
                <input type="text" class="form-control" name="id">
            </div>
            <div class="form-group">
                <label for="pwd">Nama :</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="usr">Kelas :</label>
                <input type="text" class="form-control" name="kelas">
            </div>
            <div class="form-group">
                <label for="pwd">Mata Kuliah :</label>
                <input type="text" class="form-control" name="matkul">
            </div>
            <div class="form-group">
                <label for="usr">Nilai Tugas :</label>
                <input type="text" class="form-control" name="tugas">
            </div>
            <div class="form-group">
                <label for="pwd">Nilai UTS :</label>
                <input type="text" class="form-control" name="uts">
            </div>
            <div class="form-group">
                <label for="pwd">Nilai UAS :</label>
                <input type="text" class="form-control" name="uas">
            </div>
            <button type="submit" name="submitSave" class="btn btn-dark mb-5">Save</button>
        </form>
    </div>
</body>