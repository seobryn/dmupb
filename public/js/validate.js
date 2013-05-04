function validate_pass() {
	var txt_pass = document.getElementById("txt_inp");
	var txt_pass2 = document.getElementById("txt_inp2");
	txt_pass.value = trim(txt_pass.value);
	txt_pass2.value = trim(txt_pass2.value);
	if (txt_pass.value == txt_pass2.value) {
		txt_pass.setAttribute("style", "border-color:#ADADAD");
		txt_pass2.setAttribute("style", "border-color:#ADADAD");
	}else{
		txt_pass.setAttribute("style", "border-color:red");
		txt_pass2.setAttribute("style", "border-color:red");
	}
}

function trim(v) {
	return v = v.replace(/^\s+|\s+$/g, '');
}
