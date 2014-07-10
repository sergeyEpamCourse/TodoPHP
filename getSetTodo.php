<?php

include_once 'php/checkLogin.php';
include_once 'php/common_function/redirToStatusPage.php';
include_once 'php/common_function/sqlFunc/getTodo.php';
include_once 'php/common_function/sqlFunc/setTodo.php';

$id = $_SESSION['id'];
$req = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($req == 'GET') {
    $sqlRes = getTodo($id);

    if ($sqlRes) {
        $arr = mysql_fetch_array($sqlRes);
        echo $arr['todo_content'];
    } else {
        die("Some sql err get!");
    }
}

if ($req == 'POST') {
    $todo = filter_input(INPUT_POST, 'todos');

    if (!setTodo($todo, $id)) {
        echo "Some sql err in save!";
    } else {
        echo "Todo save!";
    }
}