    //This js function changes the visibility of the comment-section and the text of the show/hide button using JS DOM 
    
    function hideComments(c) {
    
        if(c === 'hide') {

            document.querySelectorAll('.comment-section')[0].classList.add('invisible');
            document.getElementById("showHide").value="show";
            document.getElementById("showHide").innerHTML="Show comments";

        }
        
        else if (c === 'show') {
            document.querySelectorAll('.comment-section')[0].classList.remove('invisible');
            document.getElementById("showHide").value="hide";
            document.getElementById("showHide").innerHTML="Hide comments";
        }
       

    }

    function confirmDelete(id){
       var result = window.confirm('Do you really want to delete this post?');
        if (result)
        {
            window.location.replace("/delete-post.php?post_id=" + id);
            
        }
    }

    function confirmDeleteAll(){
        var result = window.confirm('Do you really want to DELETE ALL POSTS from the blog?');
         if (result)
         {
             window.location.replace("/delete-all-posts.php");
             
         }
     }

    function confirmDeleteAllComm(id){
        var result = window.confirm('Do you really want to delete all comments below this post?');
         if (result)
         {
             window.location.replace("/delete-all-comments.php?post_id=" + id);
             
         }
    }

