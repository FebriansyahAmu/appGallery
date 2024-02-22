<?php
    include("dashboard.php");
    $userID = $_SESSION['UserID'];

    include("../action/config.php");
    $query = "SELECT * FROM album WHERE UserID = $userID";
    $result = mysqli_query($connection, $query);
?>

<div id="main-content">

        <div class="card mt-5">
            <div class="card-header">
                Input Gambar
            </div>
            <div class="card-body">
                <div class="card-body">
            <h5 class="card-title">Silahkan Input Foto</h5>
            <div class="row mx-auto">
                <form method="POST" action="../action/actionuploadfoto.php" enctype="multipart/form-data">
                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="JudulFoto" class="form-label">Judul Foto</label>
                        <input class="form-control" type="text" name="JudulFoto" required />
                    </div>

                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="DeskripsiFoto" class="form-label">Deskripsi Foto</label>
                        <input class="form-control" type="text" name="DeskripsiFoto" required/>
                    </div>

                    <div class="col-md-4 mb-3 mx-auto">
                            <label for="AlbumID" class="form-label">Album</label>
                                <select class="form-select" name="AlbumID">
                                      <?php
                                           while ($row = mysqli_fetch_assoc($result)) {
                                               echo '<option value="' . $row['AlbumID'] . '">' . $row['AlbumID'] . '</option>';
                                          }
                                    ?>
                            </select>
                    </div>

                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="BuktiTransaksi" class="form-label">Upload Foto</label>
                        <input class="form-control" type="file" name="FileFoto" accept=".png, .jpg" required/>
                    </div>

                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="UserID" class="form-label">User ID</label>
                        <input class="form-control" type="text" name="UserID" value="<?php echo $userID ?>" readonly/>
                    </div>
 
                    <div class="col d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary">Tambahkan Foto</button>
                    </div>

                </form>
            </div>
        </div>
            </div>
        </div>


        <h2>Koleksi Foto</h2>
        <?php
        include("../action/config.php");
        $sessionUserID = $_SESSION['UserID'];
        $query = "SELECT 
                Album.AlbumID,
                Album.NamaAlbum,
                Album.Deskripsi,
                Album.TanggalDibuat,
                COUNT(Foto.FotoID) AS JumlahFoto
            FROM 
                Album
            LEFT JOIN 
                Foto ON Album.AlbumID = Foto.AlbumID
            WHERE
                Album.UserID = ?
            GROUP BY 
                Album.AlbumID, Album.NamaAlbum, Album.Deskripsi, Album.TanggalDibuat;
            ";
        $stmt = mysqli_prepare($connection, $query);

        mysqli_stmt_bind_param($stmt, "i", $sessionUserID);

        // Eksekusi pernyataan SQL
        mysqli_stmt_execute($stmt);

        // Dapatkan hasil dari pernyataan SQL
        $result = mysqli_stmt_get_result($stmt);

        echo "
            <table class='table'>
            <tr>
                <th>Album ID</th>    
                <th>Nama Album</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
                <th>Jumlah Foto</th>
                <th>Action</th>
            </tr>
        ";
    
    while($row = mysqli_fetch_assoc($result)){

        echo "<tr>";
        echo "<td>". $row['AlbumID'] . "</td>";
        echo "<td>". $row['NamaAlbum'] . "</td>";
        echo "<td>". $row['Deskripsi'] . "</td>";
        echo "<td>". $row['TanggalDibuat'] . "</td>";
        echo "<td>". $row['JumlahFoto'] . "</td>";
        echo "<td><a href='koleksiFoto.php?id=". $row['AlbumID'] ."' class='btn btn-success'>Lihat Koleksi</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    ?>

</div>