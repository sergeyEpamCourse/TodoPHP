<?php

function getIdPass($login) {
    $query = "SELECT id, password FROM todo WHERE login = '" . $login . "'";
    $res = mysql_query($query);
    if (!$res) {
        die("SQL err.");
    }
    return mysql_fetch_assoc($res);
}
