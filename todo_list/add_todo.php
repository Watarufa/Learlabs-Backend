<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Activity</title>
</head>
<body>

<h2>Add new Activity</h2>
<form action="add_todo.php" method="POST">
    <label>Nama Activity:</label>
    <input type="text" name="judul" required><br><br>

    <label>Deskripsi:</label>
    <textarea name="description"></textarea><br><br>

    <input type="submit" name="submit" value="Tambah">
</form>

<?php
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $description = $_POST['description'];

    $sql = "INSERT INTO todo (judul, description) VALUES ('$judul', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>