<?php

function isLoginExist($login) {
    $query = "SELECT COUNT(*) FROM todo WHERE login = '" . $login . "'";
    $res = mysql_query($query);
    if (mysql_result($res, 0) > 0) {
        return true;
    }
    return false;
}
