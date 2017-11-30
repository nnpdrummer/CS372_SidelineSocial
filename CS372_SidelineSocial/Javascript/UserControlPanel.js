
function validate(){
    clearErrorMessages();
    with(document.forms.accountForm){
        if(oldPwd.value != "" || newPwd.value != "" || confirmPwd.value != ""){
            if(!validatePasswords()){
                return false;
            }
        }
        if(profilePic.value != "") {
            if (!checkFileExtension()) {
                return false;
            }
        }
    }
    return true;
}

function clearErrorMessages(){
    var list = document.getElementsByTagName("P");
    for(var i = 0; i < list.length; i++){
        list[i].innerHTML = "";
    }
    
    document.getElementById("first").innerHTML = "";
    document.getElementById("second").innerHTML = "";
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
        document.getElementById("deleteBoolean").value = "yes";
        document.getElementById("accountForm").submit()
    }
}

function passwordError() {
    document.getElementById("first").innerHTML = "Your password is invalid!";
}

function passwordChange() {
    document.getElementById("first").innerHTML = "Your password was changed successfully!";
}

function miscError() {
     document.getElementById("second").innerHTML = "Something went wrong!";
}

function profileUpdate() {
    document.getElementById("second").innerHTML = "Profile updated successfully!";
}

function checkFileExtension() {
    with(document.forms.accountForm){
        var fileName = profilePic.value;
        if (fileName.split(".")[1].toUpperCase() == "JPG" || fileName.split(".")[1].toUpperCase() == "JPEG")
            return true;
        else {
            document.getElementById("picError").innerHTML = "Images can only be of jpeg format!";
            return false;
        }
    }
}