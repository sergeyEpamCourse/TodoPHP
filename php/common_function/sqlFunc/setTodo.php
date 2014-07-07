<?php

function setTodo($todo, $id) {
    $query = "UPDATE todo SET todo_content = '" . $todo . "' WHERE id = " . $id;
    return mysql_query($query);
}
