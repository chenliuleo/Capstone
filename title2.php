<html>
  <head>
   <title> Homework Submission System </title>
  </head>
  <style>
    #name{
    position:fixed;
	      right:0;
    }
    #content: {
      position: relative;
    }
    #content img{
      position: absolute;
      top: 5px;
      right: 5px;
      width: 100;
      height: 120;
    }
    .right{
      text-align:right;
    }
  </style>
  <body>
    <?php include('title.php');?>
    <center>
      <h1><font color="blue">Homework Submission System</font><br></h1>
      <div class="right">
	<a href="login.html" title="Log out" target="_parent">Log Out</a>
      </div>
      <div id="content">
        <img src="SLU_Logo.jpg">
      </div>
    </center>

  </body>
</html>
