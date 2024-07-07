<?php 

require_once "condb.php";

session_start();

?>

<?php 

if (isset($_POST['update'])) {
    $task_list = $_POST['lol'];
    $id = $_POST['id'];

    $sql = $conn->prepare("UPDATE task set task_list = :task_list WHERE id = :id ");
    $sql->bindParam(":task_list", $task_list);
    $sql->bindParam(":id", $id);
    $sql->execute();
    $result = $sql;

    if ($result) {
        $_SESSION['success'] = "Updated task!";
        header("location: index.php");
    } else {
        $_SESSION['error'] = "Sorry, Can't Update this task!";
        header("location: index.php");
    }

}

?>