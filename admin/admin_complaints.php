<?php 
require 'functions.php';
$complaints = query("SELECT * FROM complaints order by create_at desc");

$query = "SELECT * FROM complaints WHERE 1";
if (!empty($_GET['status'])) {
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $query .= " AND status = '$status'";
}

if (!empty($_GET['category'])) {
    $category = mysqli_real_escape_string($conn, $_GET['category']);
    $query .= " AND category = '$category'";
}

if (!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query .= " AND (
        complaint_title LIKE '%$search%' OR
        complaint_description LIKE '%$search%'
    )";
}

$query .= " ORDER BY create_at DESC";

$complaints = query($query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints List - UniComplaint</title>
    <link rel="stylesheet" href="css/admin_complaints.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <span class="material-icons-round logo-icon">school</span>
                <div class="logo-text">
                    <span>UniComplaint</span>
                    <small>Admin Portal</small>
                </div>
                <span class="material-icons-outlined close-btn" id="close-sidebar">close</span>
            </div>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="admin_dashboard.php">
                        <span class="material-icons-outlined">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="admin_complaints.php" class="active">
                        <span class="material-icons-outlined">report_problem</span>
                        <span>Complaints</span>
                    </a>
                </li>
                <li>
                    <a href="manage_user.php">
                        <span class="material-icons-outlined">people</span>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <span class="material-icons-outlined">logout</span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="header-left">
                    <span class="material-icons-outlined menu-btn" id="open-sidebar">menu</span>
                    <div>
                        <h1>Dashboard Overview</h1>
                        <p class="welcome-text">Welcome back, admin. Here's what's happening at the university.</p>
                    </div>
                </div>
                <div class="header-right">
                    <span class="date-display">
                        <?php date_default_timezone_set("Asia/Jakarta");
                            echo "Today, " . date("F d, Y");
                        ?>
                    </span>
                </div>
            </header>

            <section class="filter-section">
                <form method="GET" class="filter-section">
                    <div class="filter-group">
                        <div class="filter-item">
                            <label>Filter by Status</label>
                            <select name="status">
                                <option value="">All Complaints</option>
                                <option value="pending">Pending</option>
                                <option value="progress">In Progress</option>
                                <option value="resolved">Resolved</option>
                            </select>
                        </div>

                        <div class="filter-item">
                            <label>Filter by Category</label>
                            <select name="category">
                                <option value="">All Categories</option>
                                <option value="itservices">IT Services</option>
                                <option value="facilities">Facilities</option>
                                <option value="academics">Academics</option>
                            </select>
                        </div>
                    </div>

                    <div class="search-group">
                        <label>Search</label>
                        <div class="search-input">
                            <input type="text" name="search" placeholder="Search complaints...">
                        </div>
                    </div>

                    <button type="submit" style="display:none;"></button>
                </form>

            </section>

            <section class="complaints-list-card card">
                <div class="table-responsive">
                    <table class="complaints-table detailed">
                        <thead>
                            <tr>
                                <th style="width: 35%;">Complaint Title</th>
                                <th>Category</th>
                                <th>Student</th>
                                <th>Submission Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $complaints as $complaint ) : ?>
                            <tr>
                                <td>
                                    <div class="complaint-info">
                                        <span class="title"><?= $complaint["complaint_title"] ?></span>
                                        <span class="description"><?= $complaint["complaint_description"] ?></span>
                                    </div>
                                </td>
                                <td><?= $complaint["category"] ?></td>
                                <td>
                                    <?php
                                    $user_id = $complaint['user_id'];
                                    $user = query("SELECT name FROM users WHERE user_id = $user_id")[0];
                                    echo $user['name'];
                                    ?>
                                </td>
                                <td><?= $complaint["create_at"] ?></td>
                                <td><span class="status badge-<?= $complaint["status"] ?>"><?= $complaint["status"] ?></span></td>
                                <td><a href="admin_complaint.php?complaint_id=<?= $complaint["complaint_id"] ?>" class="view-details">View Details</a></td>
                            </tr>
                            <?php endforeach; ?>
                            <!-- <tr>
                                <td>
                                    <div class="complaint-info">
                                        <span class="title">Cafeteria Food Quality</span>
                                        <span class="description">The food quality in the main cafeteria has decreased...</span>
                                    </div>
                                </td>
                                <td>Facilities</td>
                                <td>Anonymous</td>
                                <td>March 14, 2024</td>
                                <td><span class="status badge-progress">In Progress</span></td>
                                <td><a href="#" class="view-details">View Details</a></td>
                            </tr> -->
                            </tbody>
                    </table>
                </div>

                <!-- <div class="pagination-container">
                    <p class="showing-text">Showing 1 to 5 of 23 complaints</p>
                    <div class="pagination">
                        <button class="page-btn">Previous</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">Next</button>
                    </div>
                </div> -->
            </section>
        </main>
    </div>
    <script src="js/admin_complaints.js"></script>
</body>
</html>