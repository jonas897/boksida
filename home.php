<?php
include "header.php";

	if(!$user->checkLoginStatus()){
		$user->redirect("index.php");
	}

		echo"<h2>Hello {$_SESSION['uname']}</h2>";
		echo "<p>Your role number is {$_SESSION['urole']}</p>";
		echo "<p>Your id number is {$_SESSION['uid']}</p>";

		if($user->checkUserRole(5)){
			echo "<a href='createbook.php' class='button1'>edit car </a>";
		}
		echo "<br>";
	
		$selectedbooks = selectbooks($conn);

		echo "<div class='row'>";
foreach ($selectedbooks as $row) {
    echo "
    <div class='card m-5' style='width: 18rem;'>
    <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
    <div class='card-body'>
      <h5 class='card-title'>{$row['book_name']}</h5>
      <p class='card-text'>{$row['book_author']}</p>
	  <p class='card-text'>{$row['book_status_name']}</p>
    </div>
    <a href='editbook.php?bookid={$row['book_id']}' class='button1'>edit book </a>
    <a href='deletbook.php?bookid={$row['book_id']}'class='button1 red' >Delete </a>
  </div>" ;
}
echo "</div>";








include "footer.php";
?>

