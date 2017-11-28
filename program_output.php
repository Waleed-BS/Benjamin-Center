<?php
include "index.php";
include "session.php";
include "config.php";

$program_id = $_GET["program_id"];

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
  $values[$i] = $row[$i]['value']; // adds ',' every 3 digits and cuts decimal:
  $i++;
}

if(! $retval) {
  die("Could not enter data: " . mysql_error());
}


$program_sql =
" SELECT program_name, program_description, population_served, owner FROM program WHERE program_id = $program_id";
$retval = mysql_query($program_sql, $conn);
$row = mysql_fetch_array($retval, MYSQL_ASSOC);
$program_name = $row["program_name"];
$program_description = $row["program_description"];
$population_served = $row["population_served"];
$owner = $row["owner"];

// fetch SIsurvey data
$select_eisurvey_calculation = "SELECT * FROM eisurvey_calculation WHERE belong_to = $program_id";
$retval = mysql_query($select_eisurvey_calculation, $conn);
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

$include_total = $row["include_total"];

mysql_close($conn);

// get adjusted values
for ($i = 0; $i < sizeof($likelihoods); $i++) {
  $adjusted_values[$i] = (int)($values[$i] * (1 - $likelihoods[$i] / 100));
}

$sum_adjusted_values = array_sum($adjusted_values);
$sum_total_clients = array_sum($total_clients);
$sum_annual_costs = array_sum($annual_costs);

$SROI_ratio = round( ($sum_adjusted_values * $sum_total_clients) / $sum_annual_costs, 2 );

$sum_values = array_sum($values);
$sum_values = number_format($sum_values);

if( !isset($populations) && !isset($services) && !isset($annual_costs) && !isset($total_clients) && !isset($impacts) && !isset($likelihoods) && !isset($values) ) {
  header("location: view_programs.php?user_id=$owner");
}

?>


<br>

<br>

<table align="center" class="one table table-bordered" style="text-align: center;">

  <tr class="program-name">
    <th colspan=5 style="border-color: black; text-align: center; vertical-align: middle; border-bottom: black;">
      <?php echo strtoupper($program_name) ?>
    </th>
  </tr>

  <tr class="backgroundcolored">
    <th rowspan="<?php echo 4 + sizeof($populations); ?>" style="border: none"></th>
    <th style="text-align: center; vertical-align: middle; border-color: black; width: 1000px">SERVICE</th>
    <th style="text-align: center; vertical-align: middle; border-color: black; width: 3000px">IMPACT</th>
    <th style="text-align: center; width=200; vertical-align: middle; border-color: black; width: 2000px;">IMPACT VALUE</th>
    <th
        class="overall-goals"
        rowspan="<?php echo 4 + sizeof($populations); ?>"
        >
      <u>OVERALL GOALS</u> <br> <br> <unbold style="font-weight: normal"> <?php echo $program_description; ?> </unbold>
    </th>
  </tr>

  <?php
  if( isset($populations) && isset($services) && isset($annual_costs) && isset($total_clients) && isset($impacts) && isset($likelihoods) && isset($values) ) {
    ?>
    <?php
    for ($i = 0; $i < sizeof($services); $i++) {
      ?>

      <tr>
        <!-- show population only once -->
        <td class="population-data"><?php echo $services[$i] ?></td>
        <td class="population-data"><?php echo $impacts[$i] ?></td>
        <td class="population-data"><?php echo "$" . number_format($values[$i]) ?></td>
      </tr>
      <?php
    }
    ?>
    <?php
  }
  ?>
      <tr>
        <td style="border-right: none; border-top: solid 1px; border-bottom: none; background-color: white"></td>
        <!-- <td style="border: none; border-top: solid 2px; border-color: black; background-color: white"></td> -->
        <td style="border: none; text-align: right; vertical-align: middle; border-top: solid 1px; border-color: black; background-color: white; font-size: 18">TOTAL VALUE</td>
        <td style="border: none; vertical-align: middle; border-top: solid 1px; border-color: black; background-color: white"><?php echo "$1 :" . " $" . $sum_values ?></td>

      </tr>
      <tr style="color: white;">
        <!-- <td class="backgroundcolored" style="border-right: none; border-top: none; border-left: solid black 1px; border-bottom: solid black 1px;"></td> -->
        <td style="border: none; background-color: #E69138; border-bottom: solid black 1px;"></td>
        <td style="border-top: none; border-left: none; border-right: none; vertical-align: middle; background-color: #E69138; border-bottom: solid black 1px; font-weight: bold; font-size: 23">SROI RATIO</td>
        <td style="border: none; width: 300px; vertical-align: middle; background-color: #E69138; border-bottom: solid black 1px; font-weight: bold; font-size: 23"><?php echo $SROI_ratio . " : 1"?></td>
      </tr>
</table>
      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<table align="center" class="one table table-bordered" style="text-align: center;">

      <tr >
        <td class="economic-impact "> ECONOMIC IMPACT </td>
        <th class="EOJ" style="width: 200"> </th>
        <th class="EOJ" style="text-align: center;">EXPENDITURES</th>
        <th class="EOJ" style="text-align: center; ">OUTPUT</th>
        <th class="EOJ" style="text-align: center;">JOBS</th>
        <!-- <th> </th> -->
        <!-- <th style="text-align: center;"> </th> -->
        <th class="population-served" rowspan=10>
          <u>POPULATION(S) SERVED:</u> <br> <unbold style="font-weight: normal"> <?php echo $population_served; ?> </unbold> <br> <u>TOTAL:</u> <br>
          <unbold style="font-weight: normal"> <?php echo number_format($sum_total_clients) ; ?> </unbold>
        </th>
      </tr>
      <tr>
        <td class="dutchess-ny" rowspan=3> <u> Dutchess County </u> </td>
        <td class="backgroundcolored"> Vendor Spending </td>
        <td class="EI-data"> <?php echo "$", number_format($vendorSpendingExpenditureCOUNTY) ?> </td>
        <td class="EI-data">  <?php echo "$", number_format($vendorSpendingOutputCOUNTY) ?> </td>
        <td class="EI-data">  <?php echo "$", number_format($vendorSpendingJobsCOUNTY) ?> </td>

      </tr>
      <tr>
        <!-- <th style="text-align: center; width: 270;">Include on Output? Yes/No</th> -->
          <td class="backgroundcolored"> Employee Salary </td>
          <td class="EI-data"> <?php echo "$", number_format($employeeSalaryExpenditureCOUNTY) ?> </td>
          <td class="EI-data">  <?php echo "$", number_format($employeeSalaryOutputCOUNTY) ?> </td>
          <td class="EI-data">  <?php echo "$", number_format($employeeSalaryJobsCOUNTY) ?> </td>
      </tr>

      <?php if ($include_total == "Yes") { ?>
      <tr>
        <!-- <td></td> -->
        <td class="backgroundcolored"> Total </td>
        <td class="EI-data"> <?php echo "$", number_format($totalExpenditureCOUNTY) ?> </td>
        <td class="EI-data"> <?php echo "$", number_format($totalOutputCOUNTY) ?> </td>
        <td class="EI-data"> <?php echo "$", number_format($totalJobsCOUNTY) ?> </td>
      </tr>
      <?php } else {?>
      <tr>
        <!-- <td></td> -->
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important">  </td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important">  </td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important">  </td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important">  </td>
      </tr>
      <?php } ?>

      <tr>
        <td class="dutchess-ny" rowspan=3> <u> NEW YORK STATE </u> </td>
        <td class="backgroundcolored"> Vendor Spending </td>
        <td class="EI-data"> <?php echo "$", number_format($vendorSpendingExpenditureNY) ?> </td>
        <td class="EI-data">  <?php echo "$", number_format($vendorSpendingOutputNY) ?> </td>
        <td class="EI-data">  <?php echo "$", number_format($vendorSpendingJobsNY) ?> </td>
      </tr>

      <tr>
        <!-- <th style="vertical-align: middle;"> <u> </u> </th> -->
        <td class="backgroundcolored"> Employee Salary </td>
        <td class="EI-data"> <?php echo "$", number_format($employeeSalaryExpenditureNY) ?> </td>
        <td class="EI-data">  <?php echo "$", number_format($employeeSalaryOutputNY) ?> </td>
        <td class="EI-data">  <?php echo "$", number_format($employeeSalaryJobsNY) ?> </td>
      </tr>

      <?php if ($include_total == "Yes") { ?>
      <tr>
        <!-- <td> </td> -->
        <td class="backgroundcolored"> Total  </td>

        <td class="EI-data"> <?php echo "$", number_format($totalExpenditureNY) ?> </td>
        <td class="EI-data"> <?php echo "$", number_format($totalOutputNY) ?>  </td>
        <td class="EI-data"> <?php echo "$", number_format($totalJobsNY) ?>  </td>

      </tr>
      <?php } else { ?>
      <tr>
        <!-- <td> </td> -->
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important">   </td>

        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important">  </td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important">  </td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important">  </td>

      </tr>
      <?php } ?>
      <tr>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important"></td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important"></td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important"></td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important"></td>
        <td class="backgroundcolored" style="border-left: none !important; border-right: none !important"></td>

      </tr>





    </table>

  <br>


<style>

table.one{
  background-color: #FFAE5D;
  color: black;
  border: 1px solid black !important;
  /*color: white;*/
  font-family: 'Open Sans', sans-serif;
  font-size: 20;
  font-weight: 55;
  line-height: 20px;
  /*margin: 0 0 0px;*/
  text-align: center;
  vertical-align: middle;
  font-size: 15;
  /*max-height: 100%;*/
  /*height: 100%;*/
  /*height: 87%;*/
  /*float: left;*/
  /*width: 70%;*/
  background-color: white;
  /*position: relative;*/
  /*margin-left: 5%;*/
  /*display: inline-block;*/
  /*border: none;*/

}

.backgroundcolored {
    background-color: #134F5C !important;
    color: white;
    border: 1px solid black !important;
}

.program-name {
  background-color: #134F5C !important;
  color: white;
  font-size: 24;
  color: #F9CB9C;
  border: 1px solid black;
}

.population-data {
  height: 10;
  vertical-align: middle;
  border: 1px solid black !important;
}

.overall-goals {
  text-align: center;
  vertical-align: middle !important;
  width: 2000px;
  border-color: black !important;
  font-size: 20;
  line-height: 25px !important;
}

.EI-data {
  height: 10;
  vertical-align: middle;
  border: 1px solid black !important;
}

.economic-impact {
  background-color: #134F5C !important;
  color: white;
  vertical-align: middle;
  font-weight: bold;
  width: 270 !important;
  font-size: 23;
  border: 1px solid black !important;
}

/* style for EXPENDITURES, OUTPUT, JOBS */
.EOJ {
  background-color: #134F5C !important;
  color: white;
  font-weight: bold;
  border: 1px solid black !important;
}

.population-served {
  background-color: #134F5C !important;
  color: white;
  font-size: 20;
  border: 1px solid black !important;
  text-align: center;
  vertical-align: middle !important;
  line-height: 2;
}

.dutchess-ny {
  background-color: #134F5C !important;
  color: white;
  border: 1px solid black !important;
  vertical-align: middle !important;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
