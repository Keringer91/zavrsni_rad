<?php
    $index = null;
    if (isset($_GET['post_id'])) {
        $index=$_GET['post_id'];
    }
    
    require('db.php');
    
    //Accessing blog database and finding post with the given id - index

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
                <!--This button will link to delete- post and deletes your post after confirmation-->
                <div class="publish-button">
                    <button class="btn btn-primary" onclick="confirmDelete(<?php echo $index;?>)">Delete this post</button>
                    <button class="btn btn-primary del-all" onclick="confirmDeleteAll()">Delete all posts</button>
                </div>
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


