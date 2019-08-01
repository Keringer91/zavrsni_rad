<?php
require('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $author = $_POST['author'];
    $text = $_POST['text'];
    $post_id = $_POST['post_id'];
    $sql = 'INSERT INTO comments (author, text, post_id) VALUES (?, ?, ?)';

    $stmt = $connection->prepare($sql);

    $stmt->execute([$author, $text, $post_id]);

   header("Location: /single-post.php?post_id=$post_id" );
}

?>
    


    <form class='add-comment' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h4>Comment this post</h4>
        <div class='add-comment'> <input type="hidden" name="post_id" value="<?php echo $index; ?>"></div> <br> 
        <div class='add-comment'><input type="text" name="author" placeholder="Your name:"></div> <br> 
        <div class='add-comment'><textarea rows="10" cols="50" class='comment-text' name="text" placeholder="Write a comment here..."></textarea></div> <br>
        <div class='add-comment'><input type="submit" value='Submit'></div><br>
        <div class='add-comment'>    
                 <button type="button" id="showHide" class="btn btn-default" value="hide" onclick="hideComments(this.value);">Hide comments</button>
        </div> <!--This button calls a JS DOM function to change the visibility of the comment-section class-->
    </form>
    
