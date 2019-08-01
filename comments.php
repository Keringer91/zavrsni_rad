<?php
    $index = 0;

    if (isset($_GET['post_id'])) {
        $index=$_GET['post_id'];
    }
    
    require('db.php');

    $sql = "SELECT comments.id as id, comments.author as author, comments.text as text, comments.post_id as post_id
            FROM comments  
            WHERE post_id = '".$index."'" ;

    
        
    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();


?>


    <div class="comment-section">
            <ul class="comments">
                <?php         
                    foreach($results as $r) {        
                ?>        
                    <li class="comment">
                        <hr class="new1">
                        <p class="author"><?php echo $r['author']; ?></p>        
                        <p><?php echo $r['text']; ?> 
                            <a class="btn btn-default" href="/delete-comment.php?post_id=<?php echo $index; ?>&comment_id=<?php echo $r['id']; ?>">Delete this</a>
                        </p>
                        <!--Lists all comments for the corresponding post from the database-->
                    </li>        
                <?php    
                    }
                ?>
            </ul>                
    </div>            
    

        