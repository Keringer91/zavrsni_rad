<?php 
    include 'header.php'
?> <!--My header-->

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php include 'post-form.php'?><br> <!--adds new post into the database-->
          
        </div><!-- /.blog-main -->

        <?php
             include 'sidebar.php'
        ?> <!--My sidebar-->
    
    </div><!-- /.row -->

</main><!-- /.container -->

<?php 
    include 'footer.php'
?> <!--My footer-->


