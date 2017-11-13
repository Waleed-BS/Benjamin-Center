
<?php
include("../config.php");

$program_descriptionError = "";
$populationError = "";
$serviceError = "";
$annual_costError = "";
$total_clientsError = "";
$impactError = "";
$likelihoodError = "";

// ~~ SESSION VARIABLES
if(!isset($_SESSION)) {
  session_start();
}

if(!empty($_SESSION["program_id_session"])) {
  $program_id = $_SESSION["program_id_session"];
}

if(!empty($_SESSION["owner_session"])) {
  $owner = $_SESSION["owner_session"];
}

echo $_POST["Program_name1"];

if( $_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST["Program_name"])
&& !empty($_POST["Description"]) ) {

  // ~~~~~~~~~~~~~~ Population 1 ~~~~~~~~~~~~~~
  if( !empty($_POST["Population1"])
  || !empty($_POST["Service1"])
  || !empty($_POST["Impact1"]) ) {

    // if( $_POST["Annualcost1"] == false )
    // {
    //     $_POST["Annualcost1"] = 0;
    // }
    // if( $_POST["Totalclients1"] == false )
    // {
    //     $_POST["Totalclients1"] = 0;
    // }
    // if( $_POST["Likelihood1"] == false )
    // {
    //     $_POST["Likelihood1"] = 0;
    // }



    if( !empty($_POST["Population1"])
    && !empty($_POST["Service1"])
    && !empty($_POST["Impact1"]) ){

      $population = $_POST['Population1'];
      $service = $_POST['Service1'];
      $annual_cost = $_POST['Annualcost1'];
      $total_clients = $_POST['Totalclients1'];
      $impact = $_POST['Impact1'];
      $likelihood = $_POST['Likelihood1'];

      $create_population_sql = "INSERT INTO population (
        belong_to, population, service, annual_cost,
        individual_served, impact, likelihood
      ) VALUES (
        '$program_id', '$population', '$service', '$annual_cost',
        $total_clients, '$impact', '$likelihood'
      )";

      $retval = mysql_query( $create_population_sql, $conn);

      if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
      }

      header("location: ../view_programs.php?user_id=$owner");

    } elseif( empty($_POST["Population1"]) || empty($_POST["Service1"]) || empty($_POST["Impact1"]) ) {
      $row1_error = "Failed to upload to database, this row was missing an input";

      session_start();
      $_SESSION["row1_error_session"] = $row1_error;

      header("location: ../program.php?program_id=$program_id");
    }

  } // end of if of Population 1

  // ~~~~~~~~~~~~~~ Population 2 ~~~~~~~~~~~~~~
  if( !empty($_POST["Population2"])
  || !empty($_POST["Service2"])
  || !empty($_POST["Impact2"]) ) {

    // set integers to 0 if input is empty
    if( $_POST["Annualcost2"] == false )
    {
        // echo " Annualcost1 doesn't exist ";
        $_POST["Annualcost2"] = 0;
    }
    if( $_POST["Totalclients2"] == false )
    {
        // echo " Totalclients1 doesn't exist ";
        $_POST["Totalclients2"] = 0;
    }
    if( $_POST["Likelihood2"] == false )
    {
        // echo " Likelihood1 doesn't exist ";
        $_POST["Likelihood2"] = 0;
    }

    if( !empty($_POST["Population2"])
    && !empty($_POST["Service2"])
    && !empty($_POST["Impact2"]) ) {

      $population = $_POST['Population2'];
      $service = $_POST['Service2'];
      $annual_cost = $_POST['Annualcost2'];
      $total_clients = $_POST['Totalclients2'];
      $impact = $_POST['Impact2'];
      $likelihood = $_POST['Likelihood2'];

      $create_population_sql = "INSERT INTO population (
        belong_to, population, service, annual_cost,
        individual_served, impact, likelihood
      ) VALUES (
        '$program_id', '$population', '$service', '$annual_cost',
        $total_clients, '$impact', '$likelihood'
      )";

      $retval = mysql_query( $create_population_sql, $conn);

      if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
      }

      header("location: ../view_programs.php?user_id=$owner");

    } elseif( empty($_POST["Population2"]) || empty($_POST["Service1"]) || empty($_POST["Impact2"]) ) {

      $row2_error = "Failed to upload to database, this row was missing an input";
      session_start();
      $_SESSION["row2_error_session"] = $row2_error;

      header("location: ../program.php?program_id=$program_id");

    }

  } // end of population 2

  // ~~~~~~~~~~~~~~ Population 3 ~~~~~~~~~~~~~~
  if( !empty($_POST["Population3"])
  || !empty($_POST["Service3"])
  || !empty($_POST["Impact3"]) ) {

    // set integers to 0 if input is empty
    if( $_POST["Annualcost3"] == false )
    {
      // echo " Annualcost1 doesn't exist ";
      $_POST["Annualcost3"] = 0;
    }
    if( $_POST["Totalclients3"] == false )
    {
      // echo " Totalclients1 doesn't exist ";
      $_POST["Totalclients3"] = 0;
    }
    if( $_POST["Likelihood3"] == false )
    {
      // echo " Likelihood1 doesn't exist ";
      $_POST["Likelihood3"] = 0;
    }

    if( !empty($_POST["Population3"])
    && !empty($_POST["Service3"])
    && !empty($_POST["Impact3"]) ) {

      $population = $_POST['Population3'];
      $service = $_POST['Service3'];
      $annual_cost = $_POST['Annualcost3'];
      $total_clients = $_POST['Totalclients3'];
      $impact = $_POST['Impact3'];
      $likelihood = $_POST['Likelihood3'];

      $create_population_sql = "INSERT INTO population (
        belong_to, population, service, annual_cost,
        individual_served, impact, likelihood
      ) VALUES (
        '$program_id', '$population', '$service', '$annual_cost',
        $total_clients, '$impact', '$likelihood'
      )";

      $retval = mysql_query( $create_population_sql, $conn);

      if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
      }

      // header("location: ../view_programs.php?user_id=$owner");
      header("location: ../program.php?program_id=$program_id");

    } elseif( empty($_POST["Population3"]) || empty($_POST["Service3"]) || empty($_POST["Impact3"]) ) {

      "Failed to upload to database, this row was missing an input";
      session_start();
      $_SESSION["row3_error_session"] = $row3_error;

      header("location: ../program.php?program_id=$program_id");

    }

  } // end of population 3

  // ~~~~~~~~~~~~~~ Population 4 ~~~~~~~~~~~~~~
  if( !empty($_POST["Population4"])
  || !empty($_POST["Service4"])
  || !empty($_POST["Impact4"]) ) {

    // set integers to 0 if input is empty
    if( $_POST["Annualcost4"] == false )
    {
      // echo " Annualcost1 doesn't exist ";
      $_POST["Annualcost4"] = 0;
    }
    if( $_POST["Totalclients4"] == false )
    {
      // echo " Totalclients1 doesn't exist ";
      $_POST["Totalclients4"] = 0;
    }
    if( $_POST["Likelihood4"] == false )
    {
      // echo " Likelihood1 doesn't exist ";
      $_POST["Likelihood4"] = 0;
    }

    if( !empty($_POST["Population4"])
    && !empty($_POST["Service4"])
    && !empty($_POST["Impact4"]) ) {

      $population = $_POST['Population4'];
      $service = $_POST['Service4'];
      $annual_cost = $_POST['Annualcost4'];
      $total_clients = $_POST['Totalclients4'];
      $impact = $_POST['Impact4'];
      $likelihood = $_POST['Likelihood4'];

      $create_population_sql = "INSERT INTO population (
        belong_to, population, service, annual_cost,
        individual_served, impact, likelihood
      ) VALUES (
        '$program_id', '$population', '$service', '$annual_cost',
        $total_clients, '$impact', '$likelihood'
      )";

      $retval = mysql_query( $create_population_sql, $conn);

      if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
      }

      // header("location: ../view_programs.php?user_id=$owner");
      header("location: ../program.php?program_id=$program_id");

    } elseif( empty($_POST["Population4"]) || empty($_POST["Service4"]) || empty($_POST["Impact4"]) ) {

      "Failed to upload to database, this row was missing an input";

      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION["row4_error_session"] = $row4_error;

      header("location: ../program.php?program_id=$program_id");

    }

  } // end of population 4

  // ~~~~~~~~~~~~~~ Population 5 ~~~~~~~~~~~~~~
  if( !empty($_POST["Population5"])
  || !empty($_POST["Service5"])
  || !empty($_POST["Impact5"]) ) {

    // set integers to 0 if input is empty
    if( $_POST["Annualcost5"] == false )
    {
      // echo " Annualcost1 doesn't exist ";
      $_POST["Annualcost5"] = 0;
    }
    if( $_POST["Totalclients5"] == false )
    {
      // echo " Totalclients1 doesn't exist ";
      $_POST["Totalclients5"] = 0;
    }
    if( $_POST["Likelihood5"] == false )
    {
      // echo " Likelihood1 doesn't exist ";
      $_POST["Likelihood5"] = 0;
    }

    if( !empty($_POST["Population5"])
    && !empty($_POST["Service5"])
    && !empty($_POST["Impact5"]) ) {

      $population = $_POST['Population5'];
      $service = $_POST['Service5'];
      $annual_cost = $_POST['Annualcost5'];
      $total_clients = $_POST['Totalclients5'];
      $impact = $_POST['Impact5'];
      $likelihood = $_POST['Likelihood5'];

      $create_population_sql = "INSERT INTO population (
        belong_to, population, service, annual_cost,
        individual_served, impact, likelihood
      ) VALUES (
        '$program_id', '$population', '$service', '$annual_cost',
        $total_clients, '$impact', '$likelihood'
      )";

      $retval = mysql_query( $create_population_sql, $conn);

      if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
      }

      // header("location: ../view_programs.php?user_id=$owner");
      header("location: ../program.php?program_id=$program_id");

    } elseif( empty($_POST["Population5"]) || empty($_POST["Service5"]) || empty($_POST["Impact5"]) ) {

      "Failed to upload to database, this row was missing an input";
      session_start();
      $_SESSION["row3_error_session"] = $row5_error;

      header("location: ../program.php?program_id=$program_id");

    }

  } // end of population 5

  // ~~~~~~~~~~~~~~ Population 6 ~~~~~~~~~~~~~~
  if( !empty($_POST["Population6"])
  || !empty($_POST["Service6"])
  || !empty($_POST["Impact6"]) ) {

    // set integers to 0 if input is empty
    if( $_POST["Annualcost6"] == false )
    {
      // echo " Annualcost1 doesn't exist ";
      $_POST["Annualcost6"] = 0;
    }
    if( $_POST["Totalclients6"] == false )
    {
      // echo " Totalclients1 doesn't exist ";
      $_POST["Totalclients6"] = 0;
    }
    if( $_POST["Likelihood6"] == false )
    {
      // echo " Likelihood1 doesn't exist ";
      $_POST["Likelihood6"] = 0;
    }

    if( !empty($_POST["Population6"])
    && !empty($_POST["Service6"])
    && !empty($_POST["Impact6"]) ) {

      $population = $_POST['Population6'];
      $service = $_POST['Service6'];
      $annual_cost = $_POST['Annualcost6'];
      $total_clients = $_POST['Totalclients6'];
      $impact = $_POST['Impact6'];
      $likelihood = $_POST['Likelihood6'];

      $create_population_sql = "INSERT INTO population (
        belong_to, population, service, annual_cost,
        individual_served, impact, likelihood
      ) VALUES (
        '$program_id', '$population', '$service', '$annual_cost',
        $total_clients, '$impact', '$likelihood'
      )";

      $retval = mysql_query( $create_population_sql, $conn);

      if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
      }

      // header("location: ../view_programs.php?user_id=$owner");
      header("location: ../program.php?program_id=$program_id");

    } elseif( empty($_POST["Population6"]) || empty($_POST["Service6"]) || empty($_POST["Impact6"]) ) {

      "Failed to upload to database, this row was missing an input";
      session_start();
      $_SESSION["row3_error_session"] = $row6_error;

      header("location: ../program.php?program_id=$program_id");

    }

  } // end of population 6

  $program_name = $_POST["Program_name"];
  $program_description = $_POST["Description"];
  $set_program_name_and_description_sql = "UPDATE program SET program_name = '$program_name', program_description='$program_description' WHERE program_id = '$program_id'";
  $retval = mysql_query( $set_program_name_and_description_sql, $conn);
  mysql_close($conn);

  // header("location: ../view_programs.php?user_id=$owner");
  header("location: ../program.php?program_id=$program_id");

} else {

  // echo("<script>alert('Description of program is required. ')</script>");
  echo("<script>window.location = '../program.php?program_id=$program_id';</script>");

}

?>
