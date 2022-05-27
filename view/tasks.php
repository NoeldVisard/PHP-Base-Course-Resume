<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List</title>
</head>
<body>
ToDoList
<form action="http://localhost:8080/addTaskController" method="post">
    <input type="text" name="text" placeholder="task">
    <input type="submit" name="add_task" value="Add task">
</form>

<?php

if ($tasks){
    echo "<ul>";
    foreach ($tasks as $task) {
        echo "<li><form action='http://localhost:8080/deleteTaskController'><input type='submit' value='x'> " . $task->getText() . ";</li>";
    }
    echo "</ul>";
}

?>

</body>

<style>
</style>