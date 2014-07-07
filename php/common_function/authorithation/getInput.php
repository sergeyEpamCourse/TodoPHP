<?php

include_once 'common_function/authorithation/hashPassword.php';

function checkLoginPassLength($str) {
//    $str_length = strlen($str);
//    if ($str_length > 8 && $str_length < 100) {
//        return false;
//    }
    return true;
}

//clear input text
function clearInputText($str) {
    return trim(htmlspecialchars(stripslashes($str)));
}

//get login or password from post
function getInputPost($input_str) {
    $filter_input = filter_input(INPUT_POST, $input_str);
    return $filter_input;
}

//get login or password
function getInput($input_str) {
    $res_str = getInputPost($input_str);
    if (!$res_str) {
        echo "Login or pass wrong.", '../reg_status.php';
        return;
    }

    $res_str = clearInputText($res_str);

    if (checkLoginPassLength($res_str)) {
        return $res_str;
    } else {
        echo "Login or pass to long or short.";
    }
    return false;
}

function getInputLogin($input_str) {
    return getInput($input_str);
}

function getInputPass($input_str) {
    return hashPassword(getInput($input_str));
}