<?php

    require('PHP/db.php');

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

                    <a class="blog-post-title" href="#"><h2><?php echo $r['title']; ?></h2></a>
                    <p class="blog-post-meta"><?php echo $r['created_at']; ?> </p>
                    <p><?php echo $r['body']; ?></p>
                   
                <?php    
                }
                ?>

<nav class="blog-pagination">

    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                
</nav>           