
var revealNewThreadGUI = function(){
    var createthread = document.getElementById("create_thread");
    var createthreadbtn = document.getElementById("new_thread_button");
    createthread.style.visibility = "visible";
    createthread.insertAdjacentHTML("afterbegin", 
    "<div class=\"create_thread_content\"><label for=\"thread_title\">Thread Title:</label></br><input type=\"text\" name=\"thread_title\" id=\"thread_title\" placeholder=\"Title of Thread...\"></br><label for=\"post_content\">First Post Content</label></br><textarea id=\"post_content\" name=\"post_content\" placeholder=\"Place your content here...\"></textarea></br><input type=\"submit\" value=\"Create Thread\" name=\"post_button\" id=\"post_button\"><p id=\"errorMessage\"></p></div>");
    createthreadbtn.id = "disabled_button";
    createthreadbtn.disabled = true;
}

function validateThreadCreation(){
    document.getElementById('errorMessage').innerHTML = "";
    var thread_title = document.getElementById('thread_title');
    var post_content = document.getElementById('post_content');
    
    if(thread_title.value == ""){
        document.getElementById('errorMessage').innerHTML = "Please enter a title for the thread";
        return false;
    }
    else if(post_content.value == ""){
        document.getElementById('errorMessage').innerHTML = "Please enter some content";
        return false;
    }
    return true;
}

document.getElementById('new_thread_button').addEventListener('click', revealNewThreadGUI, false);