<?php include "header.php"?>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<script defer src="js/script.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php 
	if(isset($_POST['submit_login'])) {
	$loginReturn = $user->login();
	
		if($loginReturn == "Success!"){
			$user->redirect("home.php");
			
		//if (){
			//$user->checkUserRole();
		//}
		}

	}
?>
<div id="container" class="container">
<form id="floatmid" method="POST" class="row justify-content-center">
<h1>Login</h1>
<div class="col-6">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form2Example1" class="form-control" name="emailorusername"/>
    <label class="form-label" for="form2Example1">Username or Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" name="password"/>
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
    </div>
  </div>

  <!-- Submit button -->
  <input type="submit" class="btn btn-primary btn-block mb-4" name="submit_login" value="Login">
  </div>
</form>
</div>

  
  
  

	

<?php include "footer.php"; ?>