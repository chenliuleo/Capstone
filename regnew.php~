<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title>User Sign Up</title>
</head>
<body>
<?php
// define variables and set to empty values
$usernameErr = $emailErr = $userTypeErr = $passwordErr = $first_nameErr = $last_nameErr = $banneridErr = "";
$username = $email = $userType = $password = $bannerid = $first_name =$last_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = " username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]+$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["password"])){
    $passwordErr="password is required";
  }
  else{
    $password=test_input($_POST["password"]);
    if (strlen($password)<8){
      $passwordErr="Password length does not qualified";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^[a-zA-Z0-9]+@slu.edu$/", $email)) {
      $emailErr = "Invalid email format"; 
    }
  }
  
  if (empty($_POST["bannerid"])){
    $banneridErr = "bannerid is required";
  }  
  else{
    $bannerid = test_input($_POST["bannerid"]);
    if (!preg_match("/^000[0-9]{6}$/", $bannerid)){
      $banneridErr="Invalid bannerid format";
    }
  }

  if (empty($_POST["first_name"])){
    $first_nameErr = "first name is required";
  }  
  else{
    $first_name = test_input($_POST["first_name"]);
    if (!preg_match("/^[a-zA-Z]+$/", $first_name)){
      $first_nameErr="Only letters allowed";
    }
  }

  if (empty($_POST["last_name"])){
    $last_nameErr = "last name is required";
  }  
  else{
    $last_name = test_input($_POST["last_name"]);
    if (!preg_match("/^[a-zA-Z]+$/", $first_name)){
      $last_nameErr="Only letters allowed";
    }
  }


  if (empty($_POST["userType"])) {
    $userTypeErr = "User Type is required";
  } else {
    $userType = test_input($_POST["userType"]);
  }
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>User Sign Up</h2>
<p><span class="error">* required field.</span></p>
<!--<form method="post" action="db.php">-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  SLU email:<input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Banner ID:<input type="text" name="bannerid" value="<?php echo $bannerid;?>">
  <span class="error">* <?php echo $banneridErr;?></span>
  <br><br>
  First Name:<input type="text" name="first_name" value="<?php echo $first_name;?>">
  <span class="error">* <?php echo $first_nameErr;?></span>
  <br><br>
  Last Name:<input type="text" name="last_name" value="<?php echo $last_name;?>">
  <span class="error">* <?php echo $last_nameErr;?></span>
  <br><br>
  User Type:
  <input type="radio" name="userType" <?php if (isset($userType)&&$userType=="student") echo "checked";?> value="student">Student
  <input type="radio" name="userType" <?php if (isset($userType)&&$userType=="faculty") echo "checked";?>value="faculty">Faculty
  <span class="error">* <?php echo $userTypeErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "output: ";
echo $username;
echo "<br>";
include('db.php');
?>
</body>
</html>
