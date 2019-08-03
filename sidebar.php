<?php

    require('db.php');
    //SQL query to fetch the latest 5 posts (descending by date)
    $sql = 'SELECT posts.title as title, posts.created_at as created_at, posts.body as body, posts.id as id 
            FROM posts 
            ORDER BY posts.created_at DESC LIMIT 5';

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();

 

?> 

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Latest posts</h4><br>
                    <div class="latest">
                        <?php foreach($results as $r) {
                        ?>
                            <!--Lists all posts on the main page from the database-->
                            <a class="blog-post-title" href="single-post.php?post_id=<?php echo $r['id']; ?>"><h5><?php echo $r['title']; ?><br><br></h5></a>

                        <?php    
                        }
                        ?>
                    </div>     
            </div>
        <br>   
        </aside><!-- /.blog-sidebar -->