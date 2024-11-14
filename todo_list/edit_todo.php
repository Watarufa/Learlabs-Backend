<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Activity</title>
</head>
<body>

<h2>Edit Activity</h2>

<?php
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $result = $conn->query("SELECT * FROM todo WHERE user=$user");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form action="edit_todo.php" method="POST">
            <input type="hidden" name="user" value="<?php echo $row['user']; ?>">

            <label>Nama Activity:</label>
            <input type="text" name="judul" value="<?php echo $row['judul']; ?>" required><br><br>

            <label>Deskripsi:</label>
            <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>

            <input type="submit" name="update" value="Update">
        </form>
        <?php
    }
}
if (isset($_POST['update'])) {
    $user = $_POST['user'];
    $judul = $_POST['judul'];
    $description = $_POST['description'];

    $sql = "UPDATE todo SET judul='$judul', description='$description' WHERE user=$user";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>