<?php 
include "includes/class_user.php";
include "includes/config.php";
include "includes/function.php";

if(isset($_POST['logout-button'])){
	if($user->logout()){
		$user->redirect ("index.php");
	}
}
?>



<head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script defer src="js/javascript.js"></script>
</head>


<nav id="header" class=" navbar navbar-expand-lg">
  <a id="margin" class="text-white navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler linkcolor" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
	<li class="nav-item">
        <a class="nav-link text-white linkcolor" href="register.php">Register</a>
	</li>
    </ul>
  </div>
  
  <?php
		if($user->checkLoginStatus()){
  ?>
  <form method="POST" action="">
	<input type="submit" name="logout-button" value="logout" role="button" class="button-92 me-2">
	
		<?php 
		if($user->checkUserRole(5)){
			echo "<button class='button-57' role='button'><a href='admin.php'></a><span class='text' id='bcnotpink'>admin page</span><span id='bcpink'>admin page</span></button>";
		}
	
	} 
	?>
	</form>

	
</nav>




