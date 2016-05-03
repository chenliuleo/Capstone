var newPassword;
var newBannerId;
var newUserType;
var newRealName;

function submit () {
	// var newUserName=document.getElementById("newUserName").value;
	newPassword=document.getElementById("newPassword").value;
	newBannerId=document.getElementById("newBanner").value;
	newUserType=document.getElementById("newUserType").value;
	newRealName=document.getElementById("newRealName").value;
	if (isValid(newPassword)==true && isValid(newBannerId)==true && isValid(newUserType)==true && isValid(newRealName)==true)
		alert("complete");
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
