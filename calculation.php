<?php
include("index.php");
include("config.php");

$program_id = $_GET["program_id"];

if(!isset($_SESSION)) {
  session_start();
}

$_SESSION["program_id_session"] = $program_id;

$select_eisurvey_calculation_sql = "SELECT * FROM eisurvey_calculation WHERE belong_to = '$program_id'";
$retval = mysql_query( $select_eisurvey_calculation_sql, $conn );
$row = mysql_fetch_array($retval, MYSQL_ASSOC);
$vendorSpendingExpenditureCOUNTY = $row["vendorSpendingExpenditureCOUNTY"];
$vendorSpendingOutputCOUNTY = $row["vendorSpendingOutputCOUNTY"];
$vendorSpendingJobsCOUNTY = $row["vendorSpendingJobsCOUNTY"];

$vendorSpendingExpenditureNY = $row["vendorSpendingExpenditureNY"];
$vendorSpendingOutputNY = $row["vendorSpendingOutputNY"];
$vendorSpendingJobsNY = $row["vendorSpendingJobsNY"];

$employeeSalaryExpenditureCOUNTY = $row["employeeSalaryExpenditureCOUNTY"];
$employeeSalaryOutputCOUNTY = $row["employeeSalaryOutputCOUNTY"];
$employeeSalaryJobsCOUNTY = $row["employeeSalaryJobsCOUNTY"];

$employeeSalaryExpenditureNY = $row["employeeSalaryExpenditureNY"];
$employeeSalaryOutputNY = $row["employeeSalaryOutputNY"];
$employeeSalaryJobsNY = $row["employeeSalaryJobsNY"];

$totalExpenditureCOUNTY = $row["totalExpenditureCOUNTY"];
$totalOutputCOUNTY = $row["totalOutputCOUNTY"];
$totalJobsCOUNTY = $row["totalJobsCOUNTY"];
$totalExpenditureNY = $row["totalExpenditureNY"];
$totalOutputNY = $row["totalOutputNY"];
$totalJobsNY = $row["totalJobsNY"];
$num_of_rows_of_ei = mysql_num_rows($retval);

$select_population_sql = "SELECT * FROM population WHERE belong_to = $program_id";
$retval = mysql_query( $select_population_sql, $conn);
// fetch multiple rows of populations data
$i = 0;
while( $process =  @mysql_fetch_assoc($retval) ) {
  $row[$i] = $process;

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

  <form method="POST" action="./actions/ei_calculation_action.php">

    <table class="table table-bordered" style="text-align: center; margin-top: 60;">
    <thead style="margin-top: 30;">

      <tr >
        <th style="vertical-align: middle; font-weight: bold"> Economic Impact </th>
        <th style="vertical-align: middle; font-weight: bold"> <u> Dutchess County </u> </th>
        <th> </th>
        <th> </th>
        <th style="vertical-align: middle; font-weight: bold"> <u> New York </u> </th>
        <th> </th>
        <th style="text-align: center;"> </th>
      </tr>
      <tr>
        <th style="text-align: center; width: 270;">Include on Output? Yes/No</th>
        <th style="text-align: center;">Expenditure</th>
        <th style="text-align: center; ">Output</th>
        <th style="text-align: center;">Jobs</th>
        <th style="text-align: center;">Expenditure</th>
        <th style="text-align: center;">Output</th>
        <th style="text-align: center;">Jobs</th>
      </tr>

    </thead>
    <tbody>

      <tr>
        <td> Vendor Spending </td>
        <td>
          <input type="number" id="vendorSpendingExpenditureCOUNTY" name="VendorSpendingExpenditureCOUNTY" class="form-control" rows="1" required
          <?php if ($num_of_rows_of_ei == 1) { ?>
          value="<?php echo $vendorSpendingExpenditureCOUNTY  ?>"
          <?php } ?>
          ></input>
        </td>
        <td>
          <input type="number" id="vendorSpendingOutputCOUNTY" name="VendorSpendingOutputCOUNTY" class="form-control" rows="1" required
          <?php if ($num_of_rows_of_ei == 1) { ?>
          value="<?php echo $vendorSpendingOutputCOUNTY ?>"
          <?php } ?>
          ></input>
        </td>
        <td>
          <input type="number" id="vendorSpendingJobsCOUNTY" name="VendorSpendingJobsCOUNTY" class="form-control" rows="1" required
          <?php if ($num_of_rows_of_ei == 1) { ?>
          value="<?php echo $vendorSpendingJobsCOUNTY ?>"
          <?php } ?>
          ></input>
        </td>
        <td>
          <input type="number" id="vendorSpendingExpenditureNY" name="VendorSpendingExpenditureNY" class="form-control" rows="1" required
          <?php if ($num_of_rows_of_ei == 1) { ?>
          value="<?php echo $vendorSpendingExpenditureNY ?>"
          <?php } ?>
          ></input>
        </td>
        <td>
          <input type="number" id="vendorSpendingOutputNY" name="VendorSpendingOutputNY" class="form-control" rows="1" required
          <?php if ($num_of_rows_of_ei == 1) { ?>
          value="<?php echo $vendorSpendingOutputNY ?>"
          <?php } ?>
          ></input>
        </td>
        <td>
          <input type="number" id="vendorSpendingJobsNY" name="VendorSpendingJobsNY" class="form-control" rows="1" required
          <?php if ($num_of_rows_of_ei == 1) { ?>
          value="<?php echo $vendorSpendingJobsNY ?>"
          <?php } ?>
          ></input>
        </td>
      </tr>

      <tr style="background-color: white !important">
        <td> Employee Salary </td>
        <td>
          <input type="number" id="employeeSalaryExpenditureCOUNTY" name="EmployeeSalaryExpenditureCOUNTY" class="form-control" rows="1" required
          value="<?php echo $employeeSalaryExpenditureCOUNTY ?>"></input>
        </td>
        <td>
          <input type="number" id="employeeSalaryOutputCOUNTY" name="EmployeeSalaryOutputCOUNTY" class="form-control" rows="1" required
          value="<?php echo $employeeSalaryOutputCOUNTY ?>"></input>
        </td>
        <td>
          <input type="number" id="employeeSalaryJobsCOUNTY" name="EmployeeSalaryJobsCOUNTY" class="form-control" rows="1" required
          value="<?php echo $employeeSalaryJobsCOUNTY ?>"></input>
        </td>
        <td>
          <input type="number" id="employeeSalaryExpenditureNY" name="EmployeeSalaryExpenditureNY" class="form-control" rows="1" required
          value="<?php echo $employeeSalaryExpenditureNY ?>"></input>
        </td>
        <td>
          <input type="number" id="employeeSalaryOutputNY" name="EmployeeSalaryOutputNY" class="form-control" rows="1" required
          value="<?php echo $employeeSalaryOutputNY ?>"></input>
        </td>
        <td>
          <input type="number" id="employeeSalaryJobsNY" name="EmployeeSalaryJobsNY" class="form-control" rows="1" required
          value="<?php echo $employeeSalaryJobsNY ?>"></input>
        </td>
      </tr>

      <tr>
        <td> Total </td>
        <td>
          <input type="number" id="totalExpenditureCOUNTY"
          name="TotalExpenditureCOUNTY"
          class="form-control" rows="1"
          >
          </input>
        </td>
        <td>
          <input type="number" id="totalOutputCOUNTY"
          name="TotalOutputCOUNTY"
          class="form-control" rows="1">
          </input>
        </td>
        <td>
          <input type="number" id="totalJobsCOUNTY"
          name="TotalJobsCOUNTY"
          class="form-control" rows="1">
          </input>
        </td>
        <td>
          <input type="number" id="totalExpenditureNY"
          name="TotalExpenditureNY"
          class="form-control" rows="1">
          </input>
        </td>
        <td>
          <input type="number" id="totalOutputNY"
          name="TotalOutputNY"
          class="form-control" rows="1">
          </input>
        </td>
        <td>
          <input type="number" id="totalJobsNY"
          name="TotalJobsNY"
          class="form-control" rows="1">
          </input>
        </td>
      </tr>
    </tbody>
    </table>

    <label for="includdeTotal">Include Total to Program Output</label>
    <br>
    <input class="include-total" id="includeTotal" name="IncludeTotal" type="radio" value="Yes"> Yes</input>
    <input class="include-total" id="includeTotal" name="IncludeTotal" type="radio" value="No"> No</input>
    <br>
    <br>
    <input id="submitEI" name="SubmitEI" class="btn btn-primary form-control" value="Submit" type="submit"></input>

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
