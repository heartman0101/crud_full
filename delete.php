<?php

session_start();

require_once "condb.php";

?>

<?php

$id = $_POST['delete'];

try {

    $sql = $conn->prepare("DELETE FROM task WHERE id = :id");
    $sql->bindParam(":id", $id);
    $sql->execute();
    $s = $sql;

    if ($s) {
        $_SESSION['success'] = "Deleted task!";
        header("location: index.php");
    } else {
        $_SESSION['error'] = "Sorry, Can't delete task!";
        header("location: index.php");
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>