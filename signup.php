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
                    echo "<script>alert('Passwords do not match!');</script>";
                    exit;
                }

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Database connection
                $conn = new mysqli('localhost', 'root', '', 'user_auth');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check for duplicate email or ID number
                $duplicate_check_stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR id_number = ?");
                $duplicate_check_stmt->bind_param("si", $email, $id_number);
                $duplicate_check_stmt->execute();
                $duplicate_check_result = $duplicate_check_stmt->get_result();

                if ($duplicate_check_result->num_rows > 0) {
                    echo "<script>alert('Email or ID number already exists!');</script>";
                } else {
                    // Insert new user into the database
                    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, id_number, password) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssis", $first_name, $last_name, $email, $id_number, $hashed_password);

                    if ($stmt->execute()) {
                        echo "<script>alert('Signup successful!');</script>";
                        header("Location: login.php");
                        exit;
                    } else {
                        echo "<script>alert('Error during signup. Please try again later.');</script>";
                    }

                    $stmt->close();
                }

                $duplicate_check_stmt->close();
                $conn->close();
            }
            ?>
            <form action="" method="POST">
                <div class="form-box">
                    <img src="./logo.png" alt="" srcset="" style="width: 75px; height: 75px;">

                    <h2>Signup</h2>
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Enter Email" required>
                    <input type="number" name="id_number" placeholder="ID Number" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <div class="buttons">
                        <button type="submit">Signup</button>
                        <h2>Already have an account? Click <a href="./login.php">here</a> to login</h2>
                        <h2>Return to <a href="./index.html">home</a></h2>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>