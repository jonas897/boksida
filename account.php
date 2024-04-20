<?php include "header.php"; 



	if(!$user->checkLoginStatus()){
		$user->redirect("index.php");
		}

	if($user->checkUserRole(5) && isset($_GET['userToEdit'])){
		$userToEdit = $_GET['userToEdit'];
	}
	
	else {
	$userToEdit = $_SESSION['uid'];
	}

	if(isset($_POST['submit_edit'])){
		
		$checkReturn =$user->checkUserRegisterInput();

			//If all checks are passed, run register-fucntion
			if($checkReturn == "success"){
				if($user->editUserInfo()){
					$feedback = "user info uppdated successfully!";
				}
			}
		//if someting does not meet requirements, echo out what went wrong	
		else {
			$feedback =$checkReturn;
		}
}

if(isset($_POST['submit_role_status'])){
	if($_POST['update_status'] != 0){
	$statusUpdateReturn = $user->checkUserStatus($userToEdit);
		if($statusUpdateReturn == "success"){
		$feedback = "User STATUS updated successfully!";
		}
		else {
			$feedback = $statusUpdateReturn;
		}
	}
	
	else {
		$feedback ="no changes has been made to user status";
	}


	if($_POST['update_role'] != 0){
	$statusUpdate = $user->updateUserRole($userToEdit);
		if($statusUpdate == "success"){
		$feedback .= " User ROLE updated successfully!";
		}
		else {
			$feedback = $statusUpdate;
		}
	}
	else {
		$feedback .=" no changes has been made to user role";
	}
}

$userInfo = $user->getUserInfo();
$roleInfo = $conn->query("SELECT * FROM table_role");
$statusInfo = $conn->query("SELECT * FROM table_status");

	
?>
<div id="content">
	<div class="feedback-section">
		<?php
			if(isset($feedback)){
				echo $feedback;
			}
		?>
	</div>
</div>


<body>
<div class="content-inner">

<div id="container" class="container">
<form method="POST" id="floatmid" class="row justify-content-center">
<h1>Account info</h1>
<div class="col-6">

	<div class="form-outline mb-4">
		<input type="text" id="firstname" class="form-control" value="<?php echo $userInfo['u_firstname']; ?>" name="firstname"/>
		<label class="form-label" for="firstname">Firstname</label>
	</div>
  	<div class="form-outline mb-4">
		<input type="lastname" id="lastname" class="form-control"value="<?php echo $userInfo['u_lastname']; ?>" name="lastname"/>
		<label class="form-label" for="lastname">Lastname</label>
    </div>

	<div class="form-outline mb-4">
		<input type="username" id="username" class="form-control" value="<?php echo $userInfo['u_name']; ?>" name="username" disabled/>
		<label class="form-label" for="username">Username</label>
	</div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
		<input type="email" id="email" class="form-control" value="<?php echo $userInfo['u_email']; ?>" name="email"/>
		<label class="form-label" for="email">E-mail</label>
	</div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="password" class="form-control" value="<?php echo $userInfo['u_password']; ?>" name="password"/>
    <label class="form-label" for="password">Password</label>
  </div>
  
  <div class="form-outline mb-4">
    <input type="password" id="passworda" class="form-control" name="passworda"/>
    <label class="form-label" for="passworda">Password (Again)</label>
  </div>
  </div>

</form>
</div>
<p id="demo"></p>
	
	
	<?php 
		if($user->checkUserRole(5)){
	?>
	
	<form method="POST" action="">
		<select name="update_status">
			<option value='0'>change user status</option>
			<?php 
			foreach ($statusInfo as $row){
			echo "<option value='{$row['status_id']}'>{$row['status_name']}</option>" ;
			}
			?>
		</select>
		<select name="update_role">
		<option value='0'>change user role</option>
			<?php foreach ($roleInfo as $row){
			echo "<option value='{$row['role_id']}'>{$row['role_name']}</option>" ;
			} ?>
		</select>
	  <input type="submit" name="submit_role_status" value="Update">
	</form>
	
	<form method="POST" action="confirm_delete.php?userToEdit=<?php echo $userToEdit; ?>">
	  <input type="submit" name="submit_user_delete" value="Delete">
	</form>
	
<?php } ?>


</div>
  </body>
<?php include "footer.php"; ?>