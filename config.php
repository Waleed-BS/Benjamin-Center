<?php

// locate the mysql.sock

// in my macbook
$dbhost = 'localhost:/tmp/mysql.sock';

// in wyvern
// $dbhost = 'localhost:/var/lib/mysql/mysql.sock';

// user
$dbuser = 'root';

// $dbuser = 'n02575037';

// $dbpass = 
// $dbpass =

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

mysql_select_db('Benjamin');

// mysql_select_db('n02575037_db')

?>
