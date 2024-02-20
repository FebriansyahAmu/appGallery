<?php
    include("dashboard.php");
?>
<div id="main-content">
        <div class="card mt-5">
            <div class="card-header">
                Albums
            </div>
            <div class="card-body">
                <div class="card-body">
            <h5 class="card-title">Buat Album Baru</h5>
            <div class="row mx-auto">
                <form method="POST" action="../action/actionalbum.php"> 
                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="NamaAlbum" class="form-label">Nama Album</label>
                        <input class="form-control" type="text" name="NamaAlbum" required />
                    </div>
                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <input class="form-control" type="text" name="Deskripsi" required/>
                    </div>

                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="UserID" class="form-label">User ID</label>
                        <input class="form-control" type="text" name="UserID" value="<?php echo $_SESSION['UserID'] ?>" readonly/>
                    </div>

                    <div class="col d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary">Buat Album Baru</button>
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
        
        <?php

        include("../action/config.php");
        $sessionUserID = $_SESSION['UserID'];
        $query = "SELECT * FROM album WHERE UserID = ?";
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
                <th>User ID</th>
                <th>Action</th>
            </tr>
        ";
    
    while($row = mysqli_fetch_assoc($result)){

        echo "<tr>";
        echo "<td>". $row['AlbumID'] . "</td>";
        echo "<td>". $row['NamaAlbum'] . "</td>";
        echo "<td>". $row['Deskripsi'] . "</td>";
        echo "<td>". $row['TanggalDibuat'] . "</td>";
        echo "<td>". $row['UserID'] . "</td>";
        echo "<td><a href='../action/hapusAlbum.php?id=". $row['AlbumID'] ."' class='btn btn-danger'>Hapus</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    ?>
    
</div>

