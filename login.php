<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'user_auth');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            echo "<script>alert('Login successful!');</script>";
            header("Location: homepage.php");
            exit;
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('No account found with that email!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <form action="" method="POST">
                <div class="form-box">
                    <img src="./logo.png" alt="" srcset="" style="width: 75px; height: 75px;">
                    <h2>Login</h2>
                    <input type="email" name="email" placeholder="Enter Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <div class="buttons">
                        <button type="submit">Login</button>
                        <h2>Don't have an account? Click <a href="./signup.php">here</a> to signup</h2>
                        <h2>Return to <a href="./index.html">home</a></h2>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>