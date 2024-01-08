<?php
include "header.php";

	if(!$user->checkLoginStatus()){
		$user->redirect("index.php");
	}
	
	if(isset($_POST['submit_user_delete'])){
		$user->deleteUser();
	}

	if(isset($_GET['userToEdit'])){
		$userToEdit = $_GET['userToEdit'];
	}
	else{
		$errorMessage = "No user has been chosen";
	}

	if(isset($_POST['confirm_user_delete'])){
		$deleteUserReturn = $user->deleteUser($userToEdit);
		
		if($deleteUserReturn == "success"){
			$feedback = "the account has been successfully deleted";
		}
		else{
			$errorMessage = $deleteUserReturn;
		}
	}

?>
<div id="content">
<div class="error-section">
<?php

?>
</div>
</div>
	<?php
		if(isset($_POST['submit_user_delete']) && isset($userToEdit)){
	?>
	<h2>Are you sure you want to delete this account</h2>
	<form method="POST" action="">
		<input type="submit" name="confirm_user_delete" value="Delete this account">
	</form>


	<?php 
	
	}
	
	else{
		echo "Nothing to delete, back to <a href='home.php'>Home</a>";
	}
	?>




       <div class="wrapper">
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
    </div>
	<?php>
include "footer.php";
?>