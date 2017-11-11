
function revealNewThreadGUI(){
    var createthread = document.getElementById("create_thread");
    var createthreadbtn = document.getElementById("new_thread_button");
    createthread.style.visibility = "visible";
    createthread.insertAdjacentHTML("afterbegin", 
    "<div class=\"create_thread_content\"><label for=\"thread_title\">Thread Title:</label></br><input type=\"text\" name=\"thread_title\" id=\"thread_title\" placeholder=\"Title of Thread...\"></br><label for=\"post_content\">First Post Content</label></br><textarea id=\"post_content\" name=\"post_content\" placeholder=\"Place your content here...\"></textarea></br><input type=\"button\" value=\"Create Thread\" id=\"post_button\"></div>");
    createthreadbtn.id = "disabled_button";
    createthreadbtn.disabled = true;
}






/*
<div class="create_thread_content">
                <label for="thread_title">Thread Title:</label></br>
                <input type="text" name="thread_title" id="thread_title" placeholder="Title of Thread..."></br>
                <label for="post_content">First Post Content</label></br>
                <textarea id="post_content" name="post_content" placeholder="Place your content here..."></textarea></br>
                <input type="button" value="Create Thread" id="post_button">
            </div>
*/