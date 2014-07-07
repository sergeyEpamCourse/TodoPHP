<?php

include_once 'common_function/sqlFunc/connect.php';
include_once 'common_function/authorithation/getInput.php';
include_once 'common_function/sqlFunc/isLoginExist.php';
include_once 'common_function/sqlFunc/setLoginPass.php';

$login = getInputLogin('login');

if (isLoginExist($login)) {
    die("Login exists.");
}

$password = getInputPass('password');

if (setLoginPass($login, $password)) {
    echo "Registration done.";
} else {
    echo "Registration not done.";
}