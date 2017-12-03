
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
    if(confirm('Are you sure you want to ban this user?')){
        document.getElementById("control").value = "ban";
        document.forms.selectUserForm.submit();
    }
}

function promoteUser(){
    if(confirm('Are you sure you want to promote this user?')){
        document.getElementById("control").value = "promote";
        document.forms.selectUserForm.submit();
    }
}
