<?php include 'header.php'?>
        <!-- container -->
        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Tambah Pengguna
                    </div>
                    <div class="box-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>

                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="user" placeholder="Username" class="input-control" required>

                            </div>
                            <div class="form-group">
                                <label>level</label>
                                <input type="text" name="level" placeholder="level" class="input-control" required>
                               
                                </div>
                                  
                                <input type="submit" name="submit" value="Simpan" class="btn"> 
                                <button type="button" class="btn btn-blue" onclick="window.location = 'pengguna.php'">Kembali</button> 
                                
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $nama   = addslashes(ucwords ($_POST['nama']));
                            $user   = addslashes($_POST['user']);
                            $level   = $_POST['level'];
                            $pass   = '123456';

                            $cek = mysqli_query($conn, "SELECT username FROM tb_admin WHERE username = '".$user."' ");
                            if(mysqli_num_rows($user) > 0){
                                echo '<div class="alert alert success"> Username Sudah digunakan</div>';

                            }else{
                                    $simpan = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                                        null,
                                        '".$nama."',
                                        '".$user."',
                                        '".$level."',
                                        '".MD5($pass)."'
        
                                    )");
                                if($simpan){
                                     echo '<div class="alert alert success"> Data Berhasil</div>';
                                }else{
                                    echo 'Gagal menyimpan'.mysqli_error($conn);
                                }
                            }

                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
<?php include 'footer.php'?>