<?php

include_once 'php/checkLogin.php';
include_once 'php/common_function/redirToStatusPage.php';
include_once 'php/common_function/sqlFunc/getTodo.php';

$id = $_SESSION['id'];
$sqlRes = getTodo($id);

if ($sqlRes) {
    $arr = mysql_fetch_array($sqlRes);
    echo $arr['todo_content'];
} else {
    die("Some sql err get!");
}