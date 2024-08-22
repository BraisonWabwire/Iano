<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <link rel="stylesheet" href="./admin-login.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <div class="title">
                <img src="./logo.png" alt="" srcset="" style="width: 75px; height: 75px;">
                <h2>Welcome back!</h2>
                <p>Log in to your admin account</p>
            </div>
            <div class="main-form">
                <form action="" method="POST">
                    <input type="text" name="username" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                    <div class="buttons">
                        <button type="submit">Login</button>
                        <p>Go back home <a href="./index.html">click here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $correctUsername = "IANMUSIC";
        $correctPassword = "IANMUSIC123";

        if ($username === $correctUsername && $password === $correctPassword) {
            echo "<script>alert('Login successful!');</script>";
            // Redirect to admin dashboard or another page
            header('Location: admin-dashboard.php');
        } else {
            echo "<script>alert('Incorrect username or password');</script>";
        }
    }
    ?>
</body>

</html>