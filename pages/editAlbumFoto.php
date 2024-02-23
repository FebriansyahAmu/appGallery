<?php
    include("dashboard.php");
    include("../action/config.php");
    $idAlbum = $_GET['id'];
    $usrID = $_SESSION['UserID'];

    $query = "SELECT * FROM album WHERE AlbumID = $idAlbum AND UserID = $usrID";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
?>
<div id="main-content">
        <div class="card mt-5">
            <div class="card-header">
                Albums
            </div>
            <div class="card-body">
                <div class="card-body">
            <h5 class="card-title">Edit Album Foto</h5>
            <div class="row mx-auto">
                <form method="POST" action="../action/actionEditAlbumFoto.php"> 
                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="AlbumID" class="form-label">Nama Album</label>
                        <input class="form-control" type="text" name="AlbumID" value="<?php echo $idAlbum ?>" readonly required />
                    </div>

                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="NamaAlbum" class="form-label">Nama Album</label>
                        <input class="form-control" type="text" name="NamaAlbum" value="<?php echo $row['NamaAlbum'] ?>" required />
                    </div>
                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <input class="form-control" type="text" name="Deskripsi" value="<?php echo $row['Deskripsi'] ?>" required/>
                    </div>

                    <div class="col-md-4 mb-3 mx-auto">
                        <label for="UserID" class="form-label">User ID</label>
                        <input class="form-control" type="text" name="UserID" value="<?php echo $usrID ?>" readonly/>
                    </div>

                    <div class="col d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary">Edit Data Album</button>
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
</div>

