<?php include 'header.php'?>
        <!-- container -->
        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Pengguna
                    </div>
                    <div class="box-body">
                        <a href="tambah-pengguna.php" class="text-tambah"> <i class = "fa fa-user-plus"></i>Tambah</a> 

                        <form action="">
                            <div class="input-group">
                                <input type="text" name="key" placeholder="pencarian">
                                <button type="submit" > <i class="fa fa-search "></i></button>
                            </div>
                        </form>

                       <table class='table'>
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Username</th>
                                   <th>level</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tbody> 
                               <?php
                               $no = 1;

                                $where =" WHERE 1=1" ;
                               if(isset($_GET["key"])){
                                   $where .= "AND id_admin LIKE '%".addslashes($_GET["key"])."%' ";
                               }


                                $tb_admin = mysqli_query($conn, "SELECT * FROM tb_admin $where ORDER BY id_admin DESC");
                                if (mysqli_num_rows($tb_admin) > 0) {
                                    while ($a = mysqli_fetch_array($tb_admin)){
                               ?>

                               <tr>
                                   <td><?= $no++ ?></td>
                                   <td><?= $a ['nm_admin'] ?></td>
                                   <td><?= $a ['username'] ?></td>
                                   <td><?= $a ['level'] ?></td>
                                   <td>
                                       <a href="edit-pengguna.php?id_admin= <?= $a['id_admin'] ?>" title= "Edit Data" class="text-red"><i class="fa fa-edit"></i></a> |
                                       <a href="hapus.php?id=<?=$a  ['id_admin'] ?>" onclick="return confirm('Yakin ingin di hapus ?')" title = "Hapus Data"><i class="fa fa-trash-alt"></i></a> 
                                   </td>
                               </tr>
                               <?php }}else{ ?>
                                <tr>
                                    <td colspan="5">Data Tidak Ada</td>
                                </tr>
                               <?php } ?>     
                               
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
<?php include 'footer.php'?> 