<?php 

session_start();

require_once "condb.php";

?>

<?php 

if (isset($_POST['ccp'])) {
    $id = $_POST['ccp'];
    $ccp = "Uncomplete";

    $sql = $conn->prepare("UPDATE task SET state_ucp = :state_ucp WHERE id = :id ");
    $sql->bindParam(":state_ucp", $ccp);
    $sql->bindParam(":id", $id);
    $sql->execute();
    $result = $sql;

    if ($result) {
        $_SESSION['success'] = "This task is Uncompleted!";
        header("location: index.php");
    } else {
        $_SESSION['error'] = "Sorry, Can't complete this task!";
        header("location: index.php");
    }

}

?>