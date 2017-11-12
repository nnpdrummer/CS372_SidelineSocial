/* used for input validation of registration form */
function verify(f) {
	var length = f.username.value.toString().length;
	
	if (!f.email.value.match(/.+@.+\../)) {
		alert("You must provide a valid email adddress!");
		return false;
	}
	if (f.pass1.value != f.pass2.value) {
	    alert("The passwords do not match!" + length);
	    return false;
	}
	if (length > 16) {
		alert("Username cannot be longer than 16 characters!");
		return false;
	}
	return true;
}