<?php

include ('test-input.php');

require('db.php');


$title = $body = $created_at=$author= '';
$titleErr = $bodyErr = '';

$sql = 'SELECT id, first_name, last_name FROM users';

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $users = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
    
    
    
    if (empty($_POST["user_id"])) {
        $titleErr = "Please select user";
      } else {
        $author = test_input($_POST["user_id"]);
      }

    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
      } else {
        $title = test_input($_POST["title"]);
      }

      if (empty($_POST["body"])) {
        $bodyErr = "The content field is empty!";
      } else {
        $body = test_input($_POST["body"]);
      }  
    
      $created_at = date('Y-m-d h:i:s');

   if($title !=='' && $body !== '' && $author !== '' ) {

        $sql = 'INSERT INTO posts (title, created_at, body, author) VALUES (?, ?, ?, ?)';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$title, $created_at, $body, $author]);

        header("Location: /index.php");
   }
   
}

?>
    
    <form class='add-post' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h4>Write Your Post Here</h4>

        <select name="user_id">
            <option value="" selected disabled hidden>Choose user</option>
            <?php
            foreach($users as $r) {
            ?>
            <option value="<?php echo $r['id']; ?>"> <?php echo $r['first_name'].' '.$r['last_name']; ?></option>
            <?php
            }
            ?>
        </select> <br>
        

        <div class='add-post'>

            <input type="text" name="title" value="<?php if (isset($title)) echo $title; ?>" placeholder="Title goes here...">

            <?php
                if($titleErr !== '') {
            ?>
                   <span class="alert alert-danger"> <?php echo $titleErr;?></span>
            <?php
                }
            ?>

        </div> <br>

        <div class='add-post'>

            <textarea rows="10" cols="50" class='comment-text' name="body" placeholder="Write Your post's content here..."><?php if(isset($_POST['body'])) echo $_POST['body']; ?></textarea> <br>

             <?php
                if($bodyErr !== '') {
            ?>
                   <span class="alert alert-danger"> <?php echo $bodyErr;?></span>
            <?php
                }
            ?>

        </div> <br>

        <div class="publish-button"><input class='btn btn-primary publish' type="submit" value='Publish post'></div><br>

    </form>
    
