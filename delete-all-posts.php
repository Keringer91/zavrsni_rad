<?php
    
    //This procedure will delete all posts and also deletes comments related to the deleted posts from the database
    
    require('db.php');

    $sql = 'SET FOREIGN_KEY_CHECKS=0';
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $sql = 'TRUNCATE TABLE posts';
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $sql = 'TRUNCATE TABLE comments';
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $sql = 'SET FOREIGN_KEY_CHECKS=0';
    $stmt = $connection->prepare($sql);
    $stmt->execute();

   header("Location: /index.php" );


?>