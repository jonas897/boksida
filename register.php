<?php 
include "header.php"; 



//check if form has been sent
if(isset($_POST['submit_register'])) {
	$checkReturn = $user->checkUserRegisterInput();
	
	if($checkReturn == "success") {
		$registerResult = $user->register();
			echo "<p class='bg-info text-white text-center'>$registerResult <a href='index.php'>Login</a></p>";
	}
	//If something does not meet requirements, echo out what went wrong.
	else {
	echo "<p class='bg-info text-white text-center'>{$checkReturn}</p>";
	}
}
?>
<body>
<div id="container" class="container">
<form method="POST" id="floatmid" class="row justify-content-center">
<h1>Register</h1>
<div class="col-6">

	<div class="form-outline mb-4">
    <input type="text" id="form2Example0" class="rainbow form-control" name="firstname"/>
    <label class="form-label" for="form2Example0"  >Firstname</label>
  </div>
  
  	<div class="form-outline mb-4">
    <input type="lastname" id="form2Example90" class="rainbow form-control" name="lastname"/>
    <label class="form-label" for="form2Example90">Lastname</label>
  </div>

  <div class="form-outline mb-4">
    <input type="username" id="form2Example1" class="rainbow form-control" name="username"/>
    <label class="form-label" for="form2Example1">Username</label>
  </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
    <input type="email" id="form2Example2" class="rainbow form-control" name="email"/>
    <label class="form-label" for="form2Example2">E-mail</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example3" class="rainbow form-control" name="password"/>
    <label class="form-label" for="form2Example3">Password</label>
  </div>
  
  <div class="form-outline mb-4">
    <input type="password" id="form2Example4" class="rainbow form-control" name="passworda"/>
    <label class="form-label" for="form2Example4">Password (Again)</label>
  </div>
  <!-- Submit button -->
  <button type="submit" name="submit_register" class="rainbow btn btn-primary btn-block mb-4 button-85" role="button">Register</button>
    <div class="text-center">
    <p>Aleady a member? <a href="index.php">Login</a></p>
  </div>
  </div>

</form>
</div>



  </body>
<?php include "footer.php"; ?>