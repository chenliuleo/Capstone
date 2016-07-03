// validate user name and password
// By default, for student, username: student, password: student
// for instructor, username: instructor, password: instructor
var username;
var password;
function validate () {
    username=document.getElementById("username").value;
    password=document.getElementById("password").value;
    if (username=="student" && password=="student"){
	window.location="mainpage.html";
    }
    else if (username=="instructor" && password=="instructor"){
	window.location="fMainpage.html";
    }
    else if (username=="admin"&&password=="admin"){
	window.location="AMainpage.html";
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
