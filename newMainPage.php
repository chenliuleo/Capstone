<html>
  <head>
    <title> Homework Submission System </title>
  </head>
  <style>
  #name{
    position:fixed;
    right:0;
  }
  </style>
  <body>
    <?php include('title.php');?>
    <center>
    <h1>Homework Submission System <br></h1>
    </center>
    <div id="name"><?php echo $row['first_name'],' ',$row['last_name'];?></div>
  </body>
</html>