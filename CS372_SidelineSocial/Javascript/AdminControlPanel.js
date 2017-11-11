
function validate(button){
    clearErrorMessage();
    if(document.getElementById("selectUser").value == ""){
        document.getElementById("selectUserError").innerHTML = "Please select a user!";
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
    document.getElementById("selectUserError").innerHTML = "";
}

function banUser(){
    with(document.forms.selectUserForm){
        if(confirm('Are you sure you want to ban this user?')){
            alert(document.getElementById("selectUser").value + " has been banned!");
            document.getElementById("selectUser").value = "";
        }
    }
}

function promoteUser(){
    with(document.forms.selectUserForm){
        if(confirm('Are you sure you want to promote this user?')){
            alert(document.getElementById("selectUser").value + " has been promoted!");
            document.getElementById("selectUser").value = "";
        }
    }
}
