<?php
    
    //This code will delete the current post seen on the page from the database
    
    require('db.php');

    $post_id=$_GET['post_id'];

    $sql = 'SET FOREIGN_KEY_CHECKS=0';
    $stmt = $connection->prepare($sql);
    $stmt->execute();


    $sql = "DELETE FROM posts WHERE posts.id ='".$post_id."' ";
    $stmt = $connection->prepare($sql);
    $stmt->execute();


    $sql = 'SET FOREIGN_KEY_CHECKS=0';
    $stmt = $connection->prepare($sql);
    $stmt->execute();

   header("Location: /index.php" );


?>