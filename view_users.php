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

  <table border="1" cellpadding="4">
    <tr>
      <th bgcolor="#CCCCCC"><strong>Site</strong></th>
      <!-- <th bgcolor="#CCCCCC"><strong># of Programs</strong></th> -->
      <th bgcolor="#CCCCCC"><strong>Report</strong></th>
    </tr>

    <?php
    while( $row = mysql_fetch_array($retval) ) {
    ?>

    <tr>
      <td> <a href="view_programs.php?user_id=<?php echo $row['user_id']; ?> "> <?php echo $row['user_name']; ?> </a> </td>
    </tr>

    <?php
    }
    ?>

  </table>
  </br>
</div>
