<?php include "header.php"; 

if($user->checkLoginStatus()){
	if(!$user->checkUserRole(5)){
		$user->redirect("home.php");
	}
}

else{
	$user->redirect("index.php");
}

if(isset($_POST['searchuser_submit'])){
	$userList = $user->searchUsers();
}

?>

<div id="content">
<div class="error-section">
<?php


?>
</div>
<div class="content-inner">
		
	<form method="POST" action="">
		<label for="searchinput">Search for user to edit</label><br>
		  <input type="text" id="search_username" name="search_username" placeholder="Enter username here"><br>
		  <br>
		  <input type="submit" name="searchuser_submit" value="Search">
	</form>

	<div class="userlist">
		<?php 
		if(isset($userList)){
			foreach ($userList as $row){
				echo "<p>{$row['u_name']} <a href='account.php?userToEdit={$row['u_id']}'>Edit user</a></p>";
			}
		}
			?>
	</div>

</div>




</div>

<?php include "footer.php"; ?>