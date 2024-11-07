<?php
require 'functions.php';
$id_mhs = $_GET["id"];

if(delete($id_mhs)) {
    echo "<script>
        alert('data succes removed!')
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>alert('failed!')</script>";
}

?>