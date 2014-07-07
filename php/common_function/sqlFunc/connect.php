<?php
//connect to database
$host = 'localhost';
$database = 'todos';
$user = 'root';
$pswd = 'root';

$dbh = mysql_pconnect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");
mysql_set_charset('utf8');
