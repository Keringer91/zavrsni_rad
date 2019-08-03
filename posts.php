<?php

    require('db.php');
    //This query passes the number of entries from the database: posts
    $sql = "SELECT COUNT(id) FROM posts";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->fetchAll();

    $max = ceil(((int)$count[0]['COUNT(id)'])/5); //page limit 
    
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    if ($page < 1) {
        $page = 1;
    }
    $offs = ($page - 1) * 5;

    //SQL query to fetch posts into an associative array from the blog database (descending by date)
    $sql = "SELECT posts.id as id, posts.title as title, posts.created_at as created_at, posts.body as body, users.first_name as fName, users.last_name as lName
            FROM posts
            INNER JOIN users ON posts.author=users.id  
            ORDER BY posts.created_at DESC
            LIMIT 5  OFFSET ".$offs;

    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();


?> 



    <div class="blog-post">

    <?php include 'display-posts.php' ?> 

    <nav class="blog-pagination">

        <!--pending feature-->
        <div style="display: inline-blocks; text-align: center">
            <a class="btn btn-link page-offset" href="/index.php?page=<?php echo $page - 1; ?>">Newer</a>
            <a class="btn btn-link page-offset" href="/index.php?page=<?php if ($page<$max) {echo $page + 1;} else {echo $max;} ?>">Older</a> 
        </div>
    </nav>       

    </div>

        


