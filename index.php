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
        <!-- <h1>To Do list</h1> -->
        <div class="container-top">
            <div class="Analyze">
                <div class="h1">Data</div>
                <div class="ana-con">
                    <div class="card card-total">
                        <?php

                        $count = "SELECT COUNT(*) as task_list FROM task";
                        $query = $conn->prepare($count);
                        $query->execute();
                        $rel = $query->fetch();
                        ?>

                        Total <?php echo $rel['task_list'] ?>
                    </div>
                    <div class="card card-complete">
                        <?php

                        $count = "SELECT COUNT(*) as complete FROM task WHERE state_ucp = 'Complete' ";
                        $query = $conn->prepare($count);
                        $query->execute();
                        $rel = $query->fetch();
                        ?>

                        Complete <?php echo $rel['complete'] ?>
                    </div>
                    <div class="card card-uncomplete">
                        <?php

                        $count = "SELECT COUNT(*) as uncomplete FROM task WHERE state_ucp = 'Uncomplete' ";
                        $query = $conn->prepare($count);
                        $query->execute();
                        $rel = $query->fetch();
                        ?>

                        Uncomplete <?php echo $rel['uncomplete'] ?>
                    </div>
                </div>
            </div>
            <div class="input-form">
                <h1>To Do List</h1>
                <form class="form-controle" action="add_list.php" method="post">
                    <input type="text" name="lol" placeholder="Add task">
                    <button class="add" type="submit" name="add">ADD</button>
                </form>
            </div>
        </div>

        <form action="delete_all.php" method="post">
            <button class="del-all" name="del-all" >Clear task</button>
        </form>

    </div>
    <div class="bottom-container">
        <?php

        $sql = $conn->prepare("SELECT * FROM task");
        $sql->execute();
        $row = $sql->fetchAll();
        $result = $row;

        foreach ($result as $rows) { ?>

            <div class="card-list <?php echo $rows['state_ucp'] ?>">
                <div class="card-task">
                    <?php echo $rows['task_list'] ?>
                </div>
                <div class="action">
                    <form action="edit.php" method="post">
                        <button class="edit" type="submit" name="edit" value="<?php echo $rows['id'] ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </form>
                    <form action="delete.php" method="post" class="delete">
                        <button type="submit" class="delete" name="delete" value="<?php echo $rows['id'] ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    <form action="ccp.php" method="post">
                        <button type="submit" class="Complete" value="<?php echo $rows['id'] ?>" name="ccp">
                            Complete
                        </button>
                    </form>
                    <form action="ucp.php" method="post">
                        <button type="submit" class="Uncomplete" value="<?php echo $rows['id'] ?>" name="ccp">
                            Uncomplete
                        </button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>

    <?php if (isset($_SESSION['error'])) { ?>
        <script>
            Swal.fire({
                title: "Ops...!",
                text: "<?php echo $_SESSION['error'] ?>",
                icon: "error",
                confirmButtonColor: "rgb(0,158,255)"
            });
        </script>
        <?php unset($_SESSION['success']) ?>
    <?php } ?>

    <?php if (isset($_SESSION['success'])) { ?>
        <script>
            Swal.fire({
                title: "Congratulation!",
                text: "<?php echo $_SESSION['success'] ?>",
                icon: "success",
                confirmButtonColor: "rgb(0,158,255)"
            });
        </script>
        <?php unset($_SESSION['success']) ?>
    <?php } ?>

    <?php if (isset($_SESSION['warning'])) { ?>
        <script>
            Swal.fire({
                title: "Oh, no!",
                text: "<?php echo $_SESSION['warning'] ?>",
                icon: "warning",
                confirmButtonColor: "rgb(0,158,255)"
            });
        </script>
        <?php unset($_SESSION['warning']) ?>
    <?php } ?>

</body>
</html>