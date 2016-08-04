<html>
  <head>
    <title>Student Information</title>
  </head>
  <body>
  <?php
  session_start();
  //在此处插入下拉式菜单并输出bannerid;
  $input_total_points = mysql_query("insert into homework_student(total_points) select total_points from homework");
  $mysql_query = mysql_query("select * from homework_student where student_id='$student_id'");
  /* <h4>Term: </h4>
   <h4>Course Number: </h4>
   <h4>Course Name: </h4>
   <h4>Section: </h4>
   <h4>Student Name: </h4>
   <h4>Banner ID: </h4>
   <hr>
   <h4>Student Name:</h4>
   <dl>
     <ul>
     <p>
       <table border="1" cellpadding="6" cellspacing="2">
         <thead>
           <dd><tr>
               <th width = "100"><b>Homework</b></th>
	       <th width = "100"><b>DeadLine</b></th>
	       <th width = "100"><b>Submit Time</b></th>
	       <th width = "150"><b>Student Score</b></th>
	       <th width = "100"><b>Full Score</b></th>
	       <th width = "100"><b>Note</b></th>
	       <th width = "100"><b>Feedback</b></th>
	   </tr></dd>
	   </table>
     </p>
     </ul>
   </dl>*/
  ?>
  </body>
   
</html>
