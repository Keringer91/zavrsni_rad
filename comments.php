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
<?php
    if(empty($results)) { 
?>
        <br><div class = "publish-button" ><p style="font-weight:bold;">Nobody commented on this post yet. Be first!</p> </div>
<?php    
    }
?>



<?php
    if(!empty($results)) { 
?>

    <div style="display:inline-blocks; text-align: center;" class='add-comment'>
        <!--This button calls a JS DOM function to change the visibility of the comment-section class-->    
        <button style="width:30%" type="button" id="showHide" class="btn btn-default" value="hide" onclick="hideComments(this.value);">Hide comments</button>
        <!--This button calls a JS DOM function to delete all comments below the actual post-->
        <button style="width:30%" class="btn btn-primary del-all" onclick="confirmDeleteAllComm(<?php echo $index;?>)">Delete all comments</button>
    </div> 
       

    <div class="comment-section">

            <ul class="comments">
                    

                    <?php         
                        foreach($results as $r) {        
                    ?>        
                        <li>
                            <hr class="new1">
                            <p class="author"><?php echo $r['author']; ?></p>  
                            <div style="display: inline-blocks; ">

                                <p><?php echo $r['text']; ?></p> 
                                <a class="delete-comment btn btn-default" href="/delete-comment.php?post_id=<?php echo $index; ?>&comment_id=<?php echo $r['id']; ?>">Delete this comment</a>

                            </div>
                            <!--Lists all comments for the corresponding post from the database-->
                        </li>        
                    <?php    
                        }
                    ?>

            </ul>                
    </div>   

<?php    
    }
?>    

        