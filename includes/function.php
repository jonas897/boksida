<?php


function fetchgenre($conn){
    $fetchgenre= $conn->prepare('SELECT * FROM table_genre') ;
    $fetchgenre->execute();
    return $fetchgenre;
    
    
}
    
function fetchlanguage($conn){
    $fetchlanguage= $conn->prepare('SELECT * FROM table_language') ;
    $fetchlanguage->execute();
    return $fetchlanguage;
    
    
}


function createbook($conn, $bookname, $bookauthor, $bookdescription, $bookillustrator, $bookage, $bookgenre , $booklanguage, $bookpages , $bookprice, $bookcreated, $image){

    $stmt_insertbook = $conn->prepare("INSERT INTO table_book (book_name, book_author , book_description , book_illustrator , book_age_rec , genre_id_fk , language_id_fk , book_pages , book_price , book_created , book_cover) 
    VALUES (:bookname, :bookauthor, :bookdescription, :bookillustrator, :bookage, :bookgenre, :booklanguage ,:bookpages, :bookprice, :bookcreated, :image)");
    $stmt_insertbook->bindparam(':bookname',$bookname, PDO::PARAM_STR);
    $stmt_insertbook->bindparam(':bookauthor',$bookauthor, PDO::PARAM_STR);
    $stmt_insertbook->bindparam(':bookdescription',$bookdescription, PDO::PARAM_STR);
    $stmt_insertbook->bindparam(':bookillustrator',$bookillustrator, PDO::PARAM_STR);   
    $stmt_insertbook->bindparam(':bookage',$bookage, PDO::PARAM_STR);
    $stmt_insertbook->bindparam(':bookgenre',$bookgenre, PDO::PARAM_INT);
    $stmt_insertbook->bindparam(':booklanguage',$booklanguage, PDO::PARAM_INT);
    $stmt_insertbook->bindparam(':bookpages',$bookpages, PDO::PARAM_STR);
    $stmt_insertbook->bindparam(':bookprice',$bookprice, PDO::PARAM_STR);
    $stmt_insertbook->bindparam(':bookcreated',$bookcreated, PDO::PARAM_STR);
    $stmt_insertbook->bindparam(':image',$image, PDO::PARAM_STR);

    $stmt_insertbook->execute();
    

    }


    function updatebook($conn, $bookname, $bookauthor, $bookdescription, $bookillustrator, $bookage, $bookgenre, $booklanguage, $bookpages, $bookprice, $bookcreated, $image, $book_id){
        $stmt_insertbook = $conn->prepare("UPDATE table_book SET 
                                            book_name = :bookname,
                                            book_author = :bookauthor,
                                            book_description = :bookdescription,
                                            book_illustrator = :bookillustrator,
                                            book_age_rec = :bookage,
                                            genre_id_fk = :bookgenre,
                                            language_id_fk = :booklanguage,
                                            book_pages = :bookpages,
                                            book_price = :bookprice,
                                            book_created = :bookcreated,
                                            book_cover = :image
                                            WHERE book_id = :book_id");
        
        $stmt_insertbook->bindparam(':bookname', $bookname, PDO::PARAM_STR);
        $stmt_insertbook->bindparam(':bookauthor', $bookauthor, PDO::PARAM_STR);
        $stmt_insertbook->bindparam(':bookdescription', $bookdescription, PDO::PARAM_STR);
        $stmt_insertbook->bindparam(':bookillustrator', $bookillustrator, PDO::PARAM_STR);   
        $stmt_insertbook->bindparam(':bookage', $bookage, PDO::PARAM_STR);
        $stmt_insertbook->bindparam(':bookgenre', $bookgenre, PDO::PARAM_INT);
        $stmt_insertbook->bindparam(':booklanguage', $booklanguage, PDO::PARAM_INT);
        $stmt_insertbook->bindparam(':bookpages', $bookpages, PDO::PARAM_STR);
        $stmt_insertbook->bindparam(':bookprice', $bookprice, PDO::PARAM_STR);
        $stmt_insertbook->bindparam(':bookcreated', $bookcreated, PDO::PARAM_STR);
        $stmt_insertbook->bindparam(':image', $image, PDO::PARAM_STR);
        $stmt_insertbook->bindparam(':book_id', $book_id, PDO::PARAM_INT);
    
        $stmt_insertbook->execute();
    }

    function selectbooks($conn){
        $selectedbooks = $conn->prepare('SELECT *
            FROM table_book
            INNER JOIN table_genre
            ON table_book.genre_id_fk = table_genre.genre_id
            INNER JOIN table_language
            ON table_book.language_id_fk = table_language.language_id');
        $selectedbooks->execute();
        
        return $selectedbooks;
    }


    function selectsinglebook($conn , $id){
        $selectbook = $conn->prepare('SELECT *
        FROM table_book
        INNER JOIN table_genre
        ON table_book.genre_id_fk = table_genre.genre_id
        INNER JOIN table_language
        ON table_book.language_id_fk = table_language.language_id
        WHERE table_book.book_id = :id');

        $selectbook->bindparam(':id' , $id, PDO::PARAM_INT);
        $selectbook->execute();
        $bookData = $selectbook->fetch();

        return $bookData;
    }


    function selectSortedBooksPop($conn, $amount){
        $selectbooksLimited = $conn->prepare('SELECT *
        FROM table_book
        INNER JOIN table_genre
        ON table_book.genre_id_fk = table_genre.genre_id
        INNER JOIN table_language
        ON table_book.language_id_fk = table_language.language_id
        WHERE genre_id_fk = 2
        LIMIT :amount');

        $selectbooksLimited->bindparam(':amount' , $amount, PDO::PARAM_INT);
        $selectbooksLimited->execute();

        return $selectbooksLimited;
    };


    function selectSortedBooksDesc($conn, $amount){
        $selectbooksDesc = $conn->prepare('SELECT *
                                              FROM table_book
                                              INNER JOIN table_genre ON table_book.genre_id_fk = table_genre.genre_id
                                              INNER JOIN table_language ON table_book.language_id_fk = table_language.language_id
                                              ORDER BY book_created DESC
                                              LIMIT :amount');

        $selectbooksDesc->bindParam(':amount', $amount, PDO::PARAM_INT);
        $selectbooksDesc->execute();
        return $selectbooksDesc;
    }


    function selectSortedBooksFeatured($conn){
        $selectbooksFeatured = $conn->prepare('SELECT *
        FROM table_book
        INNER JOIN table_genre
        ON table_book.genre_id_fk = table_genre.genre_id
        INNER JOIN table_language
        ON table_book.language_id_fk = table_language.language_id
        WHERE book_featured = 1
        ');
         $selectbooksFeatured->execute();
        return $selectbooksFeatured;
    };

    
    function deleteBook($conn, $book_id){
        $deleteBookQuery = $conn->prepare('DELETE FROM table_book WHERE book_id = :book_id');
        $deleteBookQuery->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $deleteBookQuery->execute();
        return true;
    }

    function searchBooks($conn, $query) {
        // Initialize variable to store found books
        $foundBooks = array();
        
        // Prepare a SELECT query to fetch books from the database where either the name or author matches the search query
        $stmt = $conn->prepare("SELECT * FROM table_book WHERE book_name LIKE :search_query OR book_author LIKE :search_query");
        
        // Bind the search query parameter
        $search_query = "%$query%"; // Add wildcard '%' to search for partial matches
        $stmt->bindParam(':search_query', $search_query, PDO::PARAM_STR);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch matching books
        $foundBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $foundBooks;
    }




?>  