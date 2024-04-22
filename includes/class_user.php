<?php
class user {
	
	public $errorMessage;
	public function __construct ($conn) {
		$this->conn = $conn;
	}
	

	
	private function cleanInput($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
		public function checkUserRegisterInput () {
		$error = 0;
		$cleanname = $this->cleanInput($_POST['username']);
		$cleanemail = $this->cleanInput($_POST['email']);
		
		
		if(isset ($_POST['submit-register'])){
		//Bygg query som hämtar ut en rad ur databasen ifall användaramnet finns
		$stmt_checkIfUserExists = $this->conn->prepare("SELECT * FROM table_user WHERE u_name = :u_name OR u_email = :u_email;");
		$stmt_checkIfUserExists->bindValue(":u_name", $cleanname, PDO::PARAM_STR);
		$stmt_checkIfUserExists->bindValue(":u_email", $cleanemail, PDO::PARAM_STR);
		$stmt_checkIfUserExists->execute();
		//skapa array av infon som hämtas
		$userNameMatch = $stmt_checkIfUserExists->fetch();
		//kolla om arrayen inehåller värden. Om SELECT-queryn har hämtat ut något
		
		if(!empty($userNameMatch)){
			if($userNameMatch['u_name'] == $cleanname) {
				$this->errorMessage .= " | Username is already taken";
				$error=1;	
				echo $this->errorMessage;
			}
		}
		if(!empty($userNameMatch)){
			if($userNameMatch['u_email'] == $cleanemail) {
				$this->errorMessage .= "<p>E-mail is already taken</p>";
				$error=1;
			}
		}
		}
	
			if($_POST['password'] !== $_POST['passworda']){
				$this->errorMessage .= "<p>Password do not match</p>";
				$error=1;
			}
						
			if(strlen($_POST['password']) < 8){
				$this->errorMessage .= " <p>Password does not meet requirements</p>";
				$error=1;
			}
			
			
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$this->errorMessage .= "<p>Invalid email format</p>";
				$error=1;
			}
			
			if($error !=0) {
				return $this->errorMessage;
			}
			
			else {
				return "success";
			}
		}
		
		public function register(){
			$cleanname = $this->cleanInput($_POST['username']);
			$encryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$cleanfirstname = $this->cleanInput($_POST['firstname']);
			$cleanlastname = $this->cleanInput($_POST['lastname']);
			$cleanemail = $this->cleanInput($_POST['email']);
			
			
			$stmt_registerUser = $this->conn->prepare("INSERT INTO table_user (u_name, u_password, u_firstname, u_lastname, u_email, u_role_fk, u_status_fk) VALUES (:uname, :upass, :ufistname, :ulastname, :uemail, 1, 1)");
			$stmt_registerUser->bindValue(":uname", $cleanname, PDO::PARAM_STR);
			$stmt_registerUser->bindValue(":upass", $encryptedPassword, PDO::PARAM_STR);
			$stmt_registerUser->bindValue(":ufistname", $cleanfirstname, PDO::PARAM_STR);
			$stmt_registerUser->bindValue(":ulastname", $cleanlastname, PDO::PARAM_STR);
			$stmt_registerUser->bindValue(":uemail", $cleanemail, PDO::PARAM_STR);
			
			$check = $stmt_registerUser->execute();
			
			if($check) {
				return "user created successfully!";
			}
			else {
				return"someting went wrong!, try again bot";
			}
		}
		public function login () {
			$usernameEmail = $this->cleanInput($_POST['emailorusername']);
			$stmt_checkIfUserExists = $this->conn->prepare("SELECT * FROM table_user WHERE u_name = :uname OR u_email = :uemail;");
			$stmt_checkIfUserExists->bindValue(":uname", $usernameEmail, PDO::PARAM_STR);
			$stmt_checkIfUserExists->bindValue(":uemail", $usernameEmail, PDO::PARAM_STR);
			$stmt_checkIfUserExists->execute();
			//skapat array av infon som hämtats
			$userNameMatch = $stmt_checkIfUserExists->fetch();
			
			if(!$userNameMatch){
				$this->errorMessage = "No such user or email in database";
				return $this->errorMessage;
		}
		
		
			$chechPasswordMatch = password_verify($_POST['password'], $userNameMatch['u_password']);
			
		    if($chechPasswordMatch == true) {	
				$_SESSION['uname'] = $userNameMatch['u_name'];
				$_SESSION['urole'] = $userNameMatch['u_role_fk'];
				$_SESSION['uid'] = $userNameMatch['u_id'];
				return "Success!";
			}
			else {
				$this->errorMessage = "INVALID password";
				return $this->errorMessage;
			}
		
		}
		
		public function checkLoginStatus() {
			if(isset($_SESSION['uid'])){
				return true;
			}
			else {
				return false;
			}
		}
		
		public function logout() {
			session_unset();
			session_destroy();
			return true;
		}
		
		public function checkUserRole($req) {
				$stmt_checkRoleLevel = $this->conn->prepare("SELECT * FROM table_role WHERE role_id = :urole");
				$stmt_checkRoleLevel->bindValue(":urole",$_SESSION['urole'], PDO::PARAM_STR);
				$stmt_checkRoleLevel->execute();
				$currentUserRoleInfo = $stmt_checkRoleLevel->fetch();
				
				if ($currentUserRoleInfo['role_level'] >= $req){
					return true;
				}
				else {
					return false;
				}
				
		}
		
		public function redirect($url) {
			header("Location: ".$url);
			exit();
		}
		
		public function editUserInfo() {
			//$cleanname = $this->cleanInput($_POST['username']);
			$cleanfirstname = $this->cleanInput($_POST['firstname']);
			$cleanlastname = $this->cleanInput($_POST['lastname']);
			$cleanemail = $this->cleanInput($_POST['email']);
			
			if(isset($_POST['password']) && $_POST['passworda'] != ""){
			$encryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$editUserInfo = $this->conn->prepare("UPDATE table_user SET u_email = :uemail, u_firstname = :ufname, u_lastname = :ulname, u_password = :upass WHERE u_id = :uid");
			$editUserInfo->bindValue(":ufname", $cleanfirstname, PDO::PARAM_STR);
			$editUserInfo->bindValue(":ulname", $cleanlastname, PDO::PARAM_STR);
			$editUserInfo->bindValue(":uemail", $cleanemail, PDO::PARAM_STR);
			$editUserInfo->bindValue(":upass", $encryptedPassword, PDO::PARAM_STR);
			$editUserInfo->bindValue(":uid", $_SESSION['uid'], PDO::PARAM_INT);	
	}
	
		else {
		$editUserInfo = $this->conn->prepare("UPDATE table_user SET u_email = :uemail, u_firstname = :ufname, u_lastname = :ulname WHERE u_id = :uid");
			$editUserInfo->bindValue(":ufname", $cleanfirstname, PDO::PARAM_STR);
			$editUserInfo->bindValue(":ulname", $cleanlastname, PDO::PARAM_STR);
			$editUserInfo->bindValue(":uemail", $cleanemail, PDO::PARAM_STR);
			$editUserInfo->bindValue(":uid", $_SESSION['uid'], PDO::PARAM_INT);
		}
			
			if($editUserInfo->execute()){
				return true;
			}
}


	public function getUserInfo(){
		$userInfoQuery = $this->conn->prepare("SELECT * FROM table_user WHERE u_id = :uid");
		$userInfoQuery->bindParam(":uid", $_SESSION['uid'], PDO::PARAM_INT);
		$userInfoQuery->execute();
		$userInfo = $userInfoQuery->fetch();
		return $userInfo;
	}
		
	public function searchUsers(){
		$cleanSearchParam = $this->cleanInput($_POST['search_username']);
		$cleanSearchParam = "%".$cleanSearchParam."%";
		$searchUsersQuery = $this->conn->prepare("SELECT * FROM table_user WHERE u_name LIKE :searchParam");
		$searchUsersQuery->bindParam(":searchParam", $cleanSearchParam, PDO::PARAM_STR);
		$searchUsersQuery->execute();
		return $searchUsersQuery;
				
	}
	public function checkUserStatus($uid){
		$uppdateStatusQuery = $this->conn->prepare("UPDATE table_user SET u_status_fk = :status WHERE u_id = :uid");
		$uppdateStatusQuery->bindParam(":status", $_POST['update_status'], PDO::PARAM_INT);
		$uppdateStatusQuery->bindParam(":uid", $uid, PDO::PARAM_INT);
		if($uppdateStatusQuery->execute()){
			return"success";
		}
		else{
			$this->errorMessage = "Something went wrong, try again later";
			return $this->errorMessage;
		}
	}
	
	public function updateUserRole($uid){
		$uppdateStatusQuery = $this->conn->prepare("UPDATE table_user SET u_role_fk = :role WHERE u_id = :uid");
		$uppdateStatusQuery->bindParam(":role", $_POST['update_role'], PDO::PARAM_INT);
		$uppdateStatusQuery->bindParam(":uid", $uid, PDO::PARAM_INT);
		if($uppdateStatusQuery->execute()){
			return"success";
		}
		else{
			$this->errorMessage = "Something went wrong, try again later";
			return $this->errorMessage;
		}
	}
	
	
	public function deleteUser($uid) {
	$deleteUserQuery = $this->conn->prepare('DELETE FROM table_user WHERE u_id = :uid');
	$deleteUserQuery->bindparam("uid", $uid);
	if($deleteUserQuery->execute()){
		return"success";
		}
		else{
			$this->errorMessage = "Something went wrong, try again later";
			return $this->errorMessage;
		}
	}


	}
?>

