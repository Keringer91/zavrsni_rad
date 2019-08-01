<?php

include ('test-input.php');

require('db.php');


$title = $body = $created_at= '';
$titleErr = $bodyErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    if (empty($_POST["title"])) {
        $titleErr = "Name is required";
      } else {
        $title = test_input($_POST["title"]);
      }

      if (empty($_POST["body"])) {
        $bodyErr = "The content field is empty!";
      } else {
        $body = test_input($_POST["body"]);
      }  
    
      $created_at = '2019-11-11';

   if($title !=='' && $body !== '' ) {

        $sql = 'INSERT INTO posts (title, created_at, body) VALUES (?, ?, ?)';

        $stmt = $connection->prepare($sql);

        $stmt->execute([$title, $created_at, $body]);

        header("Location: /index.php");
   }
   
}

?>
    


    <form class='add-post' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h4>Write Your Post Here</h4>

        <div class='add-post'>

            <input type="text" name="title" placeholder="Title goes here...">
            <span class="alert alert-danger"> <?php echo $titleErr;?></span> 

        </div> <br>

        <div class='add-post'>

            <textarea rows="10" cols="50" class='comment-text' name="body" placeholder="Write Your post's content here..."></textarea> <br>
            <span class="alert alert-danger"> <?php echo $bodyErr; ?></span> 

        </div> <br>

        <div class='add-post'><input type="submit" value='Publish post'></div><br>

    </form>
    
