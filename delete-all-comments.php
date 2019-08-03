<?php
    
    //This code will delete all comments below the current post 
    
    require('db.php');

    $post_id=$_GET['post_id'];

    $sql = 'SET FOREIGN_KEY_CHECKS=0';
    $stmt = $connection->prepare($sql);
    $stmt->execute();


    $sql = "DELETE FROM comments WHERE comments.post_id =".$post_id;
    $stmt = $connection->prepare($sql);
    $stmt->execute();


    $sql = 'SET FOREIGN_KEY_CHECKS=0';
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    header("Location: /single-post.php?post_id=$post_id" );


?>