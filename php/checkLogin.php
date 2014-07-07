<?php

include_once 'common_function/sqlFunc/connect.php';
include_once 'common_var/reg_status_msg.php';
include_once 'common_function/redirToStatusPage.php';

session_start();

if (!isset($_SESSION['id'])) {
    redirToStatusPage("Not login.", 'reg_status.php');
}