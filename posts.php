<?php

    require('db.php');
    //SQL query to fetch all posts into an associative array from the blog database (descending by date)
    $sql = 'SELECT posts.title as title, posts.created_at as created_at, posts.body as body, posts.id as id 
            FROM posts 
            ORDER BY posts.created_at DESC';

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();

 

?> 



        <div class="blog-post">

            <?php foreach($results as $r) {
                ?>
                <!--Lists all posts on the main page from the database-->
                <a class="blog-post-title" href="single-post.php?post_id=<?php echo $r['id']; ?>"><h2><?php echo $r['title']; ?></h2></a>
                <p class="blog-post-meta"><?php echo $r['created_at']; ?> </p>
                <p><?php echo $r['body']; ?></p>
            
            <?php    
            }
            ?>

        <nav class="blog-pagination">

        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>

        </nav>       

        </div>

        


