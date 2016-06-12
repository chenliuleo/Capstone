// validate user name and password
// By default, for student, username: student, password: student
// for instructor, username: instructor, password: instructor
function validate () {
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;
    if (username=="student" && password=="student"){
	window.location="mainpage.html";
    }
    else if (username=="instructor" && password=="instructor"){
	window.location="fMainpage.html";
    }
    else {
	alert("invalid username or password")
    }
}

function keydown (event) {
    if (event.keyCode==13)
	validate();
}
window.addEventListener('keydown', keydown, false);

// depends on what username and password we might use
function register () {
    window.location="register.html";
}
