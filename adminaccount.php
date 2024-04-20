<?php include "header.php"; ?>
<html>

<div id="container" class="container">
<form id="floatmid" class="row justify-content-center">
<h1>Account</h1>
<div class="col-6">
  
	<div class="form-outline mb-4">
    <input type="firstname1" id="firstname1" class="form-control" />
    <label class="form-label" for="firstname1">Firstname</label>
  </div>
  
  	<div class="form-outline mb-4">
    <input type="lastname1" id="lastname1" class="form-control" />
    <label class="form-label" for="lastname1">Lastname</label>
  </div>

  <div class="form-outline mb-4">
    <input type="username1" id="username1" class="form-control" />
    <label class="form-label" for="username1">Username</label>
  </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
    <input type="email1" id="email1" class="form-control" />
    <label class="form-label" for="email1">E-mail</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password1" id="password1" class="form-control" />
    <label class="form-label" for="password1">Password</label>
  </div>
  
  <div class="form-outline mb-4">
    <input type="passwordagain1" id="passwordagain1" class="form-control" />
    <label class="form-label" for="passwordagain1">Password (Again)</label>
  </div>
  <!-- Submit button -->
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle updatebuttns mb-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Active
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Online</a>
    <a class="dropdown-item" href="#">Offline</a>
  </div>
  <button type="button" class="updatebuttns1 btn btn-primary btn-block mb-4">Delete user</button>
  <button type="button" class="updatebuttns btn btn-primary btn-block mb-4">Return</button>
  <button type="button" class="updatebuttns1 btn btn-primary btn-block mb-4">Update info</button>
</div>

  </div>
</form>
</div>
<?php include "footer.php"; ?>