/* used for input validation of registration form */
function verify(f) {
  if (!f.email.value.match(/.+@.+\../)) {
		alert("You must provide a valid email adddress!");
		return false;
	}
	else if (f.pass1.value != f.pass2.value) {
	    alert("The passwords do not match!");
	    return false;
	}
	else {
	    return true;
	}
}