<?php
    $index = 0;

    if (isset($_GET['post_id'])) {
        $index=$_GET['post_id'];
    }
    
    require('db.php');

    $sql = "SELECT posts.id as id, posts.title as title, posts.created_at as created_at, posts.body as body
            FROM posts 
            WHERE id = '".$index."'" ;

    
        
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
    
                <?php         
                    foreach($results as $r) {        
                ?>        
                        <!--Shows a single post from the database - the fetched array contains only the post with the corresponding index from GET-->
                        <h2><?php echo $r['title']; ?></h2>        
                        <p class="blog-post-meta"><?php echo $r['created_at']; ?> </p>
                        <p><?php echo $r['body']; ?></p>
                            
                <?php    
                    }
                ?>                

                
            </div>
            
            

            <div>    
                 <button type="button" id="showHide" class="btn btn-default" value="hide" onclick="hideComments(this.value);">Hide comments</button>
            </div> <!--This button calls a JS DOM function to change the visibility of the comment-section class-->

        <?php include 'comments.php'?> 

        </div><!-- /.blog-main -->

        <?php
             include 'aside.php'
        ?> <!--My sidebar-->
    
    </div><!-- /.row -->

</main><!-- /.container -->

<?php 
    include 'footer.php'
?> <!--My footer-->


