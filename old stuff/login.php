
<?php
include("index.php");
include("config.php");

$username = "";
$usernameError = "";

$password = "";
$passwordError = "";

$table = 'user';

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {

  // username and password sent from form
  $username = $_POST['Username'];
  $password = $_POST['Password'];

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }

  $sql = "SELECT id FROM user WHERE name = '$username' and password = '$password'";

  mysql_select_db('Benjamin');
  // mysql_select_db('n02575037_db');

  $retval = mysql_query($sql, $conn);
  $row = mysql_fetch_array($retval,MYSQL_ASSOC);
  // $active = $row['active'];

  $count = mysql_num_rows($retval);

  // If $retval matched $username and $password, table row must be 1 row
  if($count == 1) {
    // session_register("username");
    $_SESSION['login_user'] = $username;
    echo "Entered data successfully\n";
    header("Location: survey.php");
  } else {
    echo "Your Username or Password is invalid\n";
    $error = "Your Username or Password is invalid";
  }
}
?>

<div class = "container" style = "background-color: white;">

  <h3>Login</h3>

  <form method="post" name="Form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Username</label>
      <input class="form-control" name="Username" type="text" rows="1"></input>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Password</label>
      <input class="form-control" name="Password" type="password" rows="1"></input>
    </div>
    <input class="form-control" name="login" type="submit" value="Login"></input>
  </form>
</div>
