<?php
include "header.php";


    $selectedBooksPop = selectSortedBooksPop($conn , 3);
    $selectedBooksDesc = selectSortedBooksDesc($conn , 3);
    $selectedBooksFeatured = selectSortedBooksFeatured($conn);

   



echo "<div class='row'>";   
foreach ($selectedBooksPop as $row) {
    echo "
    <div class='card m-5' style='width: 18rem;'>
    <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
    <div class='card-body'>
      <h5 class='card-title'>{$row['book_name']}</h5>
      <p class='card-text'>{$row['book_author']}</p>
    </div>
  </div>" ;
}
echo "</div>";

echo "<br>";
echo "<div class='row'>";
foreach ($selectedBooksDesc as $row) {
    echo "
    <div class='card m-5' style='width: 18rem;'>
    <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
    <div class='card-body'>
      <h5 class='card-title'>{$row['book_name']}</h5>
      <p class='card-text'>{$row['book_author']}</p>
    </div>
  </div>" ;
}

echo "</div>";

echo "<br>";
echo "<div class='row'>";
foreach ($selectedBooksFeatured as $row) {
    echo "
    <div class='card m-5' style='width: 18rem;'>
    <img class='card-img-top' src='uploads/{$row['book_cover']}' alt='Card image cap'>
    <div class='card-body'>
      <h5 class='card-title'>{$row['book_name']}</h5>
      <p class='card-text'>{$row['book_author']}</p>
    </div>
  </div>" ;
}

echo "</div>";



include "footer.php";
?>