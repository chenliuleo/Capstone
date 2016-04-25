function submit () {
	var newUserName=document.getElementById("newUserName").value;
	var newPassword=document.getElementById("newPassword").value;
	var newBannerId=document.getElementById("newBanner").value;
	var newUserType=document.getElementById("newUserType").value;
	var newRealName=document.getElementById("newRealName").value;
	
	var squel = require("squel");
	var q = squel.insert();
	log(
		squel.insert()
			.into("test")
			.set("username",newUserName)
			.set("userpass",newPassword)
			.set("bannerid",newBannerId)
			.set("usertype",newUserType)
			.set("userrealname",newUserName)
			.toString()
	);
}