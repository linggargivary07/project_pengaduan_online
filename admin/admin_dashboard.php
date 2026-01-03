<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniComplaint Admin Portal</title>
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
                    <a href="#" class="active">
                        <span class="material-icons-outlined">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="admin_complaints.php">
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

            <section class="stats-cards">
                <div class="card stat-card">
                    <div class="card-info">
                        <h3>Total Complaints</h3>
                        <h2 class="stat-number">1,247</h2>
                        <p class="stat-trend up">
                            <span class="material-icons-round">arrow_upward</span> 12% from last month
                        </p>
                    </div>
                    <div class="card-icon icon-blue">
                        <span class="material-icons-outlined">assignment</span>
                    </div>
                </div>
                <div class="card stat-card">
                    <div class="card-info">
                        <h3>In Progress</h3>
                        <h2 class="stat-number">89</h2>
                        <p class="stat-trend down">
                            <span class="material-icons-round">schedule</span> Avg. 2.3 days to resolve
                        </p>
                    </div>
                    <div class="card-icon icon-orange">
                        <span class="material-icons-outlined">hourglass_empty</span>
                    </div>
                </div>
                <div class="card stat-card">
                    <div class="card-info">
                        <h3>Resolved</h3>
                        <h2 class="stat-number">1,158</h2>
                        <p class="stat-trend up">
                            <span class="material-icons-round">check_circle</span> 89.9% resolution rate
                        </p>
                    </div>
                    <div class="card-icon icon-green">
                        <span class="material-icons-outlined">done_all</span>
                    </div>
                </div>
            </section>
            <section class="recent-complaints card">
                <div class="card-header">
                    <h2>Recent Complaints</h2>
                    <a href="#" class="view-all-btn">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="complaints-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student</th>
                                <th>Category</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1247</td>
                                <td>Sarah Johnson</td>
                                <td>Academic</td>
                                <td>Computer Science</td>
                                <td><span class="status badge-progress">In Progress</span></td>
                                <td>Dec 12, 2024</td>
                            </tr>
                            <tr>
                                <td>#1246</td>
                                <td>Michael Chen</td>
                                <td>Facilities</td>
                                <td>Maintenance</td>
                                <td><span class="status badge-resolved">Resolved</span></td>
                                <td>Dec 11, 2024</td>
                            </tr>
                            <tr>
                                <td>#1245</td>
                                <td>Emily Davis</td>
                                <td>Administrative</td>
                                <td>Registrar</td>
                                <td><span class="status badge-urgent">Urgent</span></td>
                                <td>Dec 10, 2024</td>
                            </tr>
                            <tr>
                                <td>#1244</td>
                                <td>James Wilson</td>
                                <td>Academic</td>
                                <td>Mathematics</td>
                                <td><span class="status badge-resolved">Resolved</span></td>
                                <td>Dec 9, 2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            </main>
        </div>
    <script src="js/admin_dashboard.php"></script>
</body>
</html>