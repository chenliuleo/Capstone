    <?php
      session_start();
      //包含数据库连接文件

      
      $year = $_POST['year'];
      $semester = $_POST['semester'];
      //echo $year;
      //echo $semester;
      include('conn.php');
      $courses_query = mysql_query("select * from courses where year='$year' and semester='$semester'");
      //echo $courses_query;
      $row = mysql_fetch_array($courses_query);
      echo $row['course_name'];
      echo $row['course_section'];
    ?>