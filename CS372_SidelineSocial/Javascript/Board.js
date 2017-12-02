
var revealNewThreadGUI = function(){
    var createthread = document.getElementById("create_thread");
    var createthreadbtn = document.getElementById("new_thread_button");
    createthread.style.visibility = "visible";
    createthread.insertAdjacentHTML("afterbegin", 
    "<form action=\"createThreadController()\" method=\"post\"><div class=\"create_thread_content\"><label for=\"thread_title\">Thread Title:</label></br><input type=\"text\" name=\"thread_title\" id=\"thread_title\" placeholder=\"Title of Thread...\"></br><label for=\"post_content\">First Post Content</label></br><textarea id=\"post_content\" name=\"post_content\" placeholder=\"Place your content here...\"></textarea></br><input type=\"submit\" value=\"Create Thread\" id=\"post_button\"></div></form>");
    createthreadbtn.id = "disabled_button";
    createthreadbtn.disabled = true;
}

//add client side input validation

document.getElementById('new_thread_button').addEventListener('click', revealNewThreadGUI, false);

/*$('#post_button').on('submit', function(e){
    e.preventDefault();
    var details = $('#post_button').serialize();
    $.post('Board.php', details, function(data)
       {
           alert(data); // show response from the php script.
       });
});*/