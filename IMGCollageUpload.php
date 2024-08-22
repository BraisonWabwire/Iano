<!-- upload.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link rel="stylesheet" href="IMGCollageUpload.css">
</head>

<body>
    <div class="container">
        <img src="./logo.png" alt="" srcset="" style="width: 75px; height: 75px;">

        <h1>Upload Design</h1>
        <form action="IMGCollageUpload.php" method="POST" enctype="multipart/form-data">
            <input type="text" id="name" name="name" required placeholder="design name e.g skirt">

            <input type="text" id="size" name="size" required placeholder="size">

            <input type="number" id="price" name="price" step="0.01" required placeholder="price">
            <p>upload image design below</p>
            <input type="file" id="image" name="image" accept="image/*" required>
            
            <button type="submit" name="submit" value="Upload">upload</button>
        </form>
    </div>
</body>

</html>


<!-- upload.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target_dir = "IMGCollageUploads/";
    $target_file = $target_dir . basename($image);

    // Upload the image to the server
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO images (name, size, price, image_path) VALUES ('$name', '$size', '$price', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Image upload successfull!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file');</script>";
    }
}

$conn->close();
?>