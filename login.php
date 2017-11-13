<?php include "index.php"; ?>

<html>
<body>

<div class="container" style="background-color: white; margin-top: 3%;">

  <br>
  <h3>Login</h3>

  <form method="post" name="Form" action="./actions/login_action.php">
    <div class="form-group">
      <label for="Username">Username</label>
      <input class="form-control" name="Username" id="username" type="text" rows="1"></input>
    </div>
    <div class="form-group">
      <label for="Password">Password</label>
      <input class="form-control" name="Password" id="password" type="password" rows="1"></input>
    </div>
    <input class="form-control" name="login" type="submit" onClick="validateUser()" value="Login"></input>
    <br>
  </form>
</div>
</body>
<script>

function validateUser() {

  let username = document.getElementById("username").value
  let password = document.getElementById("password").value
  username = username.replace(/\s/g, '');
  if( username != "admin" || password != "admin" ) {
    event.preventDefault();
    alert("Your Username or Password is invalid");
  }

}

</script>
</html>
