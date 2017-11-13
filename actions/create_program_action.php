<?php
include("../config.php");

session_start();

if(!empty($_SESSION["user_id_session"])) {
  $user_id = $_SESSION["user_id_session"];
}

if( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["Program_name"]) ) {

  $program_name = $_POST["Program_name"];

  echo $program_name;
  echo $user_id;
  $create_program_sql = "INSERT INTO program (program_name, owner)
  VALUES('$program_name', '$user_id')";
  $retval = mysql_query( $create_program_sql, $conn );

  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  header("location: ../view_programs.php?user_id=$user_id");

} 
?>
