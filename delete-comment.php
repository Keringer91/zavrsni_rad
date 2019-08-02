<?php
   
    require('db.php');

    $comment_id = null;
    $post_id = null;

    $comment_id=$_GET['comment_id'];
    $post_id=$_GET['post_id'];

    //This code will delete the selected comment from the database

    $sql = "DELETE FROM comments WHERE comments.id ='".$comment_id."'  ";

    $stmt = $connection->prepare($sql);

    $stmt->execute();

   header("Location: /single-post.php?post_id=$post_id" );


?>