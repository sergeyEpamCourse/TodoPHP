<?php

include_once 'common_function/sqlFunc/connect.php';
include_once 'common_function/authorithation/getInput.php';
include_once 'common_function/sqlFunc/getIdPass.php';

//enter, set session
session_start();

$login = getInputLogin('login');
$password = getInputPass('password');

$arr = getIdPass($login);
if ($arr['password'] === $password) {
    $_SESSION['id'] = $arr['id'];
    echo "YES";
} else {
    echo "Wrong password.";
}