<?php
include "header.php";


    $selectedBooksPop = selectSortedBooksPop($conn , 3);
    $selectedBooksDesc = selectSortedBooksDesc($conn , 3);
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




    



// Display the search results if available
if (!empty($foundBooks)) {
    echo "<div class='container cool '>
    <div class='row justify-content-center'>";
foreach ($foundBooks as $row) {
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

  




// Center the rows
echo "<div class='container cool'>
        <div class='row justify-content-center'>";
foreach ($selectedBooksPop as $row) {
    echo "
    <div class='card m-5' style='width: 18rem; '>
        <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
        <div class='card-body'>
        <h5 class='card-title'>book name:{$row['book_name']}</h5>
        <p class='card-text'>book author: {$row['book_author']}</p>
        <p class='card-text'> book price: {$row['book_price']}</p>
        <a href='singlebook.php?bookid={$row['book_id']}'class='button1' >more </a>
        </div>
    </div>";
}
echo "</div>";

echo "<div class='row justify-content-center'>";
foreach ($selectedBooksDesc as $row) {
    echo "
    <div class='card m-5' style='width: 18rem;'>
        <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
        <div class='card-body'>
        <h5 class='card-title'>book name:{$row['book_name']}</h5>
        <p class='card-text'>book author: {$row['book_author']}</p>
        <p class='card-text'> book price: {$row['book_price']}</p>
        <a href='singlebook.php?bookid={$row['book_id']}'class='button1' >more </a>
        </div>
    </div>";
}
echo "</div>";

echo "<div class='row justify-content-center'>";
foreach ($selectedBooksFeatured as $row) {
    echo "
    <div class='card m-5' style='width: 18rem;'>
        <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>book name:{$row['book_name']}</h5>
            <p class='card-text'>book author: {$row['book_author']}</p>
            <p class='card-text'> book price: {$row['book_price']}</p>
            <a href='singlebook.php?bookid={$row['book_id']}'class='button1' >more </a>
        </div>
    </div>";
}
echo "</div>

    </div>"; // Close container
?>



<div class="container">
    <div class="row">
        <!-- First Section: Worker Information -->
        <div class="col-md-6">
            <h4>Worker Information</h4>
            <!-- Worker details -->
            <?php
            // Fetch worker information from database or define them
            $worker_name = "John Doe";
            $worker_position = "Developer";
            $worker_email = "john@example.com";
            ?>
            <p>Name: <?php echo $worker_name; ?></p>
            <p>Position: <?php echo $worker_position; ?></p>
            <p>Email: <?php echo $worker_email; ?></p>
        </div>
        <!-- Second Section: Site Information -->
        <div class="col-md-6">
            <h4>Site Information</h4>
            <!-- Site details -->
            <?php
            // Define site information
            $site_name = "My Website";
            $site_description = "This is a demo website.";
            $site_location = "Anywhere, Earth";
            ?>
            <p>Site Name: <?php echo $site_name; ?></p>
            <p>Description: <?php echo $site_description; ?></p>
            <p>Location: <?php echo $site_location; ?></p>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>