
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Homework Submission System</title>
  </head>
  <body>
  <!--<h3>Course this semester: <br></h3>
  <h3>Homework: <br></h3>
  <h3>Coming due: <br></h3>-->
  <?php
  session_start();
  include('conn.php');
  echo "Welcome!";
  echo "<br>";
  //echo "Coming due: ";
  echo "<br>";
  echo "<a href='addACourse.php'>Add a course</a>";
  ?>
  </body>
</html>
