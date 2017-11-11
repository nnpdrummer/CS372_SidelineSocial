
function validate(){
    clearErrorMessages();
    with(document.forms.accountForm){
        if(oldPwd.value != "" || newPwd.value != "" || confirmPwd.value != ""){
            if(!validatePasswords()){
                return false
            }
        }
    }
    return true;
}

function clearErrorMessages(){
    for(var i = 0; i < document.getElementsByTagName("P").length; i++){
        document.getElementsByTagName("P")[i].innerHTML = "";
   }
}

function validatePasswords(){
    with(document.forms.accountForm){
        if(oldPwd.value == ""){
            document.getElementById("oldPwdError").innerHTML = "Old password is required for changing password!";
            return false;
        }
        else if(newPwd.value == ""){
            document.getElementById("newPwdError").innerHTML = "New password is required for changing password!";
            return false;
        }
        else if(confirmPwd.value == ""){
            document.getElementById("confirmPwdError").innerHTML = "Please enter your new password again!";
            return false;
        }
        if(newPwd.value != confirmPwd.value){
            document.getElementById("newPwdError").innerHTML = "Passwords must match!";
            document.getElementById("confirmPwdError").innerHTML = "Passwords must match!";
            return false;
        }
    }
    return true;
}

function deleteAccount(){
    if(confirm('Are you sure you want to delete your account?')){
        window.location = "../Main/UserMain.html";
    }
}