
<?php
include("../config.php");

$username = "";
$usernameError = "";

$password = "";
$passwordError = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

  // username and password sent from form
  $username = $_POST['Username'];
  $username = preg_replace('/\s+/', '', $username);
  $password = $_POST['Password'];
  // echo $username;
  // echo $password;
  // if( !$conn ) {
    // die('Could not connect: ' . mysql_error());
  // }

  // $sql = "SELECT user_id FROM user WHERE user_name = '$username' and password = '$password'";
  // $sql = "SELECT user_id FROM user WHERE user_name = '$username'";

  // $retval = mysql_query($sql, $conn);
  // $row = mysql_fetch_array($retval, MYSQL_ASSOC);
  // $active = $row['active'];

  // number of rows
  // $count = mysql_num_rows($retval);

  // If $retval matched $username and $password, table row must be 1 row
  if( $username == "admin" && $password == "admin") {
    session_start();
    $_SESSION['login_user'] = $username;
    echo "Entered data successfully\n";

    header("Location: ../view_users.php");
  } else {
    header("location: ../login.php");
    echo "Your Username or Password is invalid\n";

    $error = "Your Username or Password is invalid";
  }

}

?>
