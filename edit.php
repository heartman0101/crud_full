<?php

session_start();
require_once "condb.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD full system</title>

    <!-- import css style files -->

    <link rel="stylesheet" href="style.css">

    <!-- import css framwwork -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">

</head>

<body>

    <div class="todo-top">
        <div class="container-top">
            <div class="ed">
                <h1>To Do List</h1>
                <form class="form-controle" action="update.php" method="post">

                    <?php
                    
                    if (isset($_POST['edit'])) {
                        $id = $_POST['edit'];

                        $sql = $conn->prepare("SELECT * FROM task WHERE id = :id");
                        $sql->bindParam(':id', $id);
                        $sql->execute();
                        $row = $sql->fetch(PDO::FETCH_ASSOC);
                    }
                    
                    ?>

                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" id="">

                    <input type="text" name="lol" placeholder="Add task" value="<?php echo $row['task_list'] ?>" >
                    <button class="add" type="submit" name="update" >Update</button>
                    <a href="index.php" class="cancle" >Cancle</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>