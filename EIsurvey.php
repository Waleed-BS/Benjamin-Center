<?php
include("index.php");
include("config.php");
$fieldError = ""; $fulltimeemployees = ""; $parttimeemployees = ""; $box1 = ""; $box2 = ""; $box3 = ""; $box4 = ""; $box5 = ""; $box6 = ""; $box7 = ""; $box8 = ""; $netsalarywages = "";




if( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["fulltimeemployees"]) && !empty($_POST["parttimeemployees"]) && !empty($_POST["box1"])
&& !empty($_POST["box2"]) && !empty($_POST["box3"]) && !empty($_POST["box4"]) && !empty($_POST["box5"]) && !empty($_POST["box6"])
&& !empty($_POST["box7"]) && !empty($_POST["box8"]) && !empty($_POST["netsalarywages"]) && !empty($_POST["row1-1"])  && !empty($_POST["row1-2"])
&& !empty($_POST["row1-3"]) && !empty($_POST["row1-4"]) && !empty($_POST["row2-1"])  && !empty($_POST["row2-2"])
&& !empty($_POST["row2-3"]) && !empty($_POST["row2-4"]) && !empty($_POST["row3-1"])  && !empty($_POST["row3-2"])
&& !empty($_POST["row3-3"]) && !empty($_POST["row3-4"]) && !empty($_POST["row4-1"])  && !empty($_POST["row4-2"])
&& !empty($_POST["row4-3"]) && !empty($_POST["row4-4"]) && !empty($_POST["row5-1"])  && !empty($_POST["row5-2"])
&& !empty($_POST["row5-3"]) && !empty($_POST["row5-4"]) && !empty($_POST["row6-1"])  && !empty($_POST["row6-2"])
&& !empty($_POST["row6-3"]) && !empty($_POST["row6-4"]) && !empty($_POST["row7-1"])  && !empty($_POST["row7-2"])
&& !empty($_POST["row7-3"]) && !empty($_POST["row7-4"]) && !empty($_POST["row8-1"])  && !empty($_POST["row8-2"])
&& !empty($_POST["row8-3"]) && !empty($_POST["row8-4"]) && !empty($_POST["row9-1"])  && !empty($_POST["row9-2"])
&& !empty($_POST["row9-3"]) && !empty($_POST["row9-4"]) && !empty($_POST["row10-1"])  && !empty($_POST["row10-2"])
&& !empty($_POST["row10-3"]) && !empty($_POST["row10-4"]) && !empty($_POST["row11-1"])  && !empty($_POST["row11-2"])
&& !empty($_POST["row11-3"]) && !empty($_POST["row11-4"]) && !empty($_POST["row12-1"])  && !empty($_POST["row12-2"])
&& !empty($_POST["row12-3"]) && !empty($_POST["row12-4"]) && !empty($_POST["row13-1"])  && !empty($_POST["row13-2"])
&& !empty($_POST["row13-3"]) && !empty($_POST["row13-4"]) && !empty($_POST["row14-1"])  && !empty($_POST["row14-2"])
&& !empty($_POST["row14-3"]) && !empty($_POST["row14-4"]) && !empty($_POST["row15-1"])  && !empty($_POST["row15-2"])
&& !empty($_POST["row15-3"]) && !empty($_POST["row15-4"]) && !empty($_POST["row16-1"])  && !empty($_POST["row16-2"])
&& !empty($_POST["row16-3"]) && !empty($_POST["row16-4"]) && !empty($_POST["row17-1"])  && !empty($_POST["row17-2"])
&& !empty($_POST["row17-3"]) && !empty($_POST["row17-4"]) && !empty($_POST["row18-1"])  && !empty($_POST["row18-2"])
&& !empty($_POST["row18-3"]) && !empty($_POST["row18-4"]) && !empty($_POST["row19-1"])  && !empty($_POST["row19-2"])
&& !empty($_POST["row19-3"]) && !empty($_POST["row19-4"]) && !empty($_POST["row20-1"])  && !empty($_POST["row20-2"])
&& !empty($_POST["row20-3"]) && !empty($_POST["row20-4"]) && !empty($_POST["row21-1"])  && !empty($_POST["row21-2"])
&& !empty($_POST["row21-3"]) && !empty($_POST["row21-4"]) && !empty($_POST["row22-1"])  && !empty($_POST["row22-2"])
&& !empty($_POST["row22-3"]) && !empty($_POST["row22-4"]) && !empty($_POST["row23-1"])  && !empty($_POST["row23-2"])
&& !empty($_POST["row23-3"]) && !empty($_POST["row23-4"]) && !empty($_POST["row24-1"])  && !empty($_POST["row24-2"])
&& !empty($_POST["row24-3"]) && !empty($_POST["row24-4"]) && !empty($_POST["row25-1"])  && !empty($_POST["row25-2"])
&& !empty($_POST["row25-3"]) && !empty($_POST["row25-4"]) && !empty($_POST["row26-1"])  && !empty($_POST["row26-2"])
&& !empty($_POST["row26-3"]) && !empty($_POST["row26-4"]) && !empty($_POST["row27-1"])  && !empty($_POST["row27-2"])
&& !empty($_POST["row27-3"]) && !empty($_POST["row27-4"]) && !empty($_POST["row28-1"])  && !empty($_POST["row28-2"])
&& !empty($_POST["row28-3"]) && !empty($_POST["row28-4"]) && !empty($_POST["row29-1"])  && !empty($_POST["row29-2"])
&& !empty($_POST["row29-3"]) && !empty($_POST["row29-4"]) && !empty($_POST["row30-1"])  && !empty($_POST["row30-2"])
&& !empty($_POST["row30-3"]) && !empty($_POST["row30-4"]) && !empty($_POST["row31-1"])  && !empty($_POST["row31-2"])
&& !empty($_POST["row31-3"]) && !empty($_POST["row31-4"]) && !empty($_POST["row32-1"])  && !empty($_POST["row32-2"])
&& !empty($_POST["row32-3"]) && !empty($_POST["row32-4"]) && !empty($_POST["row33-1"])  && !empty($_POST["row33-2"])
&& !empty($_POST["row33-3"]) && !empty($_POST["row33-4"]) && !empty($_POST["row34-1"])  && !empty($_POST["row34-2"])
&& !empty($_POST["row34-3"]) && !empty($_POST["row34-4"]) && !empty($_POST["row35-1"])  && !empty($_POST["row35-2"])
&& !empty($_POST["row35-3"]) && !empty($_POST["row35-4"]) && !empty($_POST["row36-1"])  && !empty($_POST["row36-2"])
&& !empty($_POST["row36-3"]) && !empty($_POST["row36-4"]) && !empty($_POST["row37-1"])  && !empty($_POST["row37-2"])
&& !empty($_POST["row37-3"]) && !empty($_POST["row37-4"]) && !empty($_POST["row38-1"])  && !empty($_POST["row38-2"])
&& !empty($_POST["row38-3"]) && !empty($_POST["row38-4"]) && !empty($_POST["row39-1"])  && !empty($_POST["row39-2"])
&& !empty($_POST["row39-3"]) && !empty($_POST["row39-4"]) && !empty($_POST["row40-1"])  && !empty($_POST["row40-2"])
&& !empty($_POST["row40-3"]) && !empty($_POST["row40-4"]) && !empty($_POST["row41-1"])  && !empty($_POST["row41-2"])
&& !empty($_POST["row41-3"]) && !empty($_POST["row41-4"])) {

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }
  else {
    echo "Connected";
  }

  if(! get_magic_quotes_gpc() ) {
    $fulltimeemployees = addslashes ($_POST['fulltimeemployees']);
    $parttimeemployees = addslashes ($_POST['parttimeemployees']);
    $box1 = addslashes ($_POST['box1']);
    $box2 = addslashes ($_POST['box2']);
    $box3 = addslashes ($_POST['box3']);
    $box4 = addslashes ($_POST['box4']);
    $box5 = addslashes ($_POST['box5']);
    $box6 = addslashes ($_POST['box6']);
    $box7 = addslashes ($_POST['box7']);
    $box8 = addslashes ($_POST['box8']);
    $netsalarywages = addslashes ($_POST['netsalarywages']);
    $row1c1 = addslashes ($_POST['row1-1']); addslashes ($row1c2 = $_POST['row1-2']); $row1c3 = addslashes ($_POST['row1-3']); $row1c4 = addslashes ($_POST['row1-4']); $row2c1 = addslashes ($_POST['row2-1']); $row2c2 = addslashes ($_POST['row2-2']); $row2c3 = addslashes ($_POST['row2-3']); $row2c4 = addslashes ($_POST['row2-4']);
    $row3c1 = addslashes ($_POST['row3-1']); addslashes ($row3c2 = $_POST['row3-2']); $row3c3 = addslashes ($_POST['row3-3']); $row3c4 = addslashes ($_POST['row3-4']); $row4c1 = addslashes ($_POST['row4-1']); $row4c2 = addslashes ($_POST['row4-2']); $row4c3 = addslashes ($_POST['row4-3']); $row4c4 = addslashes ($_POST['row4-4']);
    $row5c1 = addslashes ($_POST['row5-1']); addslashes ($row5c2 = $_POST['row5-2']); $row5c3 = addslashes ($_POST['row5-3']); $row5c4 = addslashes ($_POST['row5-4']); $row6c1 = addslashes ($_POST['row6-1']); $row6c2 = addslashes ($_POST['row6-2']); $row6c3 = addslashes ($_POST['row6-3']); $row6c4 = addslashes ($_POST['row6-4']);
    $row7c1 = addslashes ($_POST['row7-1']); addslashes ($row7c2 = $_POST['row7-2']); $row7c3 = addslashes ($_POST['row7-3']); $row7c4 = addslashes ($_POST['row7-4']); $row8c1 = addslashes ($_POST['row8-1']); $row8c2 = addslashes ($_POST['row8-2']); $row8c3 = addslashes ($_POST['row8-3']); $row8c4 = addslashes ($_POST['row8-4']);
    $row9c1 = addslashes ($_POST['row9-1']); addslashes ($row9c2 = $_POST['row9-2']); $row9c3 = addslashes ($_POST['row9-3']); $row9c4 = addslashes ($_POST['row9-4']); $row10c1 = addslashes ($_POST['row10-1']); $row10c2 = addslashes ($_POST['row10-2']); $row10c3 = addslashes ($_POST['row10-3']); $row10c4 = addslashes ($_POST['row10-4']);
    $row11c1 = addslashes ($_POST['row11-1']); addslashes ($row11c2 = $_POST['row11-2']); $row11c3 = addslashes ($_POST['row11-3']); $row11c4 = addslashes ($_POST['row11-4']); $row12c1 = addslashes ($_POST['row12-1']); $row12c2 = addslashes ($_POST['row12-2']); $row12c3 = addslashes ($_POST['row12-3']); $row12c4 = addslashes ($_POST['row12-4']);
    $row13c1 = addslashes ($_POST['row13-1']); addslashes ($row13c2 = $_POST['row13-2']); $row13c3 = addslashes ($_POST['row13-3']); $row13c4 = addslashes ($_POST['row13-4']); $row14c1 = addslashes ($_POST['row14-1']); $row14c2 = addslashes ($_POST['row14-2']); $row14c3 = addslashes ($_POST['row14-3']); $row14c4 = addslashes ($_POST['row14-4']);
    $row15c1 = addslashes ($_POST['row15-1']); addslashes ($row15c2 = $_POST['row15-2']); $row15c3 = addslashes ($_POST['row15-3']); $row15c4 = addslashes ($_POST['row15-4']); $row16c1 = addslashes ($_POST['row16-1']); $row16c2 = addslashes ($_POST['row16-2']); $row16c3 = addslashes ($_POST['row16-3']); $row16c4 = addslashes ($_POST['row16-4']);
    $row17c1 = addslashes ($_POST['row17-1']); addslashes ($row17c2 = $_POST['row17-2']); $row17c3 = addslashes ($_POST['row17-3']); $row17c4 = addslashes ($_POST['row17-4']); $row18c1 = addslashes ($_POST['row18-1']); $row18c2 = addslashes ($_POST['row18-2']); $row18c3 = addslashes ($_POST['row18-3']); $row18c4 = addslashes ($_POST['row18-4']);
    $row19c1 = addslashes ($_POST['row19-1']); addslashes ($row19c2 = $_POST['row19-2']); $row19c3 = addslashes ($_POST['row19-3']); $row19c4 = addslashes ($_POST['row19-4']); $row20c1 = addslashes ($_POST['row20-1']); $row20c2 = addslashes ($_POST['row20-2']); $row20c3 = addslashes ($_POST['row20-3']); $row20c4 = addslashes ($_POST['row20-4']);
    $row21c1 = addslashes ($_POST['row21-1']); addslashes ($row21c2 = $_POST['row21-2']); $row21c3 = addslashes ($_POST['row21-3']); $row21c4 = addslashes ($_POST['row21-4']); $row22c1 = addslashes ($_POST['row22-1']); $row22c2 = addslashes ($_POST['row22-2']); $row22c3 = addslashes ($_POST['row22-3']); $row22c4 = addslashes ($_POST['row22-4']);
    $row23c1 = addslashes ($_POST['row23-1']); addslashes ($row23c2 = $_POST['row23-2']); $row23c3 = addslashes ($_POST['row23-3']); $row23c4 = addslashes ($_POST['row23-4']); $row24c1 = addslashes ($_POST['row24-1']); $row24c2 = addslashes ($_POST['row24-2']); $row24c3 = addslashes ($_POST['row24-3']); $row24c4 = addslashes ($_POST['row24-4']);
    $row25c1 = addslashes ($_POST['row25-1']); addslashes ($row25c2 = $_POST['row25-2']); $row25c3 = addslashes ($_POST['row25-3']); $row25c4 = addslashes ($_POST['row25-4']); $row26c1 = addslashes ($_POST['row26-1']); $row26c2 = addslashes ($_POST['row26-2']); $row26c3 = addslashes ($_POST['row26-3']); $row26c4 = addslashes ($_POST['row26-4']);
    $row27c1 = addslashes ($_POST['row27-1']); addslashes ($row27c2 = $_POST['row27-2']); $row27c3 = addslashes ($_POST['row27-3']); $row27c4 = addslashes ($_POST['row27-4']); $row28c1 = addslashes ($_POST['row28-1']); $row28c2 = addslashes ($_POST['row28-2']); $row28c3 = addslashes ($_POST['row28-3']); $row28c4 = addslashes ($_POST['row28-4']);
    $row29c1 = addslashes ($_POST['row29-1']); addslashes ($row29c2 = $_POST['row29-2']); $row29c3 = addslashes ($_POST['row29-3']); $row29c4 = addslashes ($_POST['row29-4']); $row30c1 = addslashes ($_POST['row30-1']); $row30c2 = addslashes ($_POST['row30-2']); $row30c3 = addslashes ($_POST['row30-3']); $row30c4 = addslashes ($_POST['row30-4']);
    $row31c1 = addslashes ($_POST['row31-1']); addslashes ($row31c2 = $_POST['row31-2']); $row31c3 = addslashes ($_POST['row31-3']); $row31c4 = addslashes ($_POST['row31-4']); $row32c1 = addslashes ($_POST['row32-1']); $row32c2 = addslashes ($_POST['row32-2']); $row32c3 = addslashes ($_POST['row32-3']); $row32c4 = addslashes ($_POST['row32-4']);
    $row33c1 = addslashes ($_POST['row33-1']); addslashes ($row33c2 = $_POST['row33-2']); $row33c3 = addslashes ($_POST['row33-3']); $row33c4 = addslashes ($_POST['row33-4']); $row34c1 = addslashes ($_POST['row34-1']); $row34c2 = addslashes ($_POST['row34-2']); $row34c3 = addslashes ($_POST['row34-3']); $row34c4 = addslashes ($_POST['row34-4']);
    $row35c1 = addslashes ($_POST['row35-1']); addslashes ($row35c2 = $_POST['row35-2']); $row35c3 = addslashes ($_POST['row35-3']); $row35c4 = addslashes ($_POST['row35-4']); $row36c1 = addslashes ($_POST['row36-1']); $row36c2 = addslashes ($_POST['row36-2']); $row36c3 = addslashes ($_POST['row36-3']); $row36c4 = addslashes ($_POST['row36-4']);
    $row37c1 = addslashes ($_POST['row37-1']); addslashes ($row37c2 = $_POST['row37-2']); $row37c3 = addslashes ($_POST['row37-3']); $row37c4 = addslashes ($_POST['row37-4']); $row38c1 = addslashes ($_POST['row38-1']); $row38c2 = addslashes ($_POST['row38-2']); $row38c3 = addslashes ($_POST['row38-3']); $row38c4 = addslashes ($_POST['row38-4']);
    $row39c1 = addslashes ($_POST['row39-1']); addslashes ($row39c2 = $_POST['row39-2']); $row39c3 = addslashes ($_POST['row39-3']); $row39c4 = addslashes ($_POST['row39-4']); $row40c1 = addslashes ($_POST['row40-1']); $row40c2 = addslashes ($_POST['row40-2']); $row40c3 = addslashes ($_POST['row40-3']); $row40c4 = addslashes ($_POST['row40-4']);
    $row41c1 = addslashes ($_POST['row41-1']); addslashes ($row41c2 = $_POST['row41-2']); $row41c3 = addslashes ($_POST['row41-3']); $row41c4 = addslashes ($_POST['row41-4']);
    $definitions = addslashes($_POST['definitions']);

  } else {
    $fulltimeemployees = $_POST['fulltimeemployees'];
    $parttimeemployees = $_POST['parttimeemployees'];
    $box1 = $_POST['box1'];
    $box2 = $_POST['box2'];
    $box3 = $_POST['box3'];
    $box4 = $_POST['box4'];
    $box5 = $_POST['box5'];
    $box6 = $_POST['box6'];
    $box7 = $_POST['box7'];
    $box8 = $_POST['box8'];
    $netsalarywages = $_POST['netsalarywages'];
    $row1c1 = $_POST['row1-1']; $row1c2 = $_POST['row1-2']; $row1c3 = $_POST['row1-3']; $row1c4 = $_POST['row1-4']; $row2c1 = $_POST['row2-1']; $row2c2 = $_POST['row2-2']; $row2c3 = $_POST['row2-3']; $row2c4 = $_POST['row2-4'];
    $row3c1 = $_POST['row3-1']; $row3c2 = $_POST['row3-2']; $row3c3 = $_POST['row3-3']; $row3c4 = $_POST['row3-4']; $row4c1 = $_POST['row4-1']; $row4c2 = $_POST['row4-2']; $row4c3 = $_POST['row4-3']; $row4c4 = $_POST['row4-4'];
    $row5c1 = $_POST['row5-1']; $row5c2 = $_POST['row5-2']; $row5c3 = $_POST['row5-3']; $row5c4 = $_POST['row5-4']; $row6c1 = $_POST['row6-1']; $row6c2 = $_POST['row6-2']; $row6c3 = $_POST['row6-3']; $row6c4 = $_POST['row6-4'];
    $row7c1 = $_POST['row7-1']; $row7c2 = $_POST['row7-2']; $row7c3 = $_POST['row7-3']; $row7c4 = $_POST['row7-4']; $row8c1 = $_POST['row8-1']; $row8c2 = $_POST['row8-2']; $row8c3 = $_POST['row8-3']; $row8c4 = $_POST['row8-4'];
    $row9c1 = $_POST['row9-1']; $row9c2 = $_POST['row9-2']; $row9c3 = $_POST['row9-3']; $row9c4 = $_POST['row9-4']; $row10c1 = $_POST['row10-1']; $row10c2 = $_POST['row10-2']; $row10c3 = $_POST['row10-3']; $row10c4 = $_POST['row10-4'];
    $row11c1 = $_POST['row11-1']; $row11c2 = $_POST['row11-2']; $row11c3 = $_POST['row11-3']; $row11c4 = $_POST['row11-4']; $row12c1 = $_POST['row12-1']; $row12c2 = $_POST['row12-2']; $row12c3 = $_POST['row12-3']; $row12c4 = $_POST['row12-4'];
    $row13c1 = $_POST['row13-1']; $row13c2 = $_POST['row13-2']; $row13c3 = $_POST['row13-3']; $row13c4 = $_POST['row13-4']; $row14c1 = $_POST['row14-1']; $row14c2 = $_POST['row14-2']; $row14c3 = $_POST['row14-3']; $row14c4 = $_POST['row14-4'];
    $row15c1 = $_POST['row15-1']; $row15c2 = $_POST['row15-2']; $row15c3 = $_POST['row15-3']; $row15c4 = $_POST['row15-4']; $row16c1 = $_POST['row16-1']; $row16c2 = $_POST['row16-2']; $row16c3 = $_POST['row16-3']; $row16c4 = $_POST['row16-4'];
    $row17c1 = $_POST['row17-1']; $row17c2 = $_POST['row17-2']; $row17c3 = $_POST['row17-3']; $row17c4 = $_POST['row17-4']; $row18c1 = $_POST['row18-1']; $row18c2 = $_POST['row18-2']; $row18c3 = $_POST['row18-3']; $row18c4 = $_POST['row18-4'];
    $row19c1 = $_POST['row19-1']; $row19c2 = $_POST['row19-2']; $row19c3 = $_POST['row19-3']; $row19c4 = $_POST['row19-4']; $row20c1 = $_POST['row20-1']; $row20c2 = $_POST['row20-2']; $row20c3 = $_POST['row20-3']; $row20c4 = $_POST['row20-4'];
    $row21c1 = $_POST['row21-1']; $row21c2 = $_POST['row21-2']; $row21c3 = $_POST['row21-3']; $row21c4 = $_POST['row21-4']; $row22c1 = $_POST['row22-1']; $row22c2 = $_POST['row22-2']; $row22c3 = $_POST['row22-3']; $row22c4 = $_POST['row22-4'];
    $row23c1 = $_POST['row23-1']; $row23c2 = $_POST['row23-2']; $row23c3 = $_POST['row23-3']; $row23c4 = $_POST['row23-4']; $row24c1 = $_POST['row24-1']; $row24c2 = $_POST['row24-2']; $row24c3 = $_POST['row24-3']; $row24c4 = $_POST['row24-4'];
    $row25c1 = $_POST['row25-1']; $row25c2 = $_POST['row25-2']; $row25c3 = $_POST['row25-3']; $row25c4 = $_POST['row25-4']; $row26c1 = $_POST['row26-1']; $row26c2 = $_POST['row26-2']; $row26c3 = $_POST['row26-3']; $row26c4 = $_POST['row26-4'];
    $row27c1 = $_POST['row27-1']; $row27c2 = $_POST['row27-2']; $row27c3 = $_POST['row27-3']; $row27c4 = $_POST['row27-4']; $row28c1 = $_POST['row28-1']; $row28c2 = $_POST['row28-2']; $row28c3 = $_POST['row28-3']; $row28c4 = $_POST['row28-4'];
    $row29c1 = $_POST['row29-1']; $row29c2 = $_POST['row29-2']; $row29c3 = $_POST['row29-3']; $row29c4 = $_POST['row29-4']; $row30c1 = $_POST['row30-1']; $row30c2 = $_POST['row30-2']; $row30c3 = $_POST['row30-3']; $row30c4 = $_POST['row30-4'];
    $row31c1 = $_POST['row31-1']; $row31c2 = $_POST['row31-2']; $row31c3 = $_POST['row31-3']; $row31c4 = $_POST['row31-4']; $row32c1 = $_POST['row32-1']; $row32c2 = $_POST['row32-2']; $row32c3 = $_POST['row32-3']; $row32c4 = $_POST['row32-4'];
    $row33c1 = $_POST['row33-1']; $row33c2 = $_POST['row33-2']; $row33c3 = $_POST['row33-3']; $row33c4 = $_POST['row33-4']; $row34c1 = $_POST['row34-1']; $row34c2 = $_POST['row34-2']; $row34c3 = $_POST['row34-3']; $row34c4 = $_POST['row34-4'];
    $row35c1 = $_POST['row35-1']; $row35c2 = $_POST['row35-2']; $row35c3 = $_POST['row35-3']; $row35c4 = $_POST['row35-4']; $row36c1 = $_POST['row36-1']; $row36c2 = $_POST['row36-2']; $row36c3 = $_POST['row36-3']; $row36c4 = $_POST['row36-4'];
    $row37c1 = $_POST['row37-1']; $row37c2 = $_POST['row37-2']; $row37c3 = $_POST['row37-3']; $row37c4 = $_POST['row37-4']; $row38c1 = $_POST['row38-1']; $row38c2 = $_POST['row38-2']; $row38c3 = $_POST['row38-3']; $row38c4 = $_POST['row38-4'];
    $row39c1 = $_POST['row39-1']; $row39c2 = $_POST['row39-2']; $row39c3 = $_POST['row39-3']; $row39c4 = $_POST['row39-4']; $row40c1 = $_POST['row40-1']; $row40c2 = $_POST['row40-2']; $row40c3 = $_POST['row40-3']; $row40c4 = $_POST['row40-4'];
    $row41c1 = $_POST['row41-1']; $row41c2 = $_POST['row41-2']; $row41c3 = $_POST['row41-3']; $row41c4 = $_POST['row41-4'];
    $definitions = $_POST['definitions'];  
  }

  function addColOne($row1c1, $row2c1, $row3c1, $row4c1, $row5c1, $row6c1, $row7c1, $row8c1, $row9c1, $row10c1, $row11c1, $row12c1, $row13c1, $row14c1, $row15c1, $row16c1, 
  $row17c1, $row18c1, $row19c1, $row20c1, $row21c1, $row22c1, $row23c1, $row24c1, $row25c1, $row26c1, $row27c1, $row28c1, $row29c1, $row30c1, $row31c1, $row32c1, $row33c1, 
  $row34c1, $row35c1, $row36c1, $row37c1, $row38c1, $row39c1, $row40c1, $row41c1){

    global $totalVendorinCounty;
    $totalVendorinCounty = $row1c1 + $row2c1 + $row3c1 + $row4c1 + $row5c1 + $row6c1 + $row7c1 + $row8c1 + $row9c1 + $row10c1 + $row11c1 + $row12c1 + $row13c1 + $row14c1 + 
    $row15c1 + $row16c1 + $row17c1 + $row18c1 + $row19c1 + $row20c1 + $row21c1 + $row22c1 + $row23c1 + $row24c1 + $row25c1 + $row26c1 + $row27c1 + $row28c1 + 
    $row29c1 + $row30c1 + $row31c1 + $row32c1 + $row33c1 + $row34c1 + $row35c1 + $row36c1 + $row37c1 + $row38c1 + $row39c1 + $row40c1 + $row41c1; 
  }

  function addColTwo($row1c2, $row2c2, $row3c2, $row4c2, $row5c2, $row6c2, $row7c2, $row8c2, $row9c2, $row10c2, $row11c2, $row12c2, $row13c2, $row14c2, $row15c2, $row16c2, 
  $row17c2, $row18c2, $row19c2, $row20c2, $row21c2, $row22c2, $row23c2, $row24c2, $row25c2, $row26c2, $row27c2, $row28c2, $row29c2, $row30c2, $row31c2, $row32c2, $row33c2, 
  $row34c2, $row35c2, $row36c2, $row37c2, $row38c2, $row39c2, $row40c2, $row41c2){

    global $totalExpenseinCounty;
    $totalExpenseinCounty = $row1c2 + $row2c2 + $row3c2 + $row4c2 + $row5c2 + $row6c2 + $row7c2 + $row8c2 + $row9c2 + $row10c2 + $row11c2 + $row12c2 + $row13c2 + $row14c2 + 
    $row15c2 + $row16c2 + $row17c2 + $row18c2 + $row19c2 + $row20c2 + $row21c2 + $row22c2 + $row23c2 + $row24c2 + $row25c2 + $row26c2 + $row27c2 + $row28c2 + 
    $row29c2 + $row30c2 + $row31c2 + $row32c2 + $row33c2 + $row34c2 + $row35c2 + $row36c2 + $row37c2 + $row38c2 + $row39c2 + $row40c2 + $row41c2; 
  }  

  function addColThree($row1c3, $row2c3, $row3c3, $row4c3, $row5c3, $row6c3, $row7c3, $row8c3, $row9c3, $row10c3, $row11c3, $row12c3, $row13c3, $row14c3, $row15c3, $row16c3, 
  $row17c3, $row18c3, $row19c3, $row20c3, $row21c3, $row22c3, $row23c3, $row24c3, $row25c3, $row26c3, $row27c3, $row28c3, $row29c3, $row30c3, $row31c3, $row32c3, $row33c3, 
  $row34c3, $row35c3, $row36c3, $row37c3, $row38c3, $row39c3, $row40c3, $row41c3){

    global $totalVendoroutofCounty;
    $totalVendoroutofCounty = $row1c3 + $row2c3 + $row3c3 + $row4c3 + $row5c3 + $row6c3 + $row7c3 + $row8c3 + $row9c3 + $row10c3 + $row11c3 + $row12c3 + $row13c3 + $row14c3 + 
    $row15c3 + $row16c3 + $row17c3 + $row18c3 + $row19c3 + $row20c3 + $row21c3 + $row22c3 + $row23c3 + $row24c3 + $row25c3 + $row26c3 + $row27c3 + $row28c3 + 
    $row29c3 + $row30c3 + $row31c3 + $row32c3 + $row33c3 + $row34c3 + $row35c3 + $row36c3 + $row37c3 + $row38c3 + $row39c3 + $row40c3 + $row41c3; 
  }  

  function addColFour($row1c4, $row2c4, $row3c4, $row4c4, $row5c4, $row6c4, $row7c4, $row8c4, $row9c4, $row10c4, $row11c4, $row12c4, $row13c4, $row14c4, $row15c4, $row16c4, 
  $row17c4, $row18c4, $row19c4, $row20c4, $row21c4, $row22c4, $row23c4, $row24c4, $row25c4, $row26c4, $row27c4, $row28c4, $row29c4, $row30c4, $row31c4, $row32c4, $row33c4, 
  $row34c4, $row35c4, $row36c4, $row37c4, $row38c4, $row39c4, $row40c4, $row41c4){

    global $totalExpenseoutofCounty;
    $totalExpenseoutofCounty = $row1c4 + $row2c4 + $row3c4 + $row4c4 + $row5c4 + $row6c4 + $row7c4 + $row8c4 + $row9c4 + $row10c4 + $row11c4 + $row12c4 + $row13c4 + $row14c4 + 
    $row15c4 + $row16c4 + $row17c4 + $row18c4 + $row19c4 + $row20c4 + $row21c4 + $row22c4 + $row23c4 + $row24c4 + $row25c4 + $row26c4 + $row27c4 + $row28c4 + 
    $row29c4 + $row30c4 + $row31c4 + $row32c4 + $row33c4 + $row34c4 + $row35c4 + $row36c4 + $row37c4 + $row38c4 + $row39c4 + $row40c4 + $row41c4; 
  }  

  addColOne($row1c1, $row2c1, $row3c1, $row4c1, $row5c1, $row6c1, $row7c1, $row8c1, $row9c1, $row10c1, $row11c1, $row12c1, $row13c1, $row14c1, $row15c1, $row16c1, 
  $row17c1, $row18c1, $row19c1, $row20c1, $row21c1, $row22c1, $row23c1, $row24c1, $row25c1, $row26c1, $row27c1, $row28c1, $row29c1, $row30c1, $row31c1, $row32c1, $row33c1, 
  $row34c1, $row35c1, $row36c1, $row37c1, $row38c1, $row39c1, $row40c1, $row41c1);

  addColTwo($row1c2, $row2c2, $row3c2, $row4c2, $row5c2, $row6c2, $row7c2, $row8c2, $row9c2, $row10c2, $row11c2, $row12c2, $row13c2, $row14c2, $row15c2, $row16c2, 
  $row17c2, $row18c2, $row19c2, $row20c2, $row21c2, $row22c2, $row23c2, $row24c2, $row25c2, $row26c2, $row27c2, $row28c2, $row29c2, $row30c2, $row31c2, $row32c2, $row33c2, 
  $row34c2, $row35c2, $row36c2, $row37c2, $row38c2, $row39c2, $row40c2, $row41c2);

  addColThree($row1c3, $row2c3, $row3c3, $row4c3, $row5c3, $row6c3, $row7c3, $row8c3, $row9c3, $row10c3, $row11c3, $row12c3, $row13c3, $row14c3, $row15c3, $row16c3, 
  $row17c3, $row18c3, $row19c3, $row20c3, $row21c3, $row22c3, $row23c3, $row24c3, $row25c3, $row26c3, $row27c3, $row28c3, $row29c3, $row30c3, $row31c3, $row32c3, $row33c3, 
  $row34c3, $row35c3, $row36c3, $row37c3, $row38c3, $row39c3, $row40c3, $row41c3);

  addColFour($row1c4, $row2c4, $row3c4, $row4c4, $row5c4, $row6c4, $row7c4, $row8c4, $row9c4, $row10c4, $row11c4, $row12c4, $row13c4, $row14c4, $row15c4, $row16c4, 
  $row17c4, $row18c4, $row19c4, $row20c4, $row21c4, $row22c4, $row23c4, $row24c4, $row25c4, $row26c4, $row27c4, $row28c4, $row29c4, $row30c4, $row31c4, $row32c4, $row33c4, 
  $row34c4, $row35c4, $row36c4, $row37c4, $row38c4, $row39c4, $row40c4, $row41c4);

  echo "\nTotal Vendors in County: $totalVendorinCounty \n";
  echo "Total Expenses in County: $totalExpenseinCounty \n";
  echo "Total Vendors out of County: $totalVendoroutofCounty \n";
  echo "Total Expenses Out of County: $totalExpenseoutofCounty \n";


  $retval = mysql_query("INSERT INTO eisurvey (fulltimeemployee, parttimeemployee, fulltimecop, fulltimeoop, fulltimeoodc, fulltimeony, parttimecop, parttimeoop, parttimeoodc, parttimeony, 
  annualexpense, row1c1, row1c2, row1c3, row1c4, row2c1, row2c2, row2c3, row2c4, row3c1, row3c2, row3c3, row3c4, row4c1, row4c2, row4c3, row4c4, row5c1, row5c2, row5c3, row5c4, row6c1,
  row6c2, row6c3, row6c4, row7c1, row7c2, row7c3, row7c4, row8c1, row8c2, row8c3, row8c4, row9c1, row9c2, row9c3, row9c4, row10c1, row10c2, row10c3, row10c4, row11c1, row11c2, row11c3, 
  row11c4, row12c1, row12c2, row12c3, row12c4, row13c1, row13c2, row13c3, row13c4, row14c1, row14c2, row14c3, row14c4, row15c1, row15c2, row15c3, row15c4, row16c1, row16c2, row16c3, 
  row16c4, row17c1, row17c2, row17c3, row17c4, row18c1, row18c2, row18c3, row18c4, row19c1, row19c2, row19c3, row19c4, row20c1, row20c2, row20c3, row20c4, row21c1, row21c2, row21c3,
  row21c4, row22c1, row22c2, row22c3, row22c4, row23c1, row23c2, row23c3, row23c4, row24c1, row24c2, row24c3, row24c4, row25c1, row25c2, row25c3, row25c4, row26c1, row26c2, row26c3, 
  row26c4, row27c1, row27c2, row27c3, row27c4, row28c1, row28c2, row28c3, row28c4, row29c1, row29c2, row29c3, row29c4, row30c1, row30c2, row30c3, row30c4, row31c1, row31c2, row31c3, 
  row31c4, row32c1, row32c2, row32c3, row32c4, row33c1, row33c2, row33c3, row33c4, row34c1, row34c2, row34c3, row34c4, row35c1, row35c2, row35c3, row35c4, row36c1, row36c2, row36c3, 
  row36c4, row37c1, row37c2, row37c3, row37c4, row38c1, row38c2, row38c3, row38c4, row39c1, row39c2, row39c3, row39c4, row40c1, row40c2, row40c3, row40c4, row41c1, row41c2, row41c3, 
  row41c4, definitions, totalvendorsincounty, totalexpensesincounty, totalvendorsoutofcounty, totalexpensesoutofcounty) VALUES ('$fulltimeemployees', '$parttimeemployees', '$box1', '$box2', '$box3', '$box4', '$box5', '$box6', '$box7', '$box8', '$netsalarywages', 
  '$row1c1', '$row1c2', '$row1c3', '$row1c4',  '$row2c1', '$row2c2', '$row2c3', '$row2c4',  '$row3c1', '$row3c2', '$row3c3', '$row3c4',  '$row4c1', '$row4c2', '$row4c3', '$row4c4',
  '$row5c1', '$row5c2', '$row5c3', '$row5c4',  '$row6c1', '$row6c2', '$row6c3', '$row6c4',  '$row7c1', '$row7c2', '$row7c3', '$row7c4',  '$row8c1', '$row8c2', '$row8c3', '$row8c4',
  '$row9c1', '$row9c2', '$row9c3', '$row9c4',  '$row10c1', '$row10c2', '$row10c3', '$row10c4',  '$row11c1', '$row11c2', '$row11c3', '$row11c4',  '$row12c1', '$row12c2', '$row12c3', '$row12c4',
  '$row13c1', '$row13c2', '$row13c3', '$row13c4',  '$row14c1', '$row14c2', '$row14c3', '$row14c4',  '$row15c1', '$row15c2', '$row15c3', '$row15c4',  '$row16c1', '$row16c2', '$row16c3', '$row16c4',
  '$row17c1', '$row17c2', '$row17c3', '$row17c4',  '$row18c1', '$row18c2', '$row18c3', '$row18c4',  '$row19c1', '$row19c2', '$row19c3', '$row19c4',  '$row20c1', '$row20c2', '$row20c3', '$row20c4',
  '$row21c1', '$row21c2', '$row21c3', '$row21c4',  '$row22c1', '$row22c2', '$row22c3', '$row22c4',  '$row23c1', '$row23c2', '$row23c3', '$row23c4',  '$row24c1', '$row24c2', '$row24c3', '$row24c4',
  '$row25c1', '$row25c2', '$row25c3', '$row25c4',  '$row26c1', '$row26c2', '$row26c3', '$row26c4',  '$row27c1', '$row27c2', '$row27c3', '$row27c4',  '$row28c1', '$row28c2', '$row28c3', '$row28c4',
  '$row29c1', '$row29c2', '$row29c3', '$row29c4',  '$row30c1', '$row30c2', '$row30c3', '$row30c4',  '$row31c1', '$row31c2', '$row31c3', '$row31c4',  '$row32c1', '$row32c2', '$row32c3', '$row32c4',
  '$row33c1', '$row33c2', '$row33c3', '$row33c4',  '$row34c1', '$row34c2', '$row34c3', '$row34c4',  '$row35c1', '$row35c2', '$row35c3', '$row35c4',  '$row36c1', '$row36c2', '$row36c3', '$row36c4',
  '$row37c1', '$row37c2', '$row37c3', '$row37c4',  '$row38c1', '$row38c2', '$row38c3', '$row38c4',  '$row39c1', '$row39c2', '$row39c3', '$row39c4',  '$row40c1', '$row40c2', '$row40c3', '$row40c4',
  '$row41c1', '$row41c2', '$row41c3', '$row41c4', '$definitions', '$totalVendorinCounty', '$totalExpenseinCounty', '$totalVendoroutofCounty', '$totalExpenseoutofCounty')", $conn);

  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  echo "Entered data successfully\n";
  mysql_close($conn);

}
?>

<div class = "container" style = "background-color: white;">
  
<form method="post" name="Form" class='my-form' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h3>The next set of questions asks about your employees. Please answer as best as possible, estimate when needed.</h3>
    <table class = "table table-condensed">
        <thead>
        <tr>
            <th>Please enter the total number of Full Time Employees <br> (if variable, average per year) <br> Answer 1</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <div>
                        <label for="femployees">Full Time</label>
                        <input class="form-control" name="fulltimeemployees" id="fulltimeemployees" rows="1" required>
                    </div>    
                </td>
            </tr>
        </tbody>
    </table>

    <table class = "table table-condensed">
        <thead>
            <tr>
                <th>Please enter the total number of Part Time Employees <br> (if variable, average per year) <br> Answer 1</th>
            </tr>
        </thead>
   
        <tbody>
            <tr>
                <td>
                    <div>
                        <label for="pemployees">Part Time</label>
                        <input class="form-control" name="parttimeemployees" id="parttimeemployees" rows="1" required>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <h5>Please estimate the percent of FULL TIME who live in each geography below (responses must add to between 0% - 100%).</h5>
    
    
            <label class="col-xs-3 control-label">Within the City of Poughkeepsie</label>
            <div class="col-xs-4">
                <input class="form-control" id = "box1" name="box1" required />
            </div>
    

    
            <label class="col-xs-3 control-label">In Dutchess Country, Outside of Poughkeepsie</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box2" name="box2" required/>
            </div>
    

        
            <label class="col-xs-3 control-label">Outside of Dutchess County in New York State</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box3" name="box3" required  />
            </div>
       

       
            <label class="col-xs-3 control-label">Outside NY</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box4" name="box4" required  />
            </div>
       

        
            <div class="col-xs-9 col-xs-offset-3">
                <!-- The message container -->
                <div id="messageContainer"></div>
            </div>
        

      
            <label class="col-xs-3 control-label">Total</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "totalfulltime" name="totalfulltime" type="number" readonly/>
            </div>
       

      
            <div class="col-xs-9 col-xs-offset-3">
                <button id = "validate" type = "button" class="btn btn-primary">Validate</button>
            </div>
       



    <h5>Please estimate the percent of PART TIME who live in each geography below (responses must add to between 0% - 100%).</h5>
        
            <label class="col-xs-3 control-label">Within the City of Poughkeepsie</label>
            <div class="col-xs-4">
                <input class="form-control" id = "box5" name="box5" required />
            </div>
        

        
            <label class="col-xs-3 control-label">In Dutchess Country, Outside of Poughkeepsie</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box6" name="box6" required />
            </div>
        

        
            <label class="col-xs-3 control-label">Outside of Dutchess County in New York State</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box7" name="box7"  required/>
            </div>
        

       
            <label class="col-xs-3 control-label">Outside NY</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box8" name="box8" required/>
            </div>
        

      
            <div class="col-xs-9 col-xs-offset-3">
                <!-- The message container -->
                <div id="messageContainer2"></div>
            </div>
       

       
            <label class="col-xs-3 control-label">Total</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "totalparttime" name="totalparttime" type="number" readonly/>
            </div>
        

        
            <div class="col-xs-9 col-xs-offset-3">
                <button id = "validate2" type = "button" class="btn btn-primary">Validate</button>
            </div>


    <h5> What is your estimated annual expense for Net Salary and Wages (Gross salary less tax)?</h5>
    <input class="form-control" id = "netsalarywages" name="netsalarywages" required/>

    <h5> Please consider the different venders your organization uses to complete the following. If a vender type is not applicable to your 
            organization, please skip that vender and move on to the next. Please separate total venders located in Dutchess County from those
            located outside of the County. Again, use your best estimates. </h5>
        <br><br>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Vendors in Dutchess County Vendors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Outside of Dutchess County in New York State
        </h5>
        <table class="table table-sm" style = "display: inline;">
            <thead>
                <tr>
                    <th></th>
                    <th> <br> Total Number of <br> Vendors in County </th>
                    <th>Annual Expense</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Accomodation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row1-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row1-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Administrative and <br> support services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row2-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row2-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Air transportation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row3-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row3-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Ambulatory health <br> care services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row4-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row4-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Amusements, <br> gambling, and <br> recreation <br> industries</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row5-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row5-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Broadcasting and <br> telecommunications</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row6-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row6-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Construction</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row7-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row7-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Data processing, <br> internet publishing, <br> and other <br> information servies</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row8-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row8-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Educational <br> services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row9-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row9-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td style = "max-width: 200px;">
                        <br>Total Number of <br> Vendors in County
                    </td>
                    <td style = "max-width: 200px;">
                        <br>Annual Expense
                    </td>
                </tr>
                <tr>
                    <th scope="row">Farms</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row10-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row10-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Federal Reserve <br> banks, credit <br> intermediation, and <br> related activities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row11-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row11-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Food and beverage <br> stores</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row12-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row12-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Food servies and <br> drinking places</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row13-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row13-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Funds, trusts, and <br> other financial <br> vehicles</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row14-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row14-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">General <br> merchandise stores</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row15-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row15-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Hospitals</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row16-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row16-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Households</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row17-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row17-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Insurance carriers <br> and related <br> activities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row18-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row18-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td style = "max-width: 200px;">
                        <br>Total Number of <br> Vendors in County
                    </td>
                    <td style = "max-width: 200px;">
                        <br>Annual Expense
                    </td>
                </tr>
                <tr>
                    <th scope="row">Management of <br> companies and <br> enterprises</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row19-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row19-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Motion picture and <br> sound recording <br> industries</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row20-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row20-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Motor vehicle and <br> parts dealers</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row21-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row21-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Nursing and <br> residential care <br> facilities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row22-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row22-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Other retail</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row23-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row23-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Other services *</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row24-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row24-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Other transportation <br> and support <br> activities *</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row25-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row25-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Performing arts, <br> spectator sports, <br> museums, and <br> related activities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row26-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row26-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Printing and related <br> support activities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row27-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row27-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td style = "max-width: 200px;">
                        <br>Total Number of <br> Vendors in County
                    </td>
                    <td style = "max-width: 200px;">
                        <br>Annual Expense
                    </td>
                </tr>
                <tr>
                    <th scope="row">Professional, <br> scientific, and <br> technical services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row28-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row28-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Publishing <br> industries, except <br> internet (includes <br> software)</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row29-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row29-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Rail transportation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row30-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row30-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Real estate</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row31-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row31-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Rental and leasing <br> services and <br> lessors of intangible <br> assets</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row32-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row32-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Securities, <br> commodity <br> contracts, and <br> investments</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row33-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row33-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Social assistance</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row34-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row34-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Transit and ground <br> passenger <br> transportation *</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row35-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row35-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Truck transportation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row36-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row36-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td style = "max-width: 200px;">
                        <br>Total Number of <br> Vendors in County
                    </td>
                    <td style = "max-width: 200px;">
                        <br>Annual Expense
                    </td>
                </tr>
                <tr>
                    <th scope="row">Utilities *</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row37-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row37-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Warehousing and <br> storage</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row38-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row38-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Waste management <br> and remediation <br> services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row39-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row39-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Water <br> transportation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row40-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row40-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Wholesale trade</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row41-1" type="number" style = "width: 50%" required />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row41-2" type="number" style = "width: 50%" required />
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-sm" style = "display: inline;">
            <thead>
                <tr>
                    <th></th>
                    <th>Total Number of <br> Vendors in Outside <br> County, in NYS</th>
                    <th>Annual Expense</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"><br></th>
                <td style = "max-width: 200px;">
                    <input class="form-control" id = "" name="row1-3" type="number" style = "width: 50%" required />
                </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row1-4" type="number" style = "width: 50%" required />
            </td>
            </tr>
            <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row2-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row2-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row3-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row3-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row4-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row4-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row5-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row5-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row6-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row6-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row7-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row7-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row8-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row8-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row9-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row9-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td style = "max-width: 200px;">
                <br>Total Number of <br> Vendors in County
            </td>
            <td style = "max-width: 200px;">
                <br>Annual Expense
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row10-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row10-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row11-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row11-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row12-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row12-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row13-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row13-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row14-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row14-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row15-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row15-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row16-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row16-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row17-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row17-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row18-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row18-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td style = "max-width: 200px;">
                <br>Total Number of <br> Vendors in County
            </td>
            <td style = "max-width: 200px;">
                <br>Annual Expense
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row19-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row19-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row20-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row20-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row21-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row21-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row22-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row22-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row23-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row23-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row24-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row24-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row25-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row25-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row26-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row26-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row27-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row27-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td style = "max-width: 200px;">
                <br>Total Number of <br> Vendors in County
            </td>
            <td style = "max-width: 200px;">
                <br>Annual Expense
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row28-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row28-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row29-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row29-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row30-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row30-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row31-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row31-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row32-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row32-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row33-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row33-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row34-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row34-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row35-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row35-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row36-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row36-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td style = "max-width: 200px;">
                <br>Total Number of <br> Vendors in County
            </td>
            <td style = "max-width: 200px;">
                <br>Annual Expense
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row37-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row37-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row38-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row38-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row39-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row39-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row40-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row40-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row41-3" type="number" style = "width: 50%" required />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row41-4" type="number" style = "width: 50%" required />
            </td>
        </tr>
        
        </tbody>
        </table>

        <h5> *For any of the above "*" categories, please define here. </h5>
        <input class="form-control" id = "definitions" name="definitions" type="text" required/>

        <br><br>
        <h4> THANK YOU FOR YOUR PARTICIPATION, RESULTS WILL BE AGGREGATED AND SHARED WITH ORGANIZATIONS AS SOON AS POSSIBLE </h4>
        <input class="form-control" name="register" type="submit" value="Submit"> </input> 
        </form>
        
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src = "percentchecker.js"></script>