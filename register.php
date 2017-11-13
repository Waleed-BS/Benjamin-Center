
<?php
include("session.php");
include("index.php");
$usernameError = "";
$username = "";

$descriptionError = "";
$description = "";

$editProgramError = "";
$editProgram = "";

$programError = "";
$program = "";

$table = 'user';

include("config.php");

if( $_SERVER["REQUEST_METHOD"] == "POST"
  && !empty($_POST["Username"])
  && !empty($_POST["Description"])
  && !empty($_POST["EditProgram"])) {

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }

  if(! get_magic_quotes_gpc() ) {
    $username = addslashes ($_POST['Username']);
    $description = addslashes ($_POST['Description']);
    $editProgram = addslashes ($_POST['EditProgram']);
    $program = addslashes ($_POST['Program_name']);
  } else {
    $username = $_POST['Username'];
    $description = $_POST['Description'];
    $editProgram = $_POST['EditProgram'];
    $program = ($_POST['Program_name']);
  }

  $createuser_sql = "INSERT INTO user (user_name, description, editProgram)
  VALUES('$username', '$description', '$editProgram')";

  $retval = mysql_query( $createuser_sql, $conn );

  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  echo "User is registered successfully\n";

  // id from last query
  $user_id = mysql_insert_id();

  // if "program name" exists, insert it in a new program table
  if(!empty($_POST['Program_name'])) {
    $create_program_sql = "INSERT INTO program (program_name, owner)
    VALUES('$program', '$user_id')";
    $retval = mysql_query( $create_program_sql, $conn );
  }
  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  header("location: view_programs.php?user_id=$user_id");
  // header("location: http://cs.newpaltz.edu/~n02575037/BenjaminCenter/view_programs.php?user_id=$user_id");
  // echo "Entered program successfully\n";

  mysql_close($conn);

} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["Username"])) {
  $usernameError = "Name section is required";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["Description"])) {
  $descriptionError = "Description section is required";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["EditProgram"])) {
  $editProgramError = "Choose an option";
}

?>

<div class = "container" style = "background-color: white; margin-top: 3%;">

  </br>
  <h3>Create an account</h3>

  <form method="post" class='my-form' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="form-group">
      <label for="username">Site</label>
      <input class="form-control" id="username" name="Username" rows="1"
      placeholder="The first letter of each word of the full organization name (e.g. FPT for Family Practice Center).">
      <span class="error" style="color:red;"> <?php echo $usernameError;?></span>
    </div>

    <div class="form-group">
      <label for="description">Descripion</label>
      <input class="form-control" id="description" name="Description" rows="1"
      placeholder="Full organization name (e.g. Family Practice Center)."></input>
      <span class="error" style="color:red;"> <?php echo $descriptionError;?></span>
    </div>

    <!-- <div class="form-group">
      <label for="exampleFormControlTextarea1">Address</label>
      <input class="form-control" name="Organization" type="text" rows="1"></input>
      <span class="error" style="color:red;"> <?php echo $editProgramError;?></span>
    </div> -->

    <div class="form-group">
      <label for="editProgram">Allow user to edit program name</label>
      </br>
      <input class="radio" id="editProgram1" name="EditProgram" type="radio" value="Yes"> Yes</input>
      <input class="radio" id="editProgram2" name="EditProgram" type="radio" value="No"> No</input>
      <span class="error" style="color:red;"> <?php echo $editProgramError;?></span>
    </div>

      <div class="form-group">
        <label for="program">Program Name</label>
        <input class="form-control" id="program" name="Program_name" rows="1"></input>
        <span class="error" style="color:red;"> <?php echo $programError;?></span>
      </div>

    <input class="btn btn-primary" value="Create Site" name="register" type="submit" value="Submit"> </input>

  </form>
</div>
