<?php 
   $db = mysqli_connect('localhost', 'root', '','todo');

   if(isset($_POST['add'])) {
       $task = $_POST['task'];

       mysqli_query($db, "INSERT INTO tasks (task) VALUES('$task')");
       header('location: index.php');

   }

   if(isset($_GET['del_task'])) {
       $id = $_GET['del_task'];
       mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
       header('location: index.php');
   }

   $tasks = mysqli_query($db, "SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo list</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="heading">
        <h2>todo list</h2>

    </div>
    <form method="POST" action="index.php">
        <?php if (isset($errors)) { ?>
            <p><?php echo  $errors; ?></p>
        <?php} ?>
        <input type="text" name="task" class="task_input">
        <button type="add" class="add_btn" name="add">Add task</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>task</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($row = mysqli_fetch_array($task))  {?> 
            <tr>
                <td><?php echo $row </td>
                <td class='task'>input tasks</td>
                <td class="delete">
                    <a href="index.php?del_task=<?php echo $row['id']; ?>">x</a>
            </tr>
            
            
            <?php } ?>
            
        
        </tbody>
    </table>
</body>
</html>