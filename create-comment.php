<?php

include ('test-input.php');

require('db.php');


$author = $text ='';
$authorErr = $textErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    if (empty($_POST["author"])) {
        $authorErr = "Name is required";
      } else {
        $author = test_input($_POST["author"]);
      }

    if (empty($_POST["text"])) {
        $textErr = "Your comment is empty";
      } else {
        $text = test_input($_POST["text"]);
      }  
    
      $post_id = $_POST['post_id'];



   if($author!=='' && $text !== '' ) {

        $sql = 'INSERT INTO comments (author, text, post_id) VALUES (?, ?, ?)';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$author, $text, $post_id]);

        header("Location:single-post.php?post_id=$post_id");
   }


}



?>
    


    <form class='add-comment' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h4>Comment this post</h4>
        <div class='add-comment'> <input type="hidden" name="post_id" value="<?php echo $index; ?>"></div> <br> 

        <div class='add-comment'>

            <input type="text" name="author" placeholder="Your name:">

            <?php
                if($authorErr !== '') { 
            ?>
                   <span class="alert alert-danger"> <?php echo $authorErr;?></span> 
            <?php
                }
            ?> 
            
             

        </div> <br>

        <div class='add-comment'>

            <textarea rows="6" cols="50" class='comment-text' name="text" placeholder="Write a comment here..."></textarea> <br>

            <?php
                if($textErr !== '') {
            ?>
                   <span class="alert alert-danger"> <?php echo $textErr;?></span> 
            <?php
                }
            ?> 

        </div> <br>

        <div class='add-comment'><input class="btn btn-default" type="submit" value='Submit'></div><br>
        
    </form>
    
