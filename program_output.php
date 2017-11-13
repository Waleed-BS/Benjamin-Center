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
" SELECT program_name, program_description, owner FROM program WHERE program_id = $program_id";
$retval = mysql_query($program_sql, $conn);
$row = mysql_fetch_array($retval, MYSQL_ASSOC);
$program_name = $row["program_name"];
$program_description = $row["program_description"];
$owner = $row["owner"];

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

  <tr class="backgroundcolored">
    <th style="text-align: center; vertical-align: middle"> <?php echo $program_name ?> </th>
    <th style="text-align: center; vertical-align: middle;">Service</th>
    <th style="text-align: center; vertical-align: middle;">Impact</th>
    <th style="text-align: center; width=200; vertical-align: middle; width: 800px;">Impact Value</th>
    <th style="text-align: center; vertical-align: middle; width: 600px">Percent of Impact <br> Provided by Program</th>
    <td
        style="text-align: center; vertical-align: middle; width: 1000px"
        rowspan="<?php echo 4 + sizeof($populations); ?>">
      <strong>Overall Goals</strong> <br> <br> <?php echo $program_description; ?>
    </td>
  </tr>

  <tr>
    <td rowspan="<?php echo 1 + sizeof($populations); ?>" class="backgroundcolored" style="border-right: none; border-top: none; border-bottom: none; vertical-align: middle;"> Adults and Family (n=<?php echo $sum_total_clients ?>)</td>
  </tr>

  <?php
  if( isset($populations) && isset($services) && isset($annual_costs) && isset($total_clients) && isset($impacts) && isset($likelihoods) && isset($values) ) {
    ?>
    <?php
    for ($i = 0; $i < sizeof($services); $i++) {
      ?>

      <tr>
        <!-- show population only once -->

        <td style="height: 10; vertical-align: middle;"><?php echo $services[$i] ?></td>
        <td style="vertical-align: middle"><?php echo $impacts[$i] ?></td>
        <td style="vertical-align: middle;"><?php echo "$" . number_format($values[$i]) ?></td>
        <td style="vertical-align: middle;"><?php echo $likelihoods[$i] . "%" ?></td>
      </tr>
      <?php
    }
    ?>
    <?php
  }
  ?>
      <tr class="backgroundcolored">
        <td style="border-right: none; border-bottom: none;"></td>
        <td style="border: none;"></td>
        <td style="border: none; vertical-align: middle;">TOTAL VALUE</td>
        <td style="border: none; vertical-align: middle;"><?php echo "$1 :" . " $" . $sum_values ?></td>
        <td style="border: none;"></td>
      </tr>
      <tr class="backgroundcolored">
        <td style="border-right: none; border-top:none ;"></td>
        <td style="border: none;"></td>
        <td style="border-top: none; border-left: none; border-right: none; vertical-align: middle;">SROI RATIO</td>
        <td style="border: none; width: 300px; vertical-align: middle;"><?php echo $SROI_ratio . " : 1"?></td>
        <td style="border: none;"></td>
      </tr>


    </table>

  <br>


<style>

table.one{
  /*max-height: 100%;*/
  /*height: 100%;*/
  /*height: 87%;*/
  /*float: left;*/
  width: 70%;
  background-color: white;
  /*position: relative;*/
  margin-left: 15%;
  /*display: inline-block;*/
  /*border: none;*/

}


.backgroundcolored {
    background-color: #1b75bb !important;
    color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>
