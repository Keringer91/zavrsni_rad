<?php
    $index = null;
    if (isset($_GET['post_id'])) {
        $index=$_GET['post_id'];
    }
    
    require('db.php');
    
    $sql = "SELECT posts.id as id, posts.title as title, posts.created_at as created_at, posts.body as body, users.first_name as fName, users.last_name as lName
            FROM posts
            INNER JOIN users ON posts.author=users.id 
            WHERE posts.id = '".$index."'" ;
        
    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();

 

?>

<?php 
    include 'header.php'
?> <!--My header-->

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
    
                <?php include 'display-posts.php' ?> 
                <a class="btn btn-default" href="/delete-post.php?post_id=<?php echo $index;?>">Delete this post</a>
                <button class="btn btn-primary" onclick="confirmDelete(<?php echo $r['post.id'] ?>)">Delete this post</button>

            </div>
            
            <div class='add-comment'>
            <!--Add new comment form-->

                <?php include 'create-comment.php' ?>        

            </div>

        <?php include 'comments.php'?> 

        </div><!-- /.blog-main -->

        <?php
             include 'sidebar.php'
        ?> <!--My sidebar-->
    
    </div><!-- /.row -->

</main><!-- /.container -->

<?php 
    include 'footer.php'
?> <!--My footer-->


