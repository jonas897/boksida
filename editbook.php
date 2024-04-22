<?php
include "header.php";

	if(!$user->checkLoginStatus()){
		$user->redirect("index.php");
	}

		echo"<h2>Hello {$_SESSION['uname']}</h2>";
		echo "<p>Your role number is {$_SESSION['urole']}</p>";
		echo "<p>Your id number is {$_SESSION['uid']}</p>";

    if(isset($_GET['bookid'])){
      $currentCar = $_GET['bookid'];
      
      $bookData  = selectsinglebook($conn,$currentCar) ;
      
      
      }
      else{
          $errorMessage = "No book has been chosen.";
      }


      if (isset($_POST['form-submit'])){

			
        updatebook($conn, $_POST['bookname'], $_POST['bookauthor'],$_POST['bookdescription'], $_POST['bookillustrator'], $_POST['bookage'], $_POST['bookgenre'],
        $_POST['booklanguage'],$_POST['bookpages'], $_POST['bookprice'], $_POST['bookcreated'],
        $_FILES['bookcover']['name'], $bookData['book_id']);
    
      }

?>

<div class="container">

<form method="post" enctype="multipart/form-data" class="row">

<div class="col">
    <div class="car-info">
    <h2> car info </h2>

    <label for="bookname">name</label><br>
    <input type="text" id="bookname" name="bookname" value="<?php echo $bookData['book_name'] ?>"class="formlabel"><br>

    <label for="bookauthor">author</label><br>
    <input type="text" id="bookauthor" name="bookauthor" value="<?php echo $bookData['book_author'] ?>"class="formlabel"><br>

    <label for="bookdescription">description</label><br>
    <input type="text" id="bookdescription" name="bookdescription" value="<?php echo $bookData['book_description'] ?>"class="formlabel"><br>

    <label for="bookillustrator">illustrator</label><br>
    <input type="text" id="bookillustrator" name="bookillustrator" value="<?php echo $bookData['book_illustrator'] ?>"class="formlabel"><br>

    <label for="bookage">age rec</label><br>
    <input type="date" id="bookage" name="bookage" value="<?php echo $bookData['book_age_rec'] ?>"class="formlabel"><br>

    <label for="bookgenre">genre</label><br>
    <select name="bookgenre" id="bookgenre" class="formlabel"> <br>

    <?php
        $allgenretype = fetchgenre($conn);
        foreach($allgenretype as $row){
            echo "<option value='{$row['genre_id']}'>{$row['genre_name']}</option>" ;
        }

    ?>
    </select>

    <label for="booklanguage">language</label><br>
    <select name="booklanguage" id="booklanguage" class="formlabel"> <br>

    <?php
        $alllanguagetype = fetchlanguage($conn);
        foreach($alllanguagetype as $row){
            echo "<option value='{$row['language_id']}'>{$row['language_name']}</option>" ;
        }

    ?>
    </select>

    <label for="bookpages">pages</label><br>
    <input type="text" id="bookpages" name="bookpages" value="<?php echo $bookData['book_pages'] ?>"class="formlabel"><br>

    <label for="bookprice">price</label><br>
    <input type="text" id="bookprice" name="bookprice" value="<?php echo $bookData['book_price'] ?>"class="formlabel"><br>

    <label for="bookcreated"></label><br>
    <input type="date" id="bookcreated" name="bookcreated" value="<?php echo $bookData['book_created'] ?>"class="formlabel"><br>

    <label for="bookcover">bookcover</label><br>
    <input type="file" id="bookcover" name="bookcover" value="" class="formlabel"><br>  <br> 

<br>
<br>
    <input type="submit" name="form-submit" value="Submit" class="button">
    </div>

        </div>
    </form>


        </div> <!--container-->


        





