<?php         
    foreach($results as $r) {        
?>        
        <!--Displays posts from the database-->
        <a class="blog-post-title" href="single-post.php?post_id=<?php echo $r['id']; ?>"><h2><?php echo $r['title']; ?></h2></a>
        <div class="post-header">
            <p class="blog-post-meta"><?php echo 'Created at: '.$r['created_at'];?> </p>
            <p class="blog-post-meta"><?php echo 'Author: '.$r['fName'].' '.$r['lName']; ?> </p>
        </div>    
        <p><?php echo $r['body']; ?></p>
        <!-- <a class="btn btn-default" href="/delete-post.php?post_id=<?php echo $index;?>">Delete this post</a>
        <button class="btn btn-primary" onclick="confirmDelete(<?php echo $r['post.id'] ?>)">Delete this post</button> -->

<?php    
    }
?>            