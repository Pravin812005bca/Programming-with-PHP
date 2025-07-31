<?php
include 'db.php';

// Step 1: Get user ID from URL
$id = $_GET['id'];

// Step 2: Fetch user data
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<h2>Edit User</h2>
<form method="POST">
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br>
    <input type="text" name="password" value="<?php echo $row['password']; ?>" required><br>
    <button type="submit" name="update">Update</button>
</form>

<?php
// Step 3: Update logic
if (isset($_POST['update'])) {
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_phone = $_POST['phone'];
    $new_password = $_POST['password'];

    $update_sql = "UPDATE users SET 
                   name = '$new_name',
                   email = '$new_email',
                   phone = '$new_phone',
                   password = '$new_password'
                   WHERE id = $id";

    if (mysqli_query($conn, $update_sql)) {
        echo "✅ User updated successfully!";
        header("Location: users.php"); // redirect back
        exit();
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>
