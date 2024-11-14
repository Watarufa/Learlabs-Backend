<?php
include 'db.php';

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $sql = "DELETE FROM todo WHERE user=$user";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>