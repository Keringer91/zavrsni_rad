<?php

    require('db.php');
    //SQL query to fetch all posts into an associative array from the blog database (descending by date)
    $sql = "SELECT posts.id as id, posts.title as title, posts.created_at as created_at, posts.body as body, users.first_name as fName, users.last_name as lName
            FROM posts
            INNER JOIN users ON posts.author=users.id  
            ORDER BY posts.created_at DESC";

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();

 

?> 



        <div class="blog-post">

        <?php include 'display-posts.php' ?> 

        <nav class="blog-pagination">

        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>

        </nav>       

        </div>

        


