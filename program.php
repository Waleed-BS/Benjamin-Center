<html>
<body>

<?php
include "index.php";
include "config.php";

// executes only when "new program button" is clicked
if( !empty($_GET['user_id']) ) {
  echo "test";
}

// get current id
$program_id = $_GET["program_id"];

// session to use program id and owner id in program_action
if(!isset($_SESSION)) {
  session_start();
}
$_SESSION["program_id_session"] = $program_id;

// ~~ fetch program name to be displayed

$program_name_sql =
" SELECT program_name, owner, program_description, population_served FROM program WHERE program_id = $program_id";

$retval = mysql_query($program_name_sql, $conn);

$row = mysql_fetch_array($retval, MYSQL_ASSOC);

$program_name = $row['program_name'];
$program_description = $row["program_description"];
$population_served = $row["population_served"];
// used to fetch user name below + to return to programs after submitting
$owner = $row['owner'];

$_SESSION["owner_session"] = $owner;
// fetch user name to be displayed on the top
$user_name_sql =
" SELECT user_name, editProgram FROM user WHERE user_id = " . $owner;

$retval = mysql_query($user_name_sql, $conn);
$row = mysql_fetch_array($retval, MYSQL_ASSOC);
$user_name = $row['user_name'];
$program_edit = $row["editProgram"];

?>

<div class="container" style="background-color: white; margin-top: 3%;">

  </br>
  <h2>Site: <?php echo $user_name ?></h2>
  </br>

  <form method="POST" action="./actions/program_action.php">

    <p style="margin-left: 10">Thank you for your assistance conducting the Family Partnership Center,
    Social Return on Investment (SROI) and Economic Investment (EI) Survey.
    Please do your best to answer every question below. Where exact amounts are not available,
     please make your best estimate. </p>
     <br>

    <!-- Program Name -->
    <div class="form-group">
      <label for="Program_name">Program Name</label>
      <?php if( !empty($program_name) && $program_edit == "No") { ?>
        <input type="text" class="form-control" rows="1" id="program_name" name="Program_name" value="<?php echo $program_name; ?>" readonly></input>
      <?php } else { ?>
        <input type="text" class="form-control" rows="1" id="program_name" name="Program_name" value="<?php echo $program_name; ?>" ></input>
      <?php } ?>
    </div>

    <!-- Program Description -->

    <div class="form-group">
      <label for="Program_description">Briefly describe your program or state your mission</label>
      <?php if( !empty($program_description) ) { ?>
      <textarea class="form-control" id="description" name="Description" rows="4"><?php echo $program_description; ?> </textarea>
      <?php } else { ?>
      <textarea class="form-control" id="description" name="Description" rows="3"></textarea>
      <?php } ?>
    </div>

    <p>Below, please think of the populations you serve (e.g. mothers, infants, homeless etc.) You will be asked several questions regarding each population you serve.</p>
    <div class="form-group">
      <label for="population_served">Population (please briefly describe)</label>

      <?php if( !empty($population_served) ) { ?>
        <input type="text" placeholder=" e.g. homeless adults"
        class="form-control" id="population_served" name="Population_served" rows="3" value="<?php echo $population_served; ?>"></input>
      <?php } else { ?>
        <input type="text" placeholder=" e.g. homeless adults"
        class="form-control" id="population_served" name="Population_served" rows="3"></input>
      <?php } ?>

    </div>

    <p>For Population above, please list the services you provide (e.g. meals. vaccinations, tansportation, job placement etc.)
     If there are less than siz, leave those spaces blank. If there are more than 6 </p>


    <div id="populationtable1"></div>
    <!-- <div id="populationtable2"></div> -->

    <!-- Submit Button -->
    <div class="form-group">
      <input type="submit" onClick="validateData()" value="Submit" class="form-control btn btn-primary" id="submit_program" name="Submit_program" rows="3"></input>
    </div>

  </form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

$(function(){
  $("#populationtable1").load("populationtable.php");

});

// $(function(){
//   $("#yesExtra").click(function(){
//     $("#populationtable2").load("_populationtable2.html");
//   });
// });

function validateData() {

  let program_name = document.getElementById("program_name").value;
  let description = document.getElementById("description").value;

  let population_served = document.getElementById("population_served").value;

  let population1 = document.getElementById("population1").value;
  let service1 = document.getElementById("service1").value;
  let annualcost1 = document.getElementById("annualcost1").value;
  let totalclients1 = document.getElementById("totalclients1").value;
  let impact1 = document.getElementById("impact1").value;
  let likelihood1 = document.getElementById("likelihood1").value;

  let population2 = document.getElementById("population2").value;
  let service2 = document.getElementById("service2").value;
  let annualcost2 = document.getElementById("annualcost2").value;
  let totalclients2 = document.getElementById("totalclients2").value;
  let impact2 = document.getElementById("impact2").value;
  let likelihood2 = document.getElementById("likelihood2").value;

  let population3 = document.getElementById("population3").value;
  let service3 = document.getElementById("service3").value;
  let annualcost3 = document.getElementById("annualcost3").value;
  let totalclients3 = document.getElementById("totalclients3").value;
  let impact3 = document.getElementById("impact3").value;
  let likelihood3 = document.getElementById("likelihood3").value;

  let population4 = document.getElementById("population4").value;
  let service4 = document.getElementById("service4").value;
  let annualcost4 = document.getElementById("annualcost4").value;
  let totalclients4 = document.getElementById("totalclients4").value;
  let impact4 = document.getElementById("impact4").value;
  let likelihood4 = document.getElementById("likelihood4").value;

  let population5 = document.getElementById("population5").value;
  let service5 = document.getElementById("service5").value;
  let annualcost5 = document.getElementById("annualcost5").value;
  let totalclients5 = document.getElementById("totalclients5").value;
  let impact5 = document.getElementById("impact5").value;
  let likelihood5 = document.getElementById("likelihood5").value;

  let population6 = document.getElementById("population6").value;
  let service6 = document.getElementById("service6").value;
  let annualcost6 = document.getElementById("annualcost6").value;
  let totalclients6 = document.getElementById("totalclients6").value;
  let impact6 = document.getElementById("impact6").value;
  let likelihood6 = document.getElementById("likelihood6").value;

  if( program_name == "") {
    alert("Program name input is required");
    event.preventDefault();
    return false;
  }
  if( description == "") {
    alert("Description input is required");
    event.preventDefault();
    return false;
  }
  if( population_served == "") {
    alert("Description of population input is required");
    event.preventDefault();
    return false;
  }

  if( population1 != "" || service1 != "" || annualcost1 != "" || totalclients1 != "" || impact1 != "" || likelihood1 != "" ) {
    if( population1 == "" || service1 == "" || annualcost1 == "" || totalclients1 == "" || impact1 == "" || likelihood1 == "" ) {
      alert("Service 1 is missing an input");
      event.preventDefault();
      return false;
    }
  }

  if( population2 != "" || service2 != "" || annualcost2 != "" || totalclients2 != "" || impact2 != "" || likelihood2 != "" ) {
    if( population2 == "" || service2 == "" || annualcost2 == "" || totalclients2 == "" || impact2 == "" || likelihood2 == "" ) {
      alert("Service 2 is missing an input");
      event.preventDefault();
      return false;
    }
  }

  if( population3 != "" || service3 != "" || annualcost3 != "" || totalclients3 != "" || impact3 != "" || likelihood3 != "" ) {
    if( population3 == "" || service3 == "" || annualcost3 == "" || totalclients3 == "" || impact3 == "" || likelihood3 == "" ) {
      alert("Service 3 is missing an input");
      event.preventDefault();
      return false;
    }
  }

  if( population4 != "" || service4 != "" || annualcost4 != "" || totalclients4 != "" || impact4 != "" || likelihood4 != "" ) {
    if( population4 == "" || service4 == "" || annualcost4 == "" || totalclients4 == "" || impact4 == "" || likelihood4 == "" ) {
      alert("Service 4 is missing an input");
      event.preventDefault();
      return false;
    }
  }

  if( population5 != "" || service5 != "" || annualcost5 != "" || totalclients5 != "" || impact5 != "" || likelihood5 != "" ) {
    if( population5 == "" || service5 == "" || annualcost5 == "" || totalclients5 == "" || impact5 == "" || likelihood5 == "" ) {
      alert("Service 5 is missing an input");
      event.preventDefault();
      return false;
    }
  }

  if( population6 != "" || service6 != "" || annualcost6 != "" || totalclients6 != "" || impact6 != "" || likelihood6 != "" ) {
    if( population6 == "" || service6 == "" || annualcost6 == "" || totalclients6 == "" || impact6 == "" || likelihood6 == "" ) {
      alert("Service 6 is missing an input");
      event.preventDefault();
      return false;
    }
  }

  alert("Data entered successfully.\nServices input are resetted.\nInput more services if available")
  // ~~~~~~~ todo: a fucntion to animate to the first error message

  // if( (population1 != "") || (service1 != "") || (impact1 != "") ) {
  //
  //   if( population1 == "") {
  //     alert("Failed to upload to database, one row of data was missing an input");
  //     event.preventDefault();
  //     $('form').animate({
  //       scrollTop: $("#input").offset().top
  //     }, 1000);
  //
  //     return false;
  //   }
  //
  // }

}

</script>

</body>
</html>
