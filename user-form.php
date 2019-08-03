<?php

include ('test-input.php');

require('db.php');


$fname = $lname = '';
$fnameErr = $lnameErr = '';

$sql = 'SELECT id, first_name, last_name FROM users';

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $users = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      

    if (empty($_POST["first_name"])) {
        $fnameErr = "First name is required";
      } else {
        $fname = test_input($_POST["first_name"]);
      }

      if (empty($_POST["last_name"])) {
        $lnameErr = "Last name is required";
      } else {
        $lname = test_input($_POST["last_name"]);
      }  
    
   if($fname !=='' && $lname !== '') {

        $sql = 'INSERT INTO users (first_name, last_name) VALUES (?, ?)';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$fname, $lname]);

        header("Location: /index.php");
   }
   
}

?>
    
    <form style="display:inline-blocks; width:100%; text-align:center;"  class='add-post' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <h3 style="text-align: center; ">Add a new user here</h3><br>

        <div class='add-post'>

            <input class="add-user" type="text" name="first_name" value="<?php if (isset($fname)) echo $fname; ?>" placeholder="Your first name"><br>

            <?php
                if($fnameErr !== '') {
            ?>
                   <span class="alert alert-danger"> <?php echo $fnameErr;?></span>
            <?php
                }
            ?>

        </div>
         <br>           
        <div class='add-post'>

            <input class="add-user" type="text" name="last_name" value="<?php if (isset($lname)) echo $lname; ?>" placeholder="Your last name"><br>

            <?php
                if($lnameErr !== '') {
            ?>
                   <span class="alert alert-danger"> <?php echo $lnameErr;?></span>
            <?php
                }
            ?>

        </div>


        <br><input style="width: 30%;" class='btn btn-primary' type="submit" value='Add new user'></<input><br>

    </form>
