<?php
//not used script

include_once 'php/checkLogin.php';
include_once 'php/common_function/redirToStatusPage.php';
include_once 'php/common_function/sqlFunc/setTodo.php';

$id = $_SESSION['id'];
$todo = filter_input(INPUT_POST, 'todos');

if (!setTodo($todo, $id)) {
    echo "Some sql err in save!";
} else {
    echo "Todo save!";
}