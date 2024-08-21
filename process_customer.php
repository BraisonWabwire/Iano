<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="process_customer.css">
</head>

<body>
    <form action="process_customer.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="header">
                <div class="left-header"></div>
                <div class="right-header">
                    <h1>Customer</h1>
                    <a href="homepage.php">Home</a>
                </div>


            </div>
            <div class="main-content">
                <div class="top-content">
                    <div class="personal-details">
                        <h2>personal details</h2>
                        <input type="text" name="name" placeholder="name" required>
                        <input type="text" name="phone_number" placeholder="phone number" required>
                        <input type="email" name="email" placeholder="email" required>
                    </div>
                    <div class="order-details">
                        <h2>Order</h2>
                        <input type="date" name="order_date" required>
                        <textarea name="description" placeholder="design description" required></textarea>
                        <input type="text" name="payment" placeholder="payment" required>
                        <input type="file" name="file" required>
                    </div>
                </div>
                <div class="bottom-content">
                    <h2>Measurements</h2>
                    <div class="middle-content">
                        <div class="trauser">
                            <h2 style="text-align: center;">trauser</h2>
                            <input type="text" name="waist_trauser" placeholder="waist">
                            <input type="text" name="thigh" placeholder="Thigh">
                            <input type="text" name="hips_trauser" placeholder="Hips">
                            <input type="text" name="knees" placeholder="Knees">
                            <input type="text" name="bottom" placeholder="Bottom">
                            <input type="text" name="full_length_trauser" placeholder="Full length">
                        </div>
                        <div class="skirt">
                            <h2 style="text-align: center;">Skirt</h2>
                            <input type="text" name="waist_skirt" placeholder="waist">
                            <input type="text" name="hips_skirt" placeholder="hips">
                            <input type="text" name="full_length_skirt" placeholder="Full length">
                        </div>
                        <div class="shirt">
                            <h2 style="text-align: center;">Shirt</h2>
                            <input type="text" name="shoulder" placeholder="shoulder">
                            <input type="text" name="chest" placeholder="Chest">
                            <input type="text" name="waist_line" placeholder="waist line">
                            <input type="text" name="full_length_shirt" placeholder="Full length">
                            <input type="text" name="sleeve" placeholder="Sleeve">
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <button type="submit">Upload customer details</button>
                <button type="reset">Clear</button>
            </div>
        </div>
    </form>
</body>

</html>




<?php
$servername = "localhost"; // replace with your server details
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "tailoring_business"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data safely
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $order_date = isset($_POST['order_date']) ? $_POST['order_date'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $payment = isset($_POST['payment']) ? $_POST['payment'] : '';

    // Handle file upload safely
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileSize < 1000000) { // Limit file size to 1MB
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too big!";
                exit();
            }
        } else {
            echo "You cannot upload files of this type!";
            exit();
        }
    } else {
        echo "There was an error with the file upload!";
        exit();
    }

    // Retrieve measurements safely
    $waist_trauser = isset($_POST['waist_trauser']) ? $_POST['waist_trauser'] : '';
    $thigh = isset($_POST['thigh']) ? $_POST['thigh'] : '';
    $hips_trauser = isset($_POST['hips_trauser']) ? $_POST['hips_trauser'] : '';
    $knees = isset($_POST['knees']) ? $_POST['knees'] : '';
    $bottom = isset($_POST['bottom']) ? $_POST['bottom'] : '';
    $full_length_trauser = isset($_POST['full_length_trauser']) ? $_POST['full_length_trauser'] : '';

    $waist_skirt = isset($_POST['waist_skirt']) ? $_POST['waist_skirt'] : '';
    $hips_skirt = isset($_POST['hips_skirt']) ? $_POST['hips_skirt'] : '';
    $full_length_skirt = isset($_POST['full_length_skirt']) ? $_POST['full_length_skirt'] : '';

    $shoulder = isset($_POST['shoulder']) ? $_POST['shoulder'] : '';
    $chest = isset($_POST['chest']) ? $_POST['chest'] : '';
    $waist_line = isset($_POST['waist_line']) ? $_POST['waist_line'] : '';
    $full_length_shirt = isset($_POST['full_length_shirt']) ? $_POST['full_length_shirt'] : '';
    $sleeve = isset($_POST['sleeve']) ? $_POST['sleeve'] : '';

    // SQL query to insert data into the database
    $sql = "INSERT INTO customers (name, phone_number, email, order_date, description, payment, file_path, waist_trauser, thigh, hips_trauser, knees, bottom, full_length_trauser, waist_skirt, hips_skirt, full_length_skirt, shoulder, chest, waist_line, full_length_shirt, sleeve) 
            VALUES ('$name', '$phone_number', '$email', '$order_date', '$description', '$payment', '$fileDestination', '$waist_trauser', '$thigh', '$hips_trauser', '$knees', '$bottom', '$full_length_trauser', '$waist_skirt', '$hips_skirt', '$full_length_skirt', '$shoulder', '$chest', '$waist_line', '$full_length_shirt', '$sleeve')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>