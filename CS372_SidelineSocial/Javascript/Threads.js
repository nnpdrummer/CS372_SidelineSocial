
var revealNewPostGUI = function(){
    var createpost = document.getElementById("create_post");
    var createpostbtn = document.getElementById("new_post_button");
    createpost.style.visibility = "visible";
    createpost.insertAdjacentHTML("afterbegin", 
    "<div class=\"create_post_content\"><label for=\"reply_post\">Create Post</label></br><textarea id=\"reply_post\" name=\"reply_post\"></textarea></br><input type=\"submit\" value=\"Post\" name=\"post_button\" id=\"post_button\"><p id=\"errorMessage\"></p></div>");
    createpostbtn.id = "disabled_button";
    createpostbtn.disabled = true;
}

function validatePostCreation(){
    document.getElementById('errorMessage').innerHTML = "";
    var reply_post = document.getElementById('reply_post');
    
    if(reply_post.value == ""){
        document.getElementById('errorMessage').innerHTML = "Please enter some content";
        return false;
    }
    return true;
}

//add client side input validation

document.getElementById('new_post_button').addEventListener('click', revealNewPostGUI, false);