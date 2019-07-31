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

   