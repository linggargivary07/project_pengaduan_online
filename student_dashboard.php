<?php
require 'functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
// ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - UniPortal</title>
    <link rel="stylesheet" href="css/student_dashboard.css">
    <link rel="stylesheet" href="css/base.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <span class="material-icons-round logo-icon">school</span>
                <div class="logo-text">
                    <span>UniPortal</span>
                    <small>Student Portal</small>
                </div>
                <span class="material-icons-outlined close-btn" id="close-sidebar">close</span>
            </div>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="#" class="active">
                        <span class="material-icons-outlined">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="material-icons-outlined">assignment</span>
                        <span>My Complaints</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="material-icons-outlined">settings</span>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header student-header">
                <div class="header-left">
                    <span class="material-icons-outlined menu-btn" id="open-sidebar">menu</span>
                    <div>
                        <h1>Dashboard</h1>
                        <p class="welcome-text">Welcome back, Alex</p>
                    </div>
                </div>
                <div class="header-right">
                    <a href="add_complaint.php" style="text-decoration: none;">
                            <button class="btn-new-complaint">
                                <span class="material-icons-outlined">add</span>
                                <span>New Complaint</span>
                            </button>
                    </a>
                </div>
            </header>

            <section class="card student-card">
                <div class="card-header-flex">
                    <h2>Recent Complaints</h2>
                    <div class="filter-dropdown">
                        <select class="form-control-sm">
                            <option>All Status</option>
                            <option>Pending</option>
                            <option>In Progress</option>
                            <option>Resolved</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="complaints-table student-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#C-1247</td>
                                <td class="bold-title">Library AC not working</td>
                                <td>Facilities</td>
                                <td>Dec 10, 2024</td>
                                <td><span class="status-student badge-pending-v2"><span class="dot"></span> Pending</span></td>
                                <td><a href="#" class="view-link">View</a></td>
                            </tr>
                            <tr>
                                <td>#C-1246</td>
                                <td class="bold-title">Wi-Fi connectivity issues in dorm</td>
                                <td>IT Services</td>
                                <td>Dec 8, 2024</td>
                                <td><span class="status-student badge-progress-v2"><span class="dot"></span> In Progress</span></td>
                                <td><a href="#" class="view-link">View</a></td>
                            </tr>
                            <tr>
                                <td>#C-1245</td>
                                <td class="bold-title">Cafeteria food quality concern</td>
                                <td>Dining</td>
                                <td>Dec 5, 2024</td>
                                <td><span class="status-student badge-resolved-v2"><span class="dot"></span> Resolved</span></td>
                                <td><a href="#" class="view-link">View</a></td>
                            </tr>
                            </tbody>
                    </table>
                </div>

                <div class="card-footer-flex">
                    <p class="showing-text">Showing 8 of 12 complaints</p>
                    <a href="#" class="view-all-link">View All Complaints <span class="material-icons-outlined">arrow_forward</span></a>
                </div>
            </section>
        </main>
    </div>
    <script src="js/user_dashboard.js"></script>
</body>
</html>