<?php 
session_start();
 include '../koneksi.php';
if(!isset($_SESSION['status_login'])){
    echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
}
?>
<!DOCTYPE html>
<HTml>
    <head>
        <title>Panel Admin - GMI ANUGERAH BATAM</title> 
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="bg-light">
        <!-- navbar -->
        <div class="navbar">
            <div class="container">
                <!-- navbar brand -->
                <h2 class="nav-brand fload-left"><a href="index.php">GMI ANUGERAH BATAM</a></h2>
                <!-- navbar menu -->
                <ul class="nav-menu fload-left">
                    <li><a href="index.php">Dasboard</a></li>

                    <?php if($_SESSION['level'] == 'Super Admin'){?>

                    <li><a href="pengguna.php">Pengguna</a></li>
                    <?php } elseif($_SESSION['level'] == 'Admin') {?>

                    <li><a href="galery.php">Galery</a></li>
                    <li><a href="informasi.php">Informasi</a></li>
                    <li>
                        <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>
                        <!-- sub menu -->
                        <ul class="dropdown">
                            <li><a href="identitas-gereja.php">Identitas Gereja</a></li>
                            <li><a href="tentang-gereja.php">Tentang Gereja</a></li>
                            <li><a href="gembala.php">Gembala/Pimpinan Jemaat</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <li>
                        <a href="#"><?= $_SESSION['username'] ?> (<?= $_SESSION['level'] ?>)<i class="fa fa-caret-down"></i></a>
                        <!-- sub menu -->
                        <ul class="dropdown">
                            <li><a href="ubah-password.php">Ubah Password</a></li>
                            <li><a href="logout.php">Keluar</a></li>
                            
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>