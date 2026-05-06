<?php 

$host = "localhost";
$username = "root";
<<<<<<< HEAD
$password = "";
=======
$password = "65500706960";
>>>>>>> 6db8e2594f25dd62f7e2e8ad32e36112b14b71d8
$dbname = "crud_task";

try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
