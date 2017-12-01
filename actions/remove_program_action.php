<?php
include "../config.php";

$user_id = $_GET["user_id"];

// check id of program to delete population
$select_program_sql =
" SELECT program_id, owner FROM program WHERE owner = $user_id";
$retval = mysql_query($select_program_sql, $conn);
$row = mysql_fetch_array($retval, MYSQL_ASSOC);
$program_id = $row["program_id"];

// Delete eisurvey
$delete_eisurvey_sql = "DELETE FROM eisurvey WHERE belong_to = $program_id";
mysql_query($delete_eisurvey_sql, $conn);

// Delete eisurvey_calculation
$delete_eisurvey_calculation_sql = "DELETE FROM eisurvey_calculation WHERE belong_to = $program_id";
mysql_query($delete_eisurvey_calculation_sql, $conn);

// Delete population
$delete_population_sql = "DELETE FROM population WHERE belong_to = $program_id";
mysql_query($delete_population_sql, $conn);

// Delete program
$delete_program_sql = "DELETE FROM program WHERE program_id = $program_id";
mysql_query($delete_program_sql, $conn);

header("location: ../view_programs.php?user_id=$user_id");
?>
