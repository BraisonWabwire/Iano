<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, size, price, image_path FROM images";
$result = $conn->query($sql);
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
            <div class="top-content">
                <h2>Welcome to I clothline designs, the best clothing platform, view our latest clothes..</h2>
            </div>
            <div class="bottom-content">
                <div class="gallery-container">
                    <h1>Image Gallery</h1>
                    <div class="gallery">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='gallery-item'>";
                                echo "<img src='" . $row['image_path'] . "' alt='" . $row['name'] . "'>";
                                echo "<h2>" . $row['name'] . "</h2>";
                                echo "<p>Size: " . $row['size'] . "</p>";
                                echo "<p>Price: Ksh." . $row['price'] . "</p>";
                                echo "</div>";
                            }
                        } else {
                            echo "No images found.";
                        }
                        ?>
                    </div>
                </div>
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

<?php
$conn->close();
?>