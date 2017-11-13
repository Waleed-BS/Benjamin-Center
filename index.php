<?php
// if ($_SERVER['HTTPS'] != "on") {
//     $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
//     header("Location: $url");
//     exit;
// }

if(!isset($_SESSION)) {
  session_start();
}
if( !empty($_SESSION['login_user']) ) {
  $check_user = $_SESSION['login_user'];
  // echo $check_user;
}

?>
<html>
<head>

  <title>Survey Management System</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <meta name="viewport" content = "width=device-width, initial-scale=1.0">

  <style>
  body {
    background-image: url(Images/2-blue-gradient.jpg);
  }
  </style>
</head>
<body>
  <header>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFAE5D;">
      <img src = "Images/attendance report.png" width = "40" height = "40">
      <a class="navbar-brand" href="login.php">Survey Management System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php
          if( !empty($check_user) ) {
            if( $check_user == "admin") { ?>
              <li>
                <a class="nav-link" href="register.php">Register</a>
              </li>

              <li>
                <a class="nav-link" href="view_users.php">Sites</a>
              </li>
          <?php }} ?>

          <?php
          if( !empty($check_user) ) {
            if( $check_user == "admin") {

            } else {

            }
          } else { ?>
            <li>
              <a class="nav-link" href="login.php">Admin Login</a>
            </li>

          <?php } ?>

          <?php
          if( !empty($check_user) ) {
            if( $check_user == "admin") { ?>
              <li>
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
          <?php }} ?>

        </ul>
      </div>
    </nav>

  </header>


</body>
<!-- <script>
var x = 'some string'
alert( x.charAt(0) );
alert( x.slice(-1) )

</script> -->

</html>
