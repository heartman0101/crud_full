<?php 

session_start();

require_once "condb.php";

?>

<?php 

if(isset($_POST['del-all'])) {
    $id = $_POST['del-all'];
    
    $stmt = $conn->prepare("DELETE FROM task");
    $stmt->execute();
    $result = $stmt;

    if ($stmt->rowCount() == 0) {
        $_SESSION['warning'] = "Don't have any information!";
        header("location: index.php");
    } elseif ($result) {
        $_SESSION['success'] = "Deleted all task";
        header("location: index.php");
    } else {
        $_SESSION['error'] = "Can't delete all task";
        header("location: index.php");
    }

}

?>