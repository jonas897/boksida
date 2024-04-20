<?php
include "header.php";

	if(!$user->checkLoginStatus()){
		$user->redirect("index.php");
	}

		echo"<h2>Hello {$_SESSION['uname']}</h2>";
		echo "<p>Your role number is {$_SESSION['urole']}</p>";
		echo "<p>Your id number is {$_SESSION['uid']}</p>";

		if($user->checkUserRole(5)){
			echo "hej";
		} 

		if (isset($_POST['form-submit'])){

			
			createbook($conn, $_POST['bookname'], $_POST['bookauthor'],$_POST['bookdescription'], $_POST['bookillustrator'], $_POST['bookage'], $_POST['bookgenre'],
			$_POST['booklanguage'],$_POST['bookpages'], $_POST['bookprice'], $_POST['bookcreated'],
			$_FILES['bookcover']['name']);
	
		}



        


?>

<form method="post" enctype="multipart/form-data" class="row" >






<div class="col">

<div class="person-info">

<h2> About </h2>

    <label for="bookname">book name</label><br>
    <input type="text" id="bookname" name="bookname" value="" class="formlabel"><br>

    <label for="bookauthor">book author</label><br>
    <input type="text" id="bookauthor" name="bookauthor" value="" class="formlabel"><br>

    <label for="bookdescription">book description</label><br>
    <input type="text" id="bookdescription" name="bookdescription" value="" class="formlabel"><br>

    <label for="bookillustrator">book illustrator</label><br>
    <input type="text" id="bookillustrator" name="bookillustrator" value="" class="formlabel"><br>

    <label for="bookage">book age</label><br>
    <input type="date" id="bookage" name="bookage" value="" class="formlabel"><br>

	<label for="bookgenre">book genre</label><br>
    <select name="bookgenre" id="bookgenre" class="bookgenre"> <br>
        
    <?php
        $allgenretype = fetchgenre($conn); 
        foreach($allgenretype as $row){
            echo "<option value='{$row['genre_id']}'>{$row['genre_name']}</option>" ;
        }
    ?>
    </select>
<br>

<label for="booklanguage">book language</label><br>
    <select name="booklanguage" id="booklanguage" class="booklanguage"> <br>
        
    <?php
        $alllanguage = fetchlanguage($conn); 
        foreach($alllanguage as $row){
            echo "<option value='{$row['language_id']}'>{$row['language_name']}</option>" ;
        }
    ?>
    </select>
<br>
	<label for="bookpages">book pages</label><br>
    <input type="text" id="bookpages" name="bookpages" value="" class="formlabel"><br>

	<label for="bookprice">book price</label><br>
    <input type="text" id="bookprice" name="bookprice" value="" class="formlabel"><br>

	<label for="bookcreated">book created</label><br>
    <input type="date" id="bookcreated" name="bookcreated" value="" class="formlabel"><br>

	<label for="bookcover">bookcover</label><br>
    <input type="file" id="bookcover" name="bookcover" value="" class="formlabel"><br>

	<input type="submit" name="form-submit" value="Submit" class="button">

</div>

</div>

</form>

