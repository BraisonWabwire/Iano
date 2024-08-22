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
                <img src="./logo.png" alt="" srcset="" style="width: 75px; height: 75px;">
                <a href="">IWear Clothline</a>
            </div>
            <div class="right-header">
                <ul>
                    <li><a href="">Contact us</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="./logout.php">logout</a></li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="left-content">
                <h2>Welcome to I clothline designs, the best clothing platform, view our latest clothes..</h2>
            </div>
            <div class="right-content">

            </div>
        </div>
        <div class="footer">
            <div class="section1">
                <h2>Our location</h2>
                <ul>
                    <li>Nakuru, Kenya</li>
                    <li>P.O Box 20100</li>
                    <li>Opposite Holly Cross Church </li>
                    <li>Near Koleni stage</li>
                </ul>
            </div>
            <div class="section2">
                <h2>Our services</h2>
                <ul>
                    <li>Jeans seawing</li>
                    <li>fabric sewing</li>
                    <li>Cloath repairs</li>
                    <li>Customize designs</li>
                    <li>2D and 3D printing</li>
                </ul>
            </div>
            <div class="section3">
                <h2>Our contacts</h2>
                <ul>
                    <li>Whatsupp-072000000</li>
                    <li>facebook- <a href="">Cloathing@facebook.com</a> </li>
                    <li>Instagram- <a href="">Cloathing@Instagram.com</a> </li>
                    <li>linkedin- <a href="">Cloathing@linkedin.com</a> </li>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>