var newPassword;
var newBannerId;
var newUserType;
var newRealName;
var newUserName;

function submit () {
    newUserName=document.getElementById("newUserName").value;
    newPassword=document.getElementById("newPassword").value;
    newBannerId=document.getElementById("newBanner").value;
    newUserType=document.getElementById("newUserType").value;
    newFirstName=document.getElementById("newFirstName").value;
    newLastName=document.getElementById("newLastName").value;
    if (isValid(newPassword)==true && isValid(newBannerId)==true && isValid(newUserType)==true && isValid(newFirstName)==true && isValid(newLastName)==true){
	alert("complete");
	window.location="loginWindow.html";
    }
}

function isValid (context){
    if (!/^[a-zA-Z0-9]+$/.test(context)){
	alert("not valid");
	return false;
    }
    if (context.length>16 || context.length==0){
	alert("not valid");
	return false;
    }
    return true;
}
