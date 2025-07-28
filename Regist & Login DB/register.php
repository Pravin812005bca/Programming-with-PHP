<?php include 'db.php'; ?>

<!-- HTML Form UI -->
<form method="POST" action="">
  <input type="text" name="full_name" placeholder="Full Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="text" name="phone" placeholder="Phone Number" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit" name="register">Register</button>

</form>

<?php
if (isset($_POST['register'])) {
  $name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $pass = $_POST['password'];

  // ❗ Use correct column name: name instead of full_name
  $sql = "INSERT INTO users (name, email, phone, password) 
          VALUES ('$name', '$email', '$phone', '$pass')";

  if (mysqli_query($conn, $sql)) {
    echo "✅ Registered Successfully!";
  } else {
    echo "❌ Error: " . mysqli_error($conn);
  }
}
?>