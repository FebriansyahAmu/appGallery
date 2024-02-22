<?php
    include('dashboard.php');
    include('../action/config.php');

    $idAlbum = $_GET['id'];
    $query = "SELECT FotoID, LokasiFile From foto WHERE AlbumID = $idAlbum";
    $result = mysqli_query($connection, $query);
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

    .btn{
        border-radius: 2px;
    }
</style>

<div id="main-content">
    <div class="container page-top">


        <div class="row">

        <?php
            while ($row = mysqli_fetch_assoc($result)) {
    
            echo '
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="detailGambar.php?id= '. $row['FotoID'].' " class="" rel="">
                    <img src="' . $row['LokasiFile'] . '" class="zoom img-fluid" alt="">
                </a>
                <a href="../action/hapusFoto.php?id='. $row['FotoID'] .'" class="btn btn-danger mt-2">Hapus Foto</a>
            </div>
            ';
        }
        ?>

       </div>


    </div>

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