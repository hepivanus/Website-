<?php
include '../koneksi.php';
if(isset($_GET['id'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_admin WHERE id_admin = '".$_GET['id']."' ");
    echo "<script>window.location = 'pengguna.php'</script>";
}
?>