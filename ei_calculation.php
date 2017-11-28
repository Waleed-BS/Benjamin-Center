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


<form method="POST" action="./actions/ei_calculation_action.php">
  <br>
  <table class="table table-bordered" style="text-align: center;">
  <thead>

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
