<?php
if(!isset($_SESSION)) {
  session_start();
}
$check_user = $_SESSION['login_user'];
//  echo $check_user;
//  $ses_sql = "SELECT user_name FROM user WHERE user_name = '$user_check'";
//  $retval = mysql_query($ses_sql, $conn);
//  $row = mysql_fetch_array($retval, MYSQL_ASSOC);

if(!isset($check_user)){
  header("location: login.php");
}
?>
