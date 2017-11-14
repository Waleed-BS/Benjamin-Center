<?php
include("session.php");
include("index.php");
include("config.php");

// $_GET['use the variable after view_programs.php?']
$user_id = $_GET['user_id'];

if(!isset($_SESSION)) {
  session_start();
}
$_SESSION["user_id_session"] = $user_id;

$user_name_sql = 'SELECT user_name FROM user WHERE user_id = ' . $user_id;
$retval = mysql_query($user_name_sql, $conn);
$row = mysql_fetch_array($retval, MYSQL_ASSOC);
$user_name = $row["user_name"];

$programs_sql = "SELECT program_name, program_id FROM program WHERE owner = $user_id";

// using inner join to fetch programs from owner
// " SELECT u.*, p.*
//   FROM user u
//     inner join program p on u.user_id = p.owner
//   WHERE u.user_id = " . $user_id;

$retval = mysql_query($programs_sql, $conn);

// $row = mysql_fetch_array($retval, MYSQL_ASSOC);
mysql_close($conn);


if(!empty($_SESSION["program_name_error_session"]) ) {
  $program_name_error = $_SESSION["program_name_error_session"];
}

?>

<html>
<body>
<div class = "container" style = "background-color: white; margin-top: 3%;">


  <!-- todo: add a program link next to Programs -->
  <!-- <form method="POST" action="create_porgram_action.php">  -->
    <br>
    <h2>Site: <?php echo $user_name ?> </h2>
    <br>

    <h3>Programs </h3>

  <!-- </form> -->

  <table style="text-align: center;" border="1" cellpadding="4">

    <tr>
      <th style="text-align: center;"><strong>Program Name</strong></th>
      <th style="text-align: center;"><strong>Link</strong></th>
      <th style="text-align: center;"><strong>Calculation</strong></th>
      <th style="text-align: center;"><strong>Report</strong></th>
    </tr>

    <?php
    while( $row = mysql_fetch_array($retval) ) {
    ?>

    <tr>
      <td> <a class="btn btn-outline-secondary" href="program.php?program_id=<?php echo $row['program_id']; ?> "> <?php echo $row["program_name"]; ?> </a> </td>
      <td> <a class="btn btn-outline-info" href="mailto:?subject=SROI%20Survey&body=https://cs.newpaltz.edu/~n02575037/BenjaminCenter/program.php?program_id=<?php echo $row['program_id'];?>" > Email Link </a> </td>
        <!-- <td>
          <a href="mailto:?subject=SROI%20Survey&body=http://localhost/Benjamin_Center/program.php?program_id=<?php echo $row['program_id'];?>" > Email link</a>
        </td> -->
      <td> <a class="btn btn-outline-info" href="calculation.php?program_id=<?php echo $row['program_id']; ?> "> View Calculation </a> </td>
      <td> <a class="btn btn-outline-info" href="program_output.php?program_id=<?php echo $row['program_id']; ?>"> View Program Output </a> </td>

    </tr>

    <?php
    }
    ?>

  </table>
  <br>
  <!-- <button onclick="window.location.href='program.php?user_id=<?= $user_id ?>'" >Add New Program</button>
  <div class="form-group row">
    <input class="form-control" type="text"> </input>
  </div> -->

  <form method="POST" action="./actions/create_program_action.php">

  <label for="Program_name" class="col-3 ">New Program Name</label>
  <div class="form-group row">
    <div class="col-6">
      <input id="program_name" class="form-control" name="Program_name" type="text" placeholder="e.g. Visiting Nurse Services" >
      <span id="program_name_error" class="error" style="color:red;"></span>
    </div>
    <div class="col-3">
      <input type="submit" class="btn btn-primary" onClick="validateData()" value="Add New Program"></input>
    </div>

  </div>


  <br>


</div>

</body>
<script>

function validateData() {

  let program_name = document.getElementById("program_name").value
  program_name = program_name.trim()
  if( program_name == "") {
    event.preventDefault()
    document.getElementById("program_name_error").innerHTML = "Cannot submit an empty program name."
  } else {
    window.location.href='program.php?program_id=<?php echo $row["program_id"] ?>'
  }

}

</script>
<style>
th, td {
  padding: 10px;
  border: 1px solid black;
}

th {
  background-color: #0F76A8;
  color: white;
  border: 1px solid black;
  /*color: white;*/
}

</style>
</html>
