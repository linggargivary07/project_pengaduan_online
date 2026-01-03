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
                    <a href="#" class="active">
                        <span class="material-icons-outlined">report_problem</span>
                        <span>Complaints</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="material-icons-outlined">people</span>
                        <span>Users</span>
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
            <header class="main-header">
                <div class="header-left">
                    <span class="material-icons-outlined menu-btn" id="open-sidebar">menu</span>
                    <div>
                        <h1>Dashboard Overview</h1>
                        <p class="welcome-text">Welcome back, John. Here's what's happening at the university.</p>
                    </div>
                </div>
                <div class="header-right">
                    <span class="date-display">Today, December 13, 2024</span>
                </div>
            </header>

            <section class="filter-section">
                <div class="filter-group">
                    <div class="filter-item">
                        <label>Filter by Status</label>
                        <select>
                            <option>All Complaints</option>
                            <option>Pending</option>
                            <option>In Progress</option>
                            <option>Resolved</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label>Filter by Category</label>
                        <select>
                            <option>All Categories</option>
                            <option>Technical</option>
                            <option>Facilities</option>
                            <option>Academic</option>
                        </select>
                    </div>
                </div>
                <div class="search-group">
                    <label>Search</label>
                    <div class="search-input">
                        <input type="text" placeholder="Search complaints...">
                    </div>
                </div>
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
                            <tr>
                                <td>
                                    <div class="complaint-info">
                                        <span class="title">Library Computer Issues</span>
                                        <span class="description">Computers in the main library are running slowly...</span>
                                    </div>
                                </td>
                                <td>Technical</td>
                                <td>Sarah Johnson</td>
                                <td>March 15, 2024</td>
                                <td><span class="status badge-pending">Pending</span></td>
                                <td><a href="#" class="view-details">View Details</a></td>
                            </tr>
                            <tr>
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
                            </tr>
                            </tbody>
                    </table>
                </div>

                <div class="pagination-container">
                    <p class="showing-text">Showing 1 to 5 of 23 complaints</p>
                    <div class="pagination">
                        <button class="page-btn">Previous</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">Next</button>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="js/admin_complaints.js"></script>
</body>
</html>