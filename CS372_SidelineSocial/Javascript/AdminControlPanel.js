
function validate(button){
    clearErrorMessage();
    if(document.getElementById("username").value == ""){
        document.getElementById("username").innerHTML = "Please select a user!";
        return false;
    }
    with(document.forms.selectUserForm){
        if(button.id == "ban"){
            banUser();
        }
        else if(button.id == "promote"){
            promoteUser();
        }
    }
}

function clearErrorMessage(){
    document.getElementById("username").innerHTML = "";
}

function banUser(){
    with(document.forms.selectUserForm){
        if(confirm('Are you sure you want to ban this user?')){
            alert(document.getElementById("username").value + " has been banned!");
            document.getElementById("username").value = "";
        }
    }
}

function promoteUser(){
    with(document.forms.selectUserForm){
        if(confirm('Are you sure you want to promote this user?')){
            alert(document.getElementById("username").value + " has been promoted!");
            document.getElementById("username").value = "";
        }
    }
}
