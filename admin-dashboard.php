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

// Handle delete request
if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $deleteSql = "DELETE FROM customers WHERE id = $deleteId";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch records from database
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Products Dashboard </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./admin-dashbord.css">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      margin-top: 10px;
      background-color: #2c394f;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table th,
    table td {
      padding: 5px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    table td {
      color: grey;
      border: none;
    }

    table th {
      background-color: #1f1c2e;
      font-weight: normal;
      color: white;
    }

    table tr:nth-child(even) {
      background-color: #2c394f;
    }

    .delete-button {
      background-color: white;
      color: black;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 10px;
      text-transform: lowercase;
      width: 70px;
    }
    .delete-button:hover{
      background-color:#cb2d6f ;
      color: white;
    }
  </style>

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="app-container">
    <div class="sidebar">
      <div class="sidebar-header">
        <div class="app-icon">
        <img src="./logo.png" alt="" srcset="" style="width: 75px; height: 75px;">
        </div>
      </div>
      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-home">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
              <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
            <span>Home</span>
          </a>
        </li>
        <li class="sidebar-list-item active">
          <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-shopping-bag">
              <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
              <line x1="3" y1="6" x2="21" y2="6" />
              <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            <span>Customers</span>
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="fetched.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-pie-chart">
              <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
              <path d="M22 12A10 10 0 0 0 12 2v10z" />
            </svg>
            <span>Broad Measurements</span>
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="IMGCollageUpload.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-inbox">
              <polyline points="22 12 16 12 14 15 10 15 8 12 2 12" />
              <path
                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
            </svg>
            <span>Upload designs</span>
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="admin-logout.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-bell">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
              <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
            <span>logout</span>
          </a>
        </li>
      </ul>
      <div class="account-info">
        <div class="account-info-picture">
          <img
            src="https://images.unsplash.com/photo-1527736947477-2790e28f3443?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE2fHx3b21hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
            alt="Account">
        </div>
        <div class="account-info-name">Ian G.</div>
        <button class="account-info-more">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-more-horizontal">
            <circle cx="12" cy="12" r="1" />
            <circle cx="19" cy="12" r="1" />
            <circle cx="5" cy="12" r="1" />
          </svg>
        </button>
      </div>
    </div>
    <div class="app-content">
      <div class="app-content-header">
        <h1 class="app-content-headerText">Customers</h1>
        <button class="mode-switch" title="Switch Theme">
          <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
            <defs></defs>
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
          </svg>
        </button>
        <a href="process_customer.php"><button class="app-content-headerButton">Add Customer</button></a>
      </div>
      <div class="app-content-actions">
        <input class="search-bar" name="search" placeholder="Search by name..." type="text"
          value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <div class="app-content-actions-wrapper">
          <div class="filter-button-wrapper">
            <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
              </svg></button>
            <div class="filter-menu">
              <label>Category</label>
              <select>
                <option>Names</option>
                <option>Phone number</option>
                <option>Decoration</option>
                <option>status</option>
                <option>Order</option>
              </select>
              <label>Status</label>
              <select>
                <option>All Status</option>
                <option>Active</option>
                <option>Disabled</option>
              </select>
              <div class="filter-menu-buttons">
                <button class="filter-button reset">
                  Reset
                </button>
                <button class="filter-button apply">
                  Apply
                </button>
              </div>
            </div>
          </div>
          <button class="action-button list active" title="List View">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-list">
              <line x1="8" y1="6" x2="21" y2="6" />
              <line x1="8" y1="12" x2="21" y2="12" />
              <line x1="8" y1="18" x2="21" y2="18" />
              <line x1="3" y1="6" x2="3.01" y2="6" />
              <line x1="3" y1="12" x2="3.01" y2="12" />
              <line x1="3" y1="18" x2="3.01" y2="18" />
            </svg>
          </button>
          <button class="action-button grid" title="Grid View">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-grid">
              <rect x="3" y="3" width="7" height="7" />
              <rect x="14" y="3" width="7" height="7" />
              <rect x="14" y="14" width="7" height="7" />
              <rect x="3" y="14" width="7" height="7" />
            </svg>
          </button>
        </div>
      </div>
      <div class="products-area-wrapper tableView">
        <div class="products-header">
          <div class="product-cell image">
            <!-- Names -->
            </button>
          </div>
          <div class="product-cell category"><button class="sort-button">
            </button></div>
          <div class="product-cell status-cell"><button class="sort-button">
            </button></div>
          <div class="product-cell sales"><button class="sort-button">
            </button></div>
          <div class="product-cell stock"><button class="sort-button">
            </button></div>
          <div class="product-cell price"><button class="sort-button">
            </button></div>
        </div>
        <div class="products-row">
          <?php
          if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>";

            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <form method='POST' action='' onsubmit='return confirm(\"Are you sure you want to delete this record?\");'>
                            <input type='hidden' name='delete_id' value='{$row['id']}'>
                            <button type='submit' class='delete-button'>Delete</button>
                        </form>
                    </td>
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

      </div>
      <!-- partial -->
      <script src="./script.js"></script>

</body>

</html>