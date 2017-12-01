<?php
include("session.php");
include("index.php");
include("config.php");

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

$viewUsers_sql = "SELECT user_name, user_id FROM user ORDER BY user_name";

$retval = mysql_query( $viewUsers_sql, $conn );

if(! $retval ) {
  die('Could not retreive data: ' . mysql_error());
}



// echo "Users are viewed successfully\n";

mysql_close($conn);

?>

<div class = "container" style = "background-color: white; margin-top: 3%;">

  </br>
  <h2>Sites</h2>
  </br>

  <table style="text-align: center;" border="1" cellpadding="4">
    <tr>
      <th bgcolor="#CCCCCC" style="text-align: center;"><strong>Site</strong></th>
      <!-- <th bgcolor="#CCCCCC"><strong># of Programs</strong></th> -->
      <!-- <th bgcolor="#CCCCCC" style="text-align: center;"><strong>Report</strong></th> -->
    </tr>

    <?php
    while( $row = mysql_fetch_array($retval) ) {

        if(!isset($_SESSION)) {
          session_start();
        }
        $_SESSION["user_id_session"] = $row['user_id'];


    ?>

    <tr>
      <td> <a class="btn btn-outline-secondary"  href="view_programs.php?user_id=<?php echo $row['user_id']; ?> "> <?php echo $row['user_name']; ?> </a> </td>

      <form style="marging: 0" method="POST" action="./actions/remove_user_action.php?user_id=<?php echo $row['user_id'] ?>">
        <td style="border-color: white;">
          <input type="submit" style="width: 100px;" class="btn btn-danger" value="Delete"></input>
        </td>
      </form>
    </tr>

    <?php
    }
    ?>

  </table>
  </br>
</div>
<style>
th, td {
  padding: 10px;
  border: 1px solid black;
}

th {
  background-color: #0F76A8;
  color: white;
  border: 1px solid black;
  /*color: white;*/
}

</style>
