<?php
// Database connection details
$servername = "localhost"; // replace with your server details
$username = "root"; // replace with your database username
$password = ""; 
$dbname = "tailoring_business";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all data from the customers table
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        .no-records {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Customers Data</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Order Date</th>
                <th>Description</th>
                <th>Payment</th>
                <th>File Path</th>
                <th>Waist (Trauser)</th>
                <th>Thigh</th>
                <th>Hips (Trauser)</th>
                <th>Knees</th>
                <th>Bottom</th>
                <th>Full Length (Trauser)</th>
                <th>Waist (Skirt)</th>
                <th>Hips (Skirt)</th>
                <th>Full Length (Skirt)</th>
                <th>Shoulder</th>
                <th>Chest</th>
                <th>Waist Line</th>
                <th>Full Length (Shirt)</th>
                <th>Sleeve</th>
                <th>Created At</th>
              </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['order_date']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['payment']}</td>
                    <td>{$row['file_path']}</td>
                    <td>{$row['waist_trauser']}</td>
                    <td>{$row['thigh']}</td>
                    <td>{$row['hips_trauser']}</td>
                    <td>{$row['knees']}</td>
                    <td>{$row['bottom']}</td>
                    <td>{$row['full_length_trauser']}</td>
                    <td>{$row['waist_skirt']}</td>
                    <td>{$row['hips_skirt']}</td>
                    <td>{$row['full_length_skirt']}</td>
                    <td>{$row['shoulder']}</td>
                    <td>{$row['chest']}</td>
                    <td>{$row['waist_line']}</td>
                    <td>{$row['full_length_shirt']}</td>
                    <td>{$row['sleeve']}</td>
                    <td>{$row['created_at']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<div class='no-records'>No records found.</div>";
    }

    // Close the connection
    $conn->close();
    ?>
</div>

</body>
</html>
