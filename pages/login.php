

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"/>
	<meta name="viemport" content="width=device-width, initial-scelaes1.0">
	<!-- <link rel="stlesheet" href="style.css"/> -->
	<title>Login Form</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>
  <style>
	.container{
		height : 100vh;
	}
	.wrapper{
		height: 100vh;

	}
	.nav .nav-link{
		color: white;
	}
  </style>
  <body>
    <div class="container " >
	
	  <div class="wrapper d-flex justify-content-center align-items-center" >
	    
	  	<div class="forms-style shadow-lg p-3 mb-5 bg-body-tertiary rounded">
			<div class="title mb-3" align="center"><span>Login Aplikasi Toko Online </span></div>	
		<div class="row-md-12 mx-auto d-flex justify-content-center align-items-center" >
		
		<form  method="POST" action="../action/actionlogin.php" >
			
			<div class="col mb-3">
				<i class="fas fa-user"></i>
				<input class="form-control" type="text" placeholder="email" name="email"/>
			</div>
			
			<div class="col mb-3">
				<i class="fas fa-lock"></i>
				<input class="form-control" type="password" placeholder="password" name="password"/>
			</div>
			
			Belum punya akun? <a href="#">Daftar sekarang</a>
			
			<div class="col d-flex justify-content-center mt-3">
				<input class="btn btn-primary" type="submit" value="Login" />
			</div>
			

		
				</div>
		</form>
		</div>
		</div>


		  </div>
		 </div>
		 
	</body>
</html>
