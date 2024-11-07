<?php
require 'functions.php';

$nim = $nama = $alamat = $prodi = "";

if(isset($_POST['btn-save'])) {

    if(add($_POST)) {
        echo "<script>
        alert('Success added!')
        </script>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<script>
        alert('failed to add')
        </script>";
        
    }

}

if (isset($_POST['btn-blank'])) {
    $nim = $nama = $alamat = $prodi = "";
}


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
<div class="container py-4">
<h1 class="text-center">CRUD 02 PEMROGRAMAN WEB PHP & MYSQL + BOOTSTRAP 5</h1>
    <h2 class="text-center">ITB SWADHARMA</h2>

    <div class="card my-3">
        <div class="card-header text-white bg-primary">
        Form-input mahasiswa
        </div>
        <div class="card-body">
            
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post" >
            
                <div class="form-group">
                   
                    <label for="nim" class="mt-3">Nim</label>
                    <input type="text" name="nim" placeholder="Input Nim anda disini" id="nim" class="form-control" required >

                </div>
                <div class="form-group">
                    <label for="nama" class="mt-3">Nama</label>
                    <input type="text" name="nama" placeholder="Input nama anda disini" id="nama" class="form-control" required >

                </div>
                <div class="form-group">
                    <label for="alamat" class="mt-3">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Input alamat anda disini..."></textarea>
                </div>
                <div class="form-group">
                    <label for="prodi" class="mt-3">Program studi</label>
                    <select name="prodi" id="prodi" class="form-control">
                        <option value="D3-MI">D3-MI</option>
                        <option value="S1-SI">S1-SI</option>
                        <option value="S1-TI">S1-TI</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="btn-save">save</button>
                <button type="submit" class="btn btn-danger mt-3" name="btn-blank">blank</button>

            </form>
        </div>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                Daftar Mahasiswa
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Program studi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php

                    $no =1;

                    $result = query("SELECT * FROM mahasiswa ORDER BY id_mhs DESC");
                    foreach($result as $row) :

                    

                    ?>


                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nim']?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['prodi'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id_mhs'] ?>" class="btn btn-warning">edit</a>
                            <a href="delete.php?id=<?= $row['id_mhs'] ?>" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                  <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
  
    

<script type="text/javascript " src="js/bootstrap.min.js"></script>
</body>
</html>