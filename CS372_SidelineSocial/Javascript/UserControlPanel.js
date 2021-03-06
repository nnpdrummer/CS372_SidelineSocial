function validate(){
    clearErrorMessages();
    if(document.getElementById("oldPwd").value != "" || 
            document.getElementById("newPwd").value != "" || 
            document.getElementById("confirmPwd").value != "") {
        if(!validatePasswords()){
            return false;
        }
    }
    if(document.getElementById("profilePic").value != "") {
        if (!checkFileExtension()) {
            return false;
        }
    }
    return true;
}

function clearErrorMessages(){
    var list = document.getElementsByTagName("P");
    for(var i = 0; i < list.length; i++){
        list[i].innerHTML = "";
    }
    document.getElementById("status").innerHTML = "";
}

function validatePasswords(){
    if(document.getElementById("oldPwd").value == ""){
        document.getElementById("oldPwdError").innerHTML = "Old password is required for changing password!";
        return false;
    }
    else if(document.getElementById("newPwd").value == ""){
        document.getElementById("newPwdError").innerHTML = "New password is required for changing password!";
        return false;
    }
    else if(document.getElementById("confirmPwd").value == ""){
        document.getElementById("confirmPwdError").innerHTML = "Please enter your new password again!";
        return false;
    }
    if(document.getElementById("newPwd").value != document.getElementById("confirmPwd").value){
        document.getElementById("newPwdError").innerHTML = "Passwords must match!";
        document.getElementById("confirmPwdError").innerHTML = "Passwords must match!";
        return false;
    }
    return true;
}

function deleteAccount(){
    if(confirm('Are you sure you want to delete your account?')){
        document.getElementById("deleteBoolean").value = "yes";
        document.getElementById("accountForm").submit();
    }
}

function checkFileExtension() {
    var fileName = document.getElementById("profilePic").value;
    var extension = fileName.split(".")[1].toUpperCase();
    if (extension == "JPG" || extension == "JPEG" || extension == "JPE" || extension == "JFIF" || extension == "GIF" || extension == "PNG") {
        return true;
    }
    else {
        document.getElementById("picError").innerHTML = "Images can only be of jpeg or gif format!";
        return false;
    }
}