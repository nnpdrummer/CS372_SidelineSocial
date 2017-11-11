
function revealNewPostGUI(){
    var createpost = document.getElementById("create_post");
    var createpostbtn = document.getElementById("new_post_button");
    createpost.style.visibility = "visible";
    createpost.insertAdjacentHTML("afterbegin", 
    "<div class=\"create_post_content\"><label for=\"reply_post\">Create Post</label></br><textarea id=\"reply_post\" name=\"reply_post\"></textarea></br><input type=\"button\" value=\"Post\" id=\"post_button\"></div>");
    createpostbtn.id = "disabled_button";
    createpostbtn.disabled = true;
}