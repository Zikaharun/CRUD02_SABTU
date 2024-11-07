<?php
require 'db.php';

function query($data) {
    global $connect;

    $stmt = $connect->prepare($data);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

function add($data) {
    global $connect;

    $nim = intval($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $prodi = htmlspecialchars($data["prodi"]);
    if(!empty($nim) && !empty($nama) && !empty($alamat) && !empty($prodi)) {
        $stmt = $connect->prepare("INSERT INTO mahasiswa(nim,nama,alamat,prodi)VALUES(?,?,?,?)");
        $stmt->bind_param("isss", $nim,$nama,$alamat,$prodi);
        $result = $stmt->execute();

        $stmt->close();

        return $result;

    } else {
        echo "<script>alert('Failed!')</script>";
        exit;
    }
}

function delete($id) {
    global $connect;

    $id = intval($id);

    $stmt = $connect->prepare("DELETE FROM mahasiswa WHERE id_mhs = ?");
    if (!$stmt) {
        // Jika prepare gagal, kembalikan false
        echo "<script>alert('Failed to prepare delete statement');</script>";
        return false;
    }

    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();

    // Mengembalikan hasil eksekusi (true jika berhasil, false jika gagal)
    return $result;
}

function update($data) {
    global $connect;

    $nim = intval($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $prodi = htmlspecialchars($data['prodi']);
    $id_mhs = intval($data['id']);

    // Pengecekan awal
    if (empty($id_mhs)) {
        echo "<script>alert('ID tidak valid!')</script>";
        exit;
    }

    if (!empty($nim) && !empty($nama) && !empty($alamat) && !empty($prodi)) {
        $stmt = $connect->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, alamat = ?, prodi = ? WHERE id_mhs = ?");
        
        if (!$stmt) {
            echo "Error preparing statement: " . $connect->error;
            exit;
        }
        
        $stmt->bind_param("isssi", $nim, $nama, $alamat, $prodi, $id_mhs);
        
        $result = $stmt->execute();
        
        if (!$result) {
            echo "Error executing statement: " . $stmt->error;
            exit;
        }

        $stmt->close();
        
        return $result;

    } else {
        echo "<script>alert('Data tidak lengkap!')</script>";
        exit;
    }
}




?>