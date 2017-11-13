<?php
include "../config.php";

if(!isset($_SESSION)) {
  session_start();
}

if(!empty($_SESSION["program_id_session"])) {
  $program_id = $_SESSION["program_id_session"];
}

if(!empty($_SESSION["populations_session"])) {
  $populations = $_SESSION["populations_session"];
}



if($_SERVER["REQUEST_METHOD"] == "POST") {

  // $createuser_sql = "INSERT INTO user (user_name, description, editProgram)
  // VALUES('$username', '$description', '$editProgram')";

  for($i = 0; $i < sizeof($populations); $i++) {

    /*
    since LIMIT doesn't work with UPDATE,
    I used LIMIT with SELECT to get the population_id,
    then I used population_id to update the value.
    */
    $values[$i] = $_POST["Value" . $i];
    $valueOfLimit = $i . ", 1";
    $population_select_sql =
    "SELECT population_id from population WHERE belong_to = $program_id LIMIT $valueOfLimit";
    $retval = mysql_query( $population_select_sql, $conn );
    $row = mysql_fetch_array($retval, MYSQL_ASSOC);
    $population_id = $row["population_id"];

    $population_update_sql =
    "UPDATE population SET value = $values[$i] WHERE population_id = $population_id";
    $retval = mysql_query( $population_update_sql, $conn );

    if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
    }

  }

  echo "User is registered successfully\n";
  mysql_close($conn);

  header("location: ../program_output.php?program_id=$program_id");

}



?>
