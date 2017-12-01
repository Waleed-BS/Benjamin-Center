<?php
include("index.php");
include("config.php");

$program_id = $_GET["program_id"];

if(!isset($_SESSION)) {
  session_start();
}

$_SESSION["program_id_session"] = $program_id;

$select_population_sql = "SELECT * FROM population WHERE belong_to = $program_id";
$retval = mysql_query( $select_population_sql, $conn);
// fetch multiple rows of populations data
$i = 0;
while( $process =  @mysql_fetch_assoc($retval) ) {
  $row[$i] = $process;

  $populations_id[$i] = $row[$i]['population_id'];
  $populations[$i] = $row[$i]['population'];
  $services[$i] = $row[$i]['service'];
  $annual_costs[$i] = $row[$i]['annual_cost'];
  $total_clients[$i] = $row[$i]['individual_served'];
  $impacts[$i] = $row[$i]['impact'];
  $likelihoods[$i] = $row[$i]['likelihood'];
  $values[$i] = $row[$i]['value'];

  $i++;

}

$_SESSION["populations_session"] = $populations;


if(! $retval) {
  die("Could not enter data: " . mysql_error());
}

$program_sql =
" SELECT program_name, owner FROM program WHERE program_id = $program_id";
$retval = mysql_query($program_sql, $conn);
$row = mysql_fetch_array($retval, MYSQL_ASSOC);
$program_name = $row["program_name"];
$owner = $row["owner"];

$user_sql =
" SELECT user_name FROM user WHERE user_id = $owner";
$retval = mysql_query($user_sql, $conn);
$row = mysql_fetch_array($retval, MYSQL_ASSOC);
$user_name = $row["user_name"];

mysql_close($conn);

?>

<div class="container" style="background-color: white; margin-top: 3%;">

  </br>
  <h2>Site: <?php echo $user_name ?></h2>
  <br>
  <h4>Program name: <?php echo $program_name ?></h4>
  </br>

  <form method="POST" action="./actions/calculation_action.php" onsubmit="validateData()">

    <table class="table table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle; font-weight: bold">Population</th>
        <th style="text-align: center; vertical-align: middle; font-weight: bold">Service</th>
        <th style="text-align: center; vertical-align: middle; font-weight: bold; width: 160">Annual Cost</th>
        <th style="text-align: center; vertical-align: middle; font-weight: bold">Individuals Served</th>
        <th style="text-align: center; vertical-align: middle; font-weight: bold; width: 110%">Impact</th>
        <th style="text-align: center; font-weight: bold">Likelihood of Outcome</th>
        <th style="text-align: center; vertical-align: middle; font-weight: bold">Value</th>
        <th style="text-align: center; vertical-align: middle; font-weight: bold">Adjusted Value</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if( isset($populations) && isset($services) && isset($annual_costs) && isset($total_clients) && isset($impacts) && isset($likelihoods) ) {
        ?>
        <?php
        for ($i = 0; $i < sizeof($populations); $i++) {
          ?>
          <tr> <!-- loop through all services -->

            <td><?php echo $populations[$i] ?></td>
            <td><?php echo $services[$i] ?></td>
            <td><?php echo "$" . number_format($annual_costs[$i]) ?></td>
            <td><?php echo number_format($total_clients[$i]) ?></td>
            <td style="font-size: 18"><?php echo $impacts[$i] ?></td>
            <td><?php echo $likelihoods[$i] . "%" ?></td>
            <td>
              <input type="number" id="value" name="Value<?php echo $i; ?>" class="ValueClass form-control" rows="1" required
              <?php if ( isset($values[$i]) ) { ?>
              value="<?php echo $values[$i]; ?>"
              <?php } ?>
              ></input>
            </td>
            <td>
              <label class="adjusted_valuesClass" id="adjusted_value<?php echo $i; ?>"></label>
            </td>

            <form style="marging: 0" method="POST" action="./actions/remove_SROI_action.php?population_id=<?php echo $populations_id[$i]; ?>">
              <td style="border-color: white;">
                <input type="submit" style="width: 100px;" class="btn btn-danger" value="Delete"></input>
              </td>
            </form>

          </tr>
          <?php
        }
        ?>
        <?php
      }
      ?>

      <tr>

        <td> Total </td>
        <td>  </td>
        <!--  sum all existed elements of array -->
        <?php if(isset($annual_costs)) { ?>
          <td><?php echo "$" . number_format(array_sum($annual_costs)) ?></td>
        <?php } ?>
        <?php if(isset($total_clients)) { ?>
          <td><?php echo number_format(array_sum($total_clients)) ?></td>
        <?php } ?>
        <td><?php echo "" ?></td>
        <td></td>
        <td>
          <input class="btn btn-info" value="Calculate" type="submit" onClick="calculate()"></input>
        </td>
        <td><label id="total_adjusted_values"> </label></td>

      </tr>
    </tbody>
    </table>

    <input id="submitSROI" name="SubmitSROI" class="btn btn-primary form-control" value="Submit" type="submit"></input>

  </form>

  <br>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

function calculate() {

  event.preventDefault();
  // get values from user input and put them into "values" array
  let inputs = document.getElementsByClassName('ValueClass')
  let values = [].map.call(inputs, function( input ) {
    return input.value;
  })

  // get "likelihoods" array in PHP and store it into "likelihoods" array in JS
  let likelihoods = new Array();
  <?php foreach($likelihoods as $key => $val) { ?>
    likelihoods.push('<?php echo $val; ?>');
  <?php } ?>
  // alert(likelihoods)

  let adjusted_values = new Array();
  for (i = 0; i < likelihoods.length; i++) {
    adjusted_values.push( parseInt( values[i] * (1 - likelihoods[i] / 100) ) ) ;
    // document.getElementsById("adjusted_value").innerHTML = "lol";
    document.getElementById("adjusted_value" + i).innerHTML = "$" + adjusted_values[i];
  }

  function getSumOfAdjustedValues(total, num) {
    return total + num;
  }

  document.getElementById("total_adjusted_values").innerHTML = "$" + adjusted_values.reduce(getSumOfAdjustedValues)
  // alert(adjusted_values);

}

</script>

<style>
th, td {
  /*padding: 10px;
  border: 1px solid black;*/
}

th {
  background-color: #FFAE5D;
  color: black;
  border: 1px solid black !important;
  /*color: white;*/
  font-family: 'Open Sans', sans-serif;
  font-size: 20;
  font-weight: 55;
  line-height: 25px;
  /*margin: 0 0 0px;*/
  text-align: center;
  vertical-align: middle;
}
td {
  border: 1px solid black !important;
  vertical-align: middle !important;
  font-size: 18;
}
tr:nth-child(even) {
  background-color: #f2f2f2
}

</style>
