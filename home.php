<?php
include "header.php";

	if(!$user->checkLoginStatus()){
		$user->redirect("index.php");
	}
	
		$selectedbooks = selectbooks($conn);

		$selectedBooksFeatured = selectSortedBooksFeatured($conn);

		if (isset($_GET["q"])) {
			// Get the value of "q" parameter
			$query = $_GET["q"];
			
			// Call the searchBooks function to search for books
			$foundBooks = searchBooks($conn, $query);
			
		}


		echo "<p>Find what you're looking for with ease</p>
        <!-- Display the search form -->
        <form id='searchForm' method='GET' action='home.php'>
            <input type='text' name='q' placeholder='Search for books...'>
            <button type='submit'>Search</button>
        </form>";

		echo "<div class='row'>";
		if (!empty($foundBooks)) {
			echo "<div class='container cool '>
			<div class='row justify-content-center'>";
		foreach ($foundBooks as $row) {
		echo "
		<div class='card m-5' style='width: 18rem;'>
    <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
    <div class='card-body'>
      <h5 class='card-title'>{$row['book_name']}</h5>
      <p class='card-text'>{$row['book_author']}</p>
    </div>
    <a href='editbook.php?bookid={$row['book_id']}' class='button1'>edit book </a>
    <a href='deletbook.php?bookid={$row['book_id']}'class='button1 red' >Delete </a>
  </div>";
		}
	}
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

