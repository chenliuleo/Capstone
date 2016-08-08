
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
    <style>
      table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
      }
      th, td {
      padding: 5px;
      }
      table {font-family: Arial, Helvetica, sans-serif;}
    </style>
  </head>
  <body>
  <h3><a href="./addACourse.php">add a course</a></h3>
  <h3>Course this semester: <br></h3>
  <h3>Homework: <br></h3>
  <h3>Coming due: <br></h3>
  <?php
  session_start();
  include('conn.php');
  
  ?>
  </body>
</html>
