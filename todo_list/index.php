<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
</head>
<body>

<h1>Todo List</h1>
<a>L0124088_Ariwata Alfajri</a><br>
<a href="add_todo.php">Add new Activity to do list</a>

<?php
$result = $conn->query("SELECT * FROM todo");
if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<strong>" . $row['judul'] . "</strong> - " . $row['description'];
        echo " <a href='edit_todo.php?user=" . $row['user'] . "'>Edit</a> ";
        echo " <a href='delete_todo.php?user=" . $row['user'] . "'>Hapus</a>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "Todo-nya Empty.";
}

$conn->close();
?>

</body>
</html>