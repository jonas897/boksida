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
	    if(isset($_GET['bookid'])){
            $currentBook = $_GET['bookid'];
            
            $bookData  = selectsinglebook($conn,$currentBook) ;
            
            
            }
            else{
                $errorMessage = "No book has been chosen.";
            }


			if(isset($_POST['deletebook'])){
				if (deleteBook($conn, $currentBook)){
					header('Location:  index.php?carDeleted=1');
				}
			
			
			}
			
			if(isset($_POST['goback'])){
				
			}

			
?>


<h2> Are you sure you want to delete <?php echo  "{$bookData['book_name']} {$bookData['book_author']}  ?" ?></h2>

<form method="POST" action="">
    <input type="submit" name="deletebook" value="Delete">
    <input type="submit" name="goback" value="no,this was a mistake">
</form>


<?php
include "footer.php";
?>