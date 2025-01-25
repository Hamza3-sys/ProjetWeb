

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $dbname = "admin";

    $conn = mysqli_connect($host, $db_user, $db_password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("SELECT Password FROM Professeur WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);

    if ($stmt->fetch()) {
        if (password_verify($password, $hashed_password)) {
            header("location: main.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Username does not exist.";
    }

    $stmt->close();
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Login.css">
    <title>Login</title>
</head>
<body>
<div class="login-container">
    <h1 class="login-title">LOGIN</h1>
    <form action="main.php" method="post" class="login-form">
        <input class="login-input" type="text" name="Username" placeholder="Username" required>
        <input class="login-input" type="password" name="Password" placeholder="Password" required>
        <button type="submit" class="login-btn">Login</button>
        <p class="login-footer">
            Don't you have an account? <a href="Signup.php" class="login-link">Sign up!</a>
        </p>
    </form>
</div>
</body>
</html>

