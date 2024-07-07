<?php

session_start();
require_once "condb.php";

?>

<?php

if (isset($_POST['add'])) {
    $task_list = $_POST['lol'];
    $state_ucp = "Uncomplete";

    if (empty($task_list)) {
        $_SESSION['warning'] = 'Your task must not be empty!';
        header("location: index.php");
    } else {
        try {

            $check_task = $conn->prepare("SELECT * FROM task WHERE task_list = :task_list ");
            $check_task->bindParam(":task_list", $task_list);
            $check_task->execute();
            $row = $check_task->fetch(PDO::FETCH_ASSOC);

            if ($row['task_list'] == $task_list) {
                $_SESSION['warning'] = "This task is already exist!";
                header("location: index.php");
            } else {
                $sql = $conn->prepare("INSERT INTO task (task_list, state_ucp) VALUES (:task_list, :state_ucp) ");
                $sql->bindParam(':task_list', $task_list);
                $sql->bindParam(':state_ucp', $state_ucp);
                $sql->execute();
                $result = $sql;

                if ($result) {
                    $_SESSION['success'] = "Added task!";
                    header("location: index.php");
                } else {
                    $_SESSION['error'] = "Can't add task!";
                    header("location: index.php");
                }
            }

        } catch (PDOException $e) {
            echo "Something accidentally: " . $e->getMessage();
        }
    }

}

?>