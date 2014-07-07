<?php

function setLoginPass($login, $password) {
    $query = "INSERT INTO todo SET login='" . $login . "', password='" . $password . "'";
    return mysql_query($query);
}
