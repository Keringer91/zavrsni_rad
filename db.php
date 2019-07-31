<?php

//establishing connection with the blog database, proceeds error message on failure

    try {
        $connection = new PDO(
            'mysql:host=127.0.0.1;dbname=blog',
            'root',
            ''
        );

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
