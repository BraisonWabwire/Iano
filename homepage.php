<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src=""></script>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="left-header">
                <a href="">IWear Clothline</a>
            </div>
            <div class="right-header">
                <ul>
                    <li><a href="./process_customer.php">Measurements</a></li>
                    <li><a href="./dashboard.php">Contact us</a></li>
                    <li><a href="./fetched.php">FAQs</a></li>
                    <li><a href="./logout.php">logout</a></li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="left-content">
                <h2>Welcome to I clothline designs, the best clothing platform</h2>
            </div>
            <div class="right-content">

            </div>
        </div>
        <div class="footer">

        </div>
    </div>
</body>

</html>