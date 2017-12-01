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

$programs_sql = "SELECT program_name, program_id, owner FROM program WHERE owner = $user_id";

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

  <!-- </form> -->

  <table style="text-align: center;" border="1" cellpadding="4">

    <tr>
      <th style="text-align: center;"><strong>Program Name</strong></th>
      <th style="text-align: center; width: 25%"><strong>Program </strong></th>
      <!-- <th style="text-align: center;"><strong>Link</strong></th> -->
      <th style="text-align: center;"><strong>Calculation</strong></th>
      <th style="text-align: center;"><strong>Report</strong></th>
    </tr>

    <?php
    while( $row = mysql_fetch_array($retval) ) {
    ?>

    <tr>
      <td> <span> <?php echo $row["program_name"], "</br>" ?> </span> </td>
      <td>

        <a style="width: 51%; " class="btn btn-outline-secondary" href="program.php?program_id=<?php echo $row['program_id']; ?> "> SROI </a>
        <a style="width: 46%; " class="btn btn-outline-secondary" href="eisurvey.php?program_id=<?php echo $row['program_id']; ?> "> EI </a>

        <a style="width: 51%; font-size: 13px; font-weight: bold; margin-top: 15" class="btn btn-outline-info" href="mailto:?subject=SROI%20Survey&body=https://cs.newpaltz.edu/~n02575037/BenjaminCenter/program.php?program_id=<?php echo $row['program_id'];?>" > Email SROI Link </a>
        <a style="width: 46%; font-size: 13px; font-weight: bold; margin-top: 15" class="btn btn-outline-info" href="mailto:?subject=SROI%20Survey&body=https://cs.newpaltz.edu/~n02575037/BenjaminCenter/eisurvey.php?program_id=<?php echo $row['program_id'];?>" > Email EI Link </a> </td>

       </td>
      <!-- <td>
        <a style="width: 60%;" class="btn btn-outline-info" href="mailto:?subject=SROI%20Survey&body=https://cs.newpaltz.edu/~n02575037/BenjaminCenter/program.php?program_id=<?php echo $row['program_id'];?>" > Email SROI Link </a>
        <a style="width: 60%;" class="btn btn-outline-info" href="mailto:?subject=SROI%20Survey&body=https://cs.newpaltz.edu/~n02575037/BenjaminCenter/eisurvey.php?program_id=<?php echo $row['program_id'];?>" > Email EI Link </a>
      </td> -->
      <td>
        <a style="width: 81%; color: black;" class="btn btn-outline-warning" href="calculation.php?program_id=<?php echo $row['program_id']; ?>">View SROI Calculation</a>

        <a style="width: 81%; color: black; margin-top: 10" class="btn btn-outline-warning" href="ei_calculation.php?program_id=<?php echo $row['program_id']; ?>">View EI Calculation</a>
      </td>
      <td> <a class="btn btn-outline-success" href="program_output.php?program_id=<?php echo $row['program_id']; ?>"> View Program Output </a> </td>

      <form style="marging: 0" method="POST" action="./actions/remove_program_action.php?user_id=<?php echo $row['owner'] ?>">
        <td style="border-color: white;">
          <input type="submit" style="width: 100px;" class="btn btn-danger" value="Delete"></input>
        </td>
      </form>

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

  <label for="Program_name" class="col-3">New Program Name</label>
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
  font-size: 22px;
  /*color: white;*/
}

</style>
</html>
