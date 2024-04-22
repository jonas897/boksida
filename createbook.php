<?php include "header.php"; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if (!$user->checkLoginStatus()) {
                $user->redirect("index.php");
            }

            if ($user->checkUserRole(5)) {
                echo "<h2 class='text-center mb-4'>Create Book</h2>";
            }

            if (isset($_POST['form-submit'])) {
                createbook($conn, $_POST['bookname'], $_POST['bookauthor'], $_POST['bookdescription'], $_POST['bookillustrator'], $_POST['bookage'], $_POST['bookgenre'],
                    $_POST['booklanguage'], $_POST['bookpages'], $_POST['bookprice'], $_POST['bookcreated'],
                    $_FILES['bookcover']['name']);
            }
            ?>

            <form method="post" enctype="multipart/form-data">

                <div class="person-info">

                    <label for="bookname">Book Name</label><br>
                    <input type="text" id="bookname" name="bookname" class="form-control mb-3" required>

                    <label for="bookauthor">Book Author</label><br>
                    <input type="text" id="bookauthor" name="bookauthor" class="form-control mb-3" required>

                    <label for="bookdescription">Book Description</label><br>
                    <input type="text" id="bookdescription" name="bookdescription" class="form-control mb-3" required>

                    <label for="bookillustrator">Book Illustrator</label><br>
                    <input type="text" id="bookillustrator" name="bookillustrator" class="form-control mb-3">

                    <label for="bookage">Book Age</label><br>
                    <input type="date" id="bookage" name="bookage" class="form-control mb-3" required>

                    <label for="bookgenre">Book Genre</label><br>
                    <select name="bookgenre" id="bookgenre" class="form-control mb-3">
                        <?php
                        $allgenretype = fetchgenre($conn);
                        foreach ($allgenretype as $row) {
                            echo "<option value='{$row['genre_id']}'>{$row['genre_name']}</option>";
                        }
                        ?>
                    </select>

                    <label for="booklanguage">Book Language</label><br>
                    <select name="booklanguage" id="booklanguage" class="form-control mb-3">
                        <?php
                        $alllanguage = fetchlanguage($conn);
                        foreach ($alllanguage as $row) {
                            echo "<option value='{$row['language_id']}'>{$row['language_name']}</option>";
                        }
                        ?>
                    </select>

                    <label for="bookpages">Book Pages</label><br>
                    <input type="text" id="bookpages" name="bookpages" class="form-control mb-3" required>

                    <label for="bookprice">Book Price</label><br>
                    <input type="text" id="bookprice" name="bookprice" class="form-control mb-3" required>

                    <label for="bookcreated">Book Created</label><br>
                    <input type="date" id="bookcreated" name="bookcreated" class="form-control mb-3" required>

                    <label for="bookcover">Book Cover</label><br>
                    <input type="file" id="bookcover" name="bookcover" class="form-control mb-3" required>

                    <input type="submit" name="form-submit" value="Submit" class="btn btn-primary">
                </div>

            </form>

        </div>
    </div>
</div>

<?php include "footer.php"; ?>