<html>
  <head>
    <title>Homework Submission System</title>
    <script src="add_delete.js"></script>
  </head>
  <body>
  <?php
    //echo $_GET['id'];
    $course_id = $_GET['id'];
    //echo $course_id;
    include ('conn.php');
    $mysql_query = mysql_query("select * from courses where id='$course_id'");
    $course = mysql_fetch_array($mysql_query);
    echo "Term: ";
    echo $course['semester'];
    echo " ";
    echo $course['course_year'];
    echo "<br>";
    echo "Course Number: ";
    echo $course['name'];
    echo "<br>";
    echo "Section: ";
    echo $course['section'];
    echo "<br>";
    echo "Course Name: ";
    echo $course['description'];
    echo "<br>";
  ?>
   <hr>
   <h4>Homework:</h4>
   <dl>
     <ul>
     <p>
       <table id="homework" border="1" cellpadding="6" cellspacing="2">
         <thead>
           <dd><tr>
               <th width = "100"><b>Number </b></th>
	       <th width = "100"><b>Title</b></th>
	       <th width = "100"><b>Dealine</b></th>
	       <th width = "150"><b>Point value</b></th>
	       <th width = "100"><b>Score</b></th>
	       <th width = "100"><b>Solution</b></th>
	   </tr></dd>
       </table>
       <br>
       <button onclick="CreateRow()">Update homework</button>
       <button onclick="DeleteRow()">Delete row</button>
     </p>
     </ul>
   </dl>
   <hr>
   <h4>Student: </h4>
   <dl>
     <ul>
     <p>
       <table border="1" cellpadding="6" cellspacing="2">
         <thead>
           <dd><tr>
               <th width = "100"><b>Banner ID </b></th>
	       <th width = "100"><b>First Name</b></th>
	       <th width = "100"><b>Last Name</b></th>
	       <th width = "150"><b>Student Score</b></th>
	       <th width = "150"><b>Full Score</b></th>
	       <th width = "150"><b>Grade</b></th>
	   </tr></dd>
	   </table>
     </p>
     </ul>
   </dl>
   <a href="./studentGrade.html">student grade</a>
   <br>
   <a href="./addHomework.html">add homework</a>

   </body>
</html>
