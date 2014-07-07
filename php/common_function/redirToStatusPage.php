<?php

function redirToStatusPage($status_msg, $path) {
    global $msg;
    $msg = $status_msg;
    $die_msg = " Wrong: browser redirect not worked!";
    header('Location: ' . $path);
    die($msg . $die_msg);
}