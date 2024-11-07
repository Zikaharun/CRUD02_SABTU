<?php
require 'functions.php';

$id = $_GET['id'];

$result = query("SELECT * FROM mahasiswa where id_mhs = $id")[0];
$nim = $nama = $alamat = $prodi = "";

if(isset($_POST['btn-add'])) {

    $_POST['id'] = $id;

    if(update($_POST)) {
        echo "<script>alert('Success updated!')</script>";
        header("Location: index.php");
        exit;
    } else {
        echo "<p>failed!</p>";
        exit;
    }
}



// Menampilkan semua jenis error
error_reporting(E_ALL);

// Menampilkan error di layar
ini_set('display_errors', '1');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD 02 PEMROGRAMAN WEB PHP & MYSQL + BOOTSTRAP 5</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center">CRUD 02 PEMROGRAMAN WEB PHP & MYSQL + BOOTSTRAP 5</h1>
    <h2 class="text-center">ITB SWADHARMA</h2>

    <div class="card mt-3">
        <div class="card-header text-white bg-primary">
        Form-input mahasiswa
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
                <?php if (isset($_POST['btn-blank'])) : ?>
                    <div class="form-group">
                    <label for="nim" class="mt-3">Nim</label>
                    <input type="text" name="nim" placeholder="Input Nim anda disini" id="nim" class="form-control" required value="">

                </div>
                <div class="form-group">
                    <label for="nama" class="mt-3">Nama</label>
                    <input type="text" name="nama" placeholder="Input nama anda disini" id="nama" class="form-control" required value="">

                </div>
                <div class="form-group">
                    <label for="alamat" class="mt-3">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Input alamat anda disini..."></textarea>
                </div>
                <div class="form-group">
                    <label for="prodi" class="mt-3">Program studi</label>
                    <select name="prodi" id="prodi" class="form-control" >
                    <option value="D3-MI" <?= ($result['prodi'] == 'D3-MI') ? 'selected' : ''; ?>>D3-MI</option>
                    <option value="S1-SI" <?= ($result['prodi'] == 'S1-SI') ? 'selected' : ''; ?>>S1-SI</option>
                    <option value="S1-TI" <?= ($result['prodi'] == 'S1-TI') ? 'selected' : ''; ?>>S1-TI</option>
                    </select>
                
                </div>
                <?php else : ?>
                <div class="form-group">
                    <label for="nim" class="mt-3">Nim</label>
                    <input type="text" name="nim" placeholder="Input Nim anda disini" id="nim" class="form-control" required value="<?= $result['nim']?>">

                </div>
                <div class="form-group">
                    <label for="nama" class="mt-3">Nama</label>
                    <input type="text" name="nama" placeholder="Input nama anda disini" id="nama" class="form-control" required value="<?= $result['nama']?>">

                </div>
                <div class="form-group">
                    <label for="alamat" class="mt-3">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Input alamat anda disini..."><?= $result['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="prodi" class="mt-3">Program studi</label>
                    <select name="prodi" id="prodi" class="form-control" >
                    <option value="D3-MI" <?= ($result['prodi'] == 'D3-MI') ? 'selected' : ''; ?>>D3-MI</option>
                    <option value="S1-SI" <?= ($result['prodi'] == 'S1-SI') ? 'selected' : ''; ?>>S1-SI</option>
                    <option value="S1-TI" <?= ($result['prodi'] == 'S1-TI') ? 'selected' : ''; ?>>S1-TI</option>
                    </select>
                    <?php endif ?>
                <button type="submit" class="btn btn-success mt-3" name="btn-add">add</button>
                <button type="submit" class="btn btn-danger mt-3" name="btn-blank">blank</button>

            </form>
        </div>
        </div>

        <a href="index.php" class="btn btn-secondary">back</a>
       
    </div>
  
    

<script type="text/javascript " src="js/bootstrap.min.js"></script>
</body>
</html>