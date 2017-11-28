<?php
include "../config.php";

if(!isset($_SESSION)) {
  session_start();
}

if(!empty($_SESSION["program_id_session"])) {
  $program_id = $_SESSION["program_id_session"];
}


if($_SERVER["REQUEST_METHOD"] == "POST") {

  // $createuser_sql = "INSERT INTO user (user_name, description, editProgram)
  // VALUES('$username', '$description', '$editProgram')";

  $vendorSpendingExpenditureCOUNTY = $_POST["VendorSpendingExpenditureCOUNTY"];
  $vendorSpendingOutputCOUNTY = $_POST["VendorSpendingOutputCOUNTY"];
  $vendorSpendingJobsCOUNTY = $_POST["VendorSpendingJobsCOUNTY"];

  $vendorSpendingExpenditureNY = $_POST["VendorSpendingExpenditureNY"];
  $vendorSpendingOutputNY = $_POST["VendorSpendingOutputNY"];
  $vendorSpendingJobsNY = $_POST["VendorSpendingJobsNY"];

  $employeeSalaryExpenditureCOUNTY = $_POST["EmployeeSalaryExpenditureCOUNTY"];
  $employeeSalaryOutputCOUNTY = $_POST["EmployeeSalaryOutputCOUNTY"];
  $employeeSalaryJobsCOUNTY = $_POST["EmployeeSalaryJobsCOUNTY"];

  $employeeSalaryExpenditureNY = $_POST["EmployeeSalaryExpenditureNY"];
  $employeeSalaryOutputNY = $_POST["EmployeeSalaryOutputNY"];
  $employeeSalaryJobsNY = $_POST["EmployeeSalaryJobsNY"];

  $totalExpenditureCOUNTY = $_POST["TotalExpenditureCOUNTY"];
  $totalOutputCOUNTY = $_POST["TotalOutputCOUNTY"];
  $totalJobsCOUNTY = $_POST["TotalJobsCOUNTY"];
  $totalExpenditureNY = $_POST["TotalExpenditureNY"];
  $totalOutputNY = $_POST["TotalOutputNY"];
  $totalJobsNY = $_POST["TotalJobsNY"];

  $include_total = $_POST["IncludeTotal"];

  // Initilize total to 0 (default) if not inputted
  if( empty($totalExpenditureCOUNTY) ) {
    $totalExpenditureCOUNTY = 0;
  }
  if ( empty($totalOutputCOUNTY) ) {
    $totalOutputCOUNTY = 0;
  }
  if ( empty($totalJobsCOUNTY) ) {
    $totalJobsCOUNTY = 0;
  }
  if ( empty($totalExpenditureNY) ) {
    $totalExpenditureNY = 0;
  }
  if ( empty($totalOutputNY) ) {
    $totalOutputNY = 0;
  }
  if ( empty($totalJobsNY) ) {
    $totalJobsNY = 0;
  }

  // -- totalExpenditureCOUNTY, totalOutputCOUNTY, totalJobsCOUNTY, totalExpenditureNY, totalOutputNY, totalJobsNY

  $select_eisurvey_calculation_sql = "SELECT * FROM eisurvey_calculation WHERE belong_to = '$program_id'";
  $retval = mysql_query( $select_eisurvey_calculation_sql, $conn );

  $num_of_rows = mysql_num_rows($retval);
  // echo $num_of_rows;

  if($num_of_rows == 1) {

    $update_eisurvey_calculation_sql = "UPDATE eisurvey_calculation SET
    vendorSpendingExpenditureCOUNTY = $vendorSpendingExpenditureCOUNTY,
    vendorSpendingOutputCOUNTY = $vendorSpendingOutputCOUNTY,
    vendorSpendingJobsCOUNTY = $vendorSpendingJobsCOUNTY,

    vendorSpendingExpenditureNY = $vendorSpendingExpenditureNY,
    vendorSpendingOutputNY = $vendorSpendingOutputNY,
    vendorSpendingJobsNY = $vendorSpendingJobsNY,

    employeeSalaryExpenditureCOUNTY = $employeeSalaryExpenditureCOUNTY,
    employeeSalaryOutputCOUNTY = $employeeSalaryOutputCOUNTY,
    employeeSalaryJobsCOUNTY = $employeeSalaryJobsCOUNTY,

    employeeSalaryExpenditureNY = $employeeSalaryExpenditureNY,
    employeeSalaryOutputNY = $employeeSalaryOutputNY,
    employeeSalaryJobsNY = $employeeSalaryJobsNY,

    totalExpenditureCOUNTY = $totalExpenditureCOUNTY,
    totalOutputCOUNTY = $totalOutputCOUNTY,
    totalJobsCOUNTY = $totalJobsCOUNTY,
    totalExpenditureNY = $totalExpenditureNY,
    totalOutputNY = $totalOutputNY,
    totalJobsNY = $totalJobsNY,
    include_total = '$include_total'
    WHERE belong_to = '$program_id'";
    $retval = mysql_query( $update_eisurvey_calculation_sql, $conn );

    if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
    }

    mysql_close($conn);

    header("location: ../program_output.php?program_id=$program_id");

  } else {

    $create_eisurvey_calculation_sql = "INSERT INTO eisurvey_calculation (
      belong_to,

      vendorSpendingExpenditureCOUNTY, vendorSpendingOutputCOUNTY, vendorSpendingJobsCOUNTY,
      vendorSpendingExpenditureNY, vendorSpendingOutputNY, vendorSpendingJobsNY,

      employeeSalaryExpenditureCOUNTY, employeeSalaryOutputCOUNTY, employeeSalaryJobsCOUNTY,
      employeeSalaryExpenditureNY, employeeSalaryOutputNY, employeeSalaryJobsNY,

      totalExpenditureCOUNTY, totalOutputCOUNTY, totalJobsCOUNTY,
      totalExpenditureNY, totalOutputNY, totalJobsNY,

      include_total

    ) VALUES (
      '$program_id',

      '$vendorSpendingExpenditureCOUNTY', '$vendorSpendingOutputCOUNTY', '$vendorSpendingJobsCOUNTY',
      '$vendorSpendingExpenditurNY', '$vendorSpendingOutputNY', '$vendorSpendingJobsNY',

      '$employeeSalaryExpenditureCOUNTY', '$employeeSalaryOutputCOUNTY', '$employeeSalaryJobsCOUNTY',
      '$employeeSalaryExpenditureNY', '$employeeSalaryOutputNY', '$employeeSalaryJobsNY',

      '$totalExpenditureCOUNTY', '$totalOutputCOUNTY', '$totalJobsCOUNTY',
      '$totalExpenditureNY', '$totalOutputNY', '$totalJobsNY',
      '$include_total'
    )";

    // "UPDATE population SET value = $values[$i] WHERE population_id = $population_id";
    $retval = mysql_query( $create_eisurvey_calculation_sql, $conn );

    if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
    }

    mysql_close($conn);

    header("location: ../program_output.php?program_id=$program_id");

  }

}



?>
