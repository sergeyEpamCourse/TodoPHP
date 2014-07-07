<?php

function getTodo($id) {
    $query = "SELECT todo_content FROM todo WHERE id = " . $id;
    return mysql_query($query);
}
