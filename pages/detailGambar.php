<?php

    include('dashboard.php');
    include('../action/config.php');

    
    $idFoto = $_GET['id'];
    $usrName = $_SESSION['Username'];
    $query = "SELECT LokasiFile From foto WHERE FotoID = $idFoto";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    //like foto
    $querySelect = "SELECT COUNT(LikeID) AS total_like FROM likefoto WHERE FotoID = $idFoto";
    $tampilLike = mysqli_query($connection, $querySelect);
    $like = mysqli_fetch_assoc($tampilLike);
    // Mengambil nilai total like dari hasil query
    $totalLike = $like['total_like'];

    //Komentar Foto
    $queryKomentar = "SELECT a.Username, b.IsiKomentar
                        FROM user AS a
                        LEFT JOIN komentarfoto AS b ON b.UserID = a.UserID
                        WHERE 
                        b.FotoID = $idFoto AND b.IsiKomentar IS NOT NULL
                        ORDER BY b.KomentarID DESC";
    $tampilKomen = mysqli_query($connection, $queryKomentar);
    
?>


<style>
body {
  /* background-color:#1d1d1d !important; */
  font-family: "Asap", sans-serif;
  color:#989898;

  font-size:16px;
}

#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}
.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }


img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }


.full-height img{
    height: 650px;
}
</style>

<div id="main-content">
    <div class="container page-top">

                <div class="row">
                    <?php
                        echo '
                        <div class="col-lg-12 col-md-12 col-xs-12 thumb full-height d-flex justify-content-center ">
                            <a href="" class="" rel="">
                                <img src="' . $row['LokasiFile'] . '" class=" img-fluid" alt="">
                            </a>
                            
   
                        </div>
                      
                        ';
                    ?>
                </div>

         <div class="row">
            <div class="col-lg-10 d-flex justify-content-end">
                <p><?php echo $totalLike; ?>&nbsp;&nbsp;&nbsp;</p>
                <a href="../action/sukaiFoto.php?idFoto=<?php echo $idFoto; ?>">Like Foto</a>
            </div>
        </div>

      
                <div class="row justify-content-lg-center mt-5">
                    <div class="col-12 col-lg-9">
                        <form method="POST" action="../action/actionKomentar.php">
                            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                <div class="col-12">
                                    <label for="comment" class="form-label">Comment <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" rows="3" name="isiKomentar" required></textarea>
                                </div>

                                <div class="col-4">
                                    
                                    <input class="form-control" type="hidden" name="idFoto" value="<?php echo $idFoto ?>" readonly/>
                                </div>

                                <div>
                                    <div class="d-grid">
                                    <button class="btn btn-primary btn-md" type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
      

                        
    <?php
        while ($komen = mysqli_fetch_assoc($tampilKomen)) {
            $uname = $komen['Username'];
            $komentar = $komen['IsiKomentar'];

            // Menampilkan komentar
            echo '<div class="row justify-content-lg-center bg-light rounded shadow-sm overflow-hidden">' .
                '<div class="col-12 col-lg-9">' .
                '<div class="overflow-hidden">' .
                '<div class="p-4">' .
                '<div class="mb-1">' .
                '<strong>' . $uname . ':</strong> ' . $komentar .
                '</div>' .
                '</div>' .
                '</div>' .
                '</div>' .
                '</div>';
        }
    ?>


</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});
});
    
</script>