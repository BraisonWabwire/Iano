<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <div class="form">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $id_number = $_POST['id_number'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                if ($password !== $confirm_password) {
                    echo "Passwords do not match!";
                    exit;
                }

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $conn = new mysqli('localhost', 'root', '', 'user_auth');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, id_number, password) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssis", $first_name, $last_name, $email, $id_number, $hashed_password);

                if ($stmt->execute()) {
                    echo "Signup successful!";
                    header("Location: login.php");
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            }
            ?>
            <form action="" method="POST">
                <div class="form-box">
                    <h2>Signup</h2>
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Enter Email" required>
                    <input type="number" name="id_number" placeholder="ID Number" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <div class="buttons">
                        <button type="submit">Signup</button>
                        <h2>Already have an account? Click <a href="./login.html">here</a> to login</h2>
                        <h2>Return to <a href="./index.html">home</a></h2>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
