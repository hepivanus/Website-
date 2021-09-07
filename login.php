<?php 
session_start();
include  "koneksi.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Halaman Login</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <!-- page login -->
    <div class = "page-login">
        <!-- boc -->
        <div class = "box box-login">
            <!-- box header -->
            <div class="box-header">
                Login
            </div>
            <!-- box body -->
            <div class="box-body">
                <?php
                if(isset($_GET['msg'])){
                    echo "<div class='alert alert-error'>".$_GET['msg']."</div>";
                }
                ?>
                <!-- forn login -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" name="user" placeholder="Username" class="input-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" placeholder="password" class="input-control">
                    </div>
                    <input type="submit" name="submit" value="login" class="btn">
                </form>
                <?php 
                    if(isset($_POST['submit'])){
                        $user = mysqli_real_escape_string($conn, $_POST['user']); 
                        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
                        
                        $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' ");
                        if(mysqli_num_rows($cek)> 0){
                            $d = mysqli_fetch_object($cek);
                            if(md5($pass) == $d->password){
                                $_SESSION['status_login']        =   true;
                                $_SESSION['uid']                 = $d->id;
                                $_SESSION['username']               = $d->username;
                                $_SESSION['level']              = $d->level;
                                echo "<script>window.location = 'admin/index.php'</script>";

                            }else{
                                echo '<div class="alert alert-error">Password Anda Salah</div>';
                            }
                        }else{
                            echo '<div class="alert alert-error">Username tidak di temukan</div>';
                        }
                    }
                ?>
            </div>
            <!-- box footer -->
            <div class="box-footer text-center">
            <a href="index.php">Halaman Utama</a>
             </div>

        </div>
    </div>
</body>
</html>