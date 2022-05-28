<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task edit</title>
</head>
<body>
Task Edit <br>
Было:
<?php
//var_dump($task);
echo $task->getText();
?>
<br>

<form action="http://localhost:8080/editTask" method="post">
    <input type="text" name="text" placeholder="<?php echo $task->getText() ?>">
    <input type="submit" name="change_task" value="Change task">
</form>

</body>

<style>

</style>
</html>