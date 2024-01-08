<?php
include "header.php";



	if(isset($_POST['submit_login'])) {
	$loginReturn = $user->login();
	
		if($loginReturn == "Success!"){
			$user->redirect("adminaccount.php");
			
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
		  <!-- Checkbox -->
		  <div class="form-check">
			<input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
			<label class="form-check-label" for="form2Example31"> Remember me </label>
		  </div>
		</div>
	
		<div class="col">
		  <!-- Simple link -->
		  <a href="#!">Forgot password?</a>
		</div>
	  </div>
	
	  <!-- Submit button -->
	  <input type="submit" class="btn btn-primary btn-block mb-4" name="submit_login" value="Login">
	  </div>
	</form>
	</div>
	 <!-- Register buttons -->
	  <div class="text-center">
		<p>Not a member? <a href="register.php">Register</a></p>
	  </div>




<?php
include "footer.php";
?>

