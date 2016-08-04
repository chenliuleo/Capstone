<html>
  <head>
    <style> h4 {font-family: Arial,Helvetica, sans-serif;}</style>
    <title>Student Information</title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
function fetch_select(val)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select").innerHTML=response; 
     }
   });
}

</script>
  </head>
  <body>
  <?php
  session_start();
  include ('conn.php');
  $course_id = $_GET['id'];
  echo "<a href=\"facultyCourse.php?id=$course_id\" style=\"color:#003DA5\">back</a><br>";
  //echo $course_id;
  //在此处插入下拉式菜单并输出bannerid;
  $input_total_points = mysql_query("insert into homework_students(total_points) select total_points from homework");
  $laostudent = mysql_query("select student_id from course_students where course_id='$course_id'");
  //var_dump($laostudent);
  $array1 = Array();
  while ($temp_stu = mysql_fetch_row($laostudent)){
    //var_dump($temp_stu[0]);
    array_push($array1, $temp_stu[0]);
  }
  //var_dump($array1);
  echo "<script>
	function auto_refresh(){
	  var x = document.getElementById('mySelect').value;
	  document.getElementById('refresh_below').innerHTML = x;
	  //window.location.href = 'studentGrade.php?id=$course_id?selected='+x;
	}</script>";
  echo "<select name=\"laochulaidestudent\" id=\"mySelect\" onchange=\"auto_refresh()\">
	<option value=\"\">Please select a student</option>";
  foreach($array1 as $sid)
 {
  $student_list = mysql_query("select * from users where id='$sid'");
  $sdetail = mysql_fetch_array($student_list);
  $bannerid = $sdetail['banner_id'];
  $fname = $sdetail['first_name'];
  $lname = $sdetail['last_name'];
  $temp = $fname . " " . $lname . "(" . $bannerid . ")";
  echo "<option value=\"$bannerid\">$temp</option>";
  }
  echo "</select>";
  echo "<p id=\"refresh_below\"></p>";
  
  /*if(!isset($_POST['laochulaidestudent'])){
    echo "failed!!!!!!!!!";}
  else{
  $laochulaidestudent2 = $_POST['laochulaidestudent'];
  echo $laochulaidestudent2;}*/
  echo $_GET['selected'];
  //echo $laochulaidestudent2;
  $mysql_query_ = mysql_query("select * from users where banner_id='$laochulaidestudent2'");
  $laochulaidestudent_array = mysql_fetch_array($mysql_query_);
  $mysql_query2 = mysql_query("select * from courses where id='$course_id'");
  $laochulaidecourse = mysql_fetch_array($mysql_query2);
  echo "<h4>Term: " . $laochulaidecourse['semester'] . " " . $laochulaidecourse['course_year'] . "</h4>";
  echo "<h4>Course number and section: " . $laochulaidecourse['name'] . "." . $laochulaidecourse['section'] . "</h4>";
  echo "<h4>Course name: " . $laochulaidecourse['description'] . "</h4>";
  echo "<h4>Student Name: " . $laochulaidestudent_array['first_name'] . " " . $laochulaidestudent_array['last_name'] . "</h4>";
  echo "<h4>Banner ID: " . $laochulaidestudent_array['banner_id'] . "</h4>";
  echo "<hr>";
   /*<dl>
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
