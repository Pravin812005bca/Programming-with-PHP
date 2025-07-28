<!-- // 📁 users.php (Day 5: Display Data in Dashboard from DB) -->

<?php
session_start();

// If user not logged in, redirect to login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Step 1: Connect to DB
include 'db.php';


// 🟨 SQL Query: Fetch all users from DB
$db_table = "users";

$sql = "SELECT id,name,phone, email, password FROM $db_table";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Users List</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #000;
            text-align: center;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">👋 Welcome, <?php echo $_SESSION['user']; ?>!</h2>
    <h3 style="text-align: center;">📋 Users List from DB</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone no</th>
            <th>Password</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        ?>
    </table>

    <p style="text-align:center;"><a href="logout.php">Logout</a></p>

</body>

</html>