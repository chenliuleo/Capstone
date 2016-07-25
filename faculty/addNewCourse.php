<?php
if(!empty($_POST['newCourse'])) {
  foreach($_POST['newCourse'] as $check) {
    echo $check;
  }
}

?>