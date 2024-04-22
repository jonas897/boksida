<?php
include "header.php"; 
	
if(isset($_GET['bookid'])){
    $currentCar = $_GET['bookid'];
    $bookData  = selectsinglebook($conn, $currentCar);
    
    // Check if the book data is not empty
    if($bookData) {
        echo "<div class='container cool'>
                <div class='row justify-content-center'>
                    <div class='card m-5' style='width: 18rem; '>
                        <img class='card-img-top' src='uploads/{$bookData['book_cover']}' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>Book Name: {$bookData['book_name']}</h5>
                            <p class='card-text'>Book Author: {$bookData['book_author']}</p>
                            <p class='card-text'>Book description: {$bookData['book_description']}</p>
                            <p class='card-text'>genre: {$bookData['genre_name']}</p>
                            <p class='card-text'>language: {$bookData['language_name']}</p>
                            <p class='card-text'>age of book: {$bookData['book_age_rec']}</p>
                            <p class='card-text'>Book pages: {$bookData['book_pages']}</p>
                            <p class='card-text'>Book Price: {$bookData['book_price']}</p>

                        </div>
                    </div>
                </div>
            </div>";
    } else {
        $errorMessage = "No book found with the specified ID.";
    }
} else {
    $errorMessage = "No book ID provided.";
}
include "footer.php";
?>





