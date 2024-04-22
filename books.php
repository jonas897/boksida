<?php include "header.php"; 

$selectedbooks = selectbooks($conn);




$selectedBooksFeatured = selectSortedBooksFeatured($conn);

if (isset($_GET["q"])) {
    // Get the value of "q" parameter
    $query = $_GET["q"];
    
    // Call the searchBooks function to search for books
    $foundBooks = searchBooks($conn, $query);
    
}

echo "<div class='hero-section' style='background-image: url(\"img/books.jpg\"); background-size: cover; background-position: center; color: #ffffff; padding: 100px 0; text-align: center;'>
<div class='container'>
    <h1>Welcome to Our Website</h1>
    <p>Find what you're looking for with ease</p>
    <!-- Display the search form -->
    <form id='searchForm' method='GET' action='index.php'>
        <input type='text' name='q' placeholder='Search for books...'>
        <button type='submit'>Search</button>
    </form>
</div>
</div>";


if (!empty($selectedbooks)) {
    echo "<div class='container cool '>
    <div class='row justify-content-center'>";
foreach ($selectedbooks as $row) {
echo "
<div class='card m-5 ' style='width: 18rem;'>
    <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
    <div class='card-body .bg-primary '>
    <h5 class='card-title'>book name:{$row['book_name']}</h5>
    <p class='card-text'>book author: {$row['book_author']}</p>
    <p class='card-text'> book price: {$row['book_price']}</p>
    <a href='singlebook.php?bookid={$row['book_id']}'class='button1' >more </a>
    </div>
</div>";
}
echo "</div>";
} ;


  

 include "footer.php"; ?>