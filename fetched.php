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

// Check if a search term is provided
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Modify the SQL query to filter results by name
if ($searchTerm) {
    $sql = "SELECT * FROM customers WHERE name LIKE '%$searchTerm%'";
} else {
    $sql = "SELECT * FROM customers";
}

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
            background-color: #1f1c2e;
            color: grey;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            overflow-x: auto;
        }

        h1 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #2c394f;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            position: sticky;
            top: 0;
            background-color: #1f1c2e;
            z-index: 2;
        }

        table th,
        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            width: 150px; /* Set a consistent width */
        }

        table th {
            font-weight: normal;
            color: white;
            background-color: #1f1c2e;
        }

        table tbody {
            display: block;
            max-height: 400px;
            overflow-y: auto;
        }

        table thead,
        table tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        table tr:nth-child(even) {
            background-color: #2c394f;
        }

        table tr:hover {
            background-color: #333;
        }

        .search-bar {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            background-color: #333;
            color: white;
        }

        .search-bar::placeholder {
            color: #aaa;
        }

        .no-records {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .image-thumbnail {
            width: 100px;
            height: auto;
            transition: transform 0.3s ease-in-out;
            /* Smooth transition */
        }

        .image-thumbnail:hover {
            transform: scale(5);
            /* Enlarge the image by 20% */
        }
        .back-navigation button{
            width: 200px;
            height: 50px;
            background-color: #cb2d6f;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 17px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="back-navigation">
            <a href="admin-dashboard.php"><button>Go Back</button></a>
        </div>
        <h1>Customers Data</h1>
        <form method="GET" action="">
            <input class="search-bar" name="search" placeholder="Search by name..." type="text"
                value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        </form>

        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Order Date</th>
                    <th>Description</th>
                    <th>Payment</th>
                    <th>Image</th>
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
                </tr>
            </thead>
            <tbody>";

            while ($row = $result->fetch_assoc()) {
                $imagePath = htmlspecialchars($row['file_path']); // Ensure the file path is safe to output
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['order_date']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['payment']}</td>
                    <td><img src='{$imagePath}' alt='Image' class='image-thumbnail'></td>
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

            echo "</tbody>";
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
