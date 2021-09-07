<?php include 'header.php'?>

<?php
 $tb_admin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_GET['id_admin']."' ");
 $a          =mysqli_fetch_object($tb_admin);
?>
        <!-- container -->
        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Pengguna
                    </div>
                    <div class="box-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?= $a->nm_admin ?>" required>

                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="user" placeholder="Username" class="input-control" value="<?= $a->username ?>" required>

                            </div>
                            <div class="form-group">
                                <label>level</label>
                                <input type="text" name="level" placeholder="level" class="input-control" value="<?= $a->level ?>" required>
                               
                                </div>
                                  
                                <input type="submit" name="submit" value="Simpan" class="btn"> 
                                <button type="button" class="btn btn-blue" onclick="window.location = 'pengguna.php'">Kembali</button> 
                                
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $nama   = addslashes(ucwords ($_POST['nama']));
                            $user   = addslashes($_POST['user']);
                            $level   = $_POST['level'];
                            
                            $update = mysqli_query($conn, "UPDATE tb_admin SET
                                    nm_admin = '".$nama."',
                                    username = '".$user."',
                                    level = '".$level."'
                                    WHERE id_admin = '".$_GET['id_admin']."'
                            ");

                            
                            if($update){
                                echo '<div class="alert alert success"> Edit Data Berhasil</div>';
                            }else{
                                echo 'Gagal edit Data'.mysqli_error($conn);
                            }
                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
<?php include 'footer.php'?>