<?php 
require 'functions.php';
// Asumsi tabel bernama 'users'
$users = query("SELECT * FROM users ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - UniComplaint</title>
    <link rel="stylesheet" href="css/admin_users.css">
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
                <li><a href="admin_dashboard.php"><span class="material-icons-outlined">dashboard</span><span>Dashboard</span></a></li>
                <li><a href="admin_complaints.php"><span class="material-icons-outlined">report_problem</span><span>Complaints</span></a></li>
                <li><a href="admin_users.php" class="active"><span class="material-icons-outlined">people</span><span>Users</span></a></li>
                <li><a href="#"><span class="material-icons-outlined">settings</span><span>Settings</span></a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="header-left">
                    <span class="material-icons-outlined menu-btn" id="open-sidebar">menu</span>
                    <div>
                        <h1>User Management</h1>
                        <p class="welcome-text">Manage university members and their access levels.</p>
                    </div>
                </div>
                <!-- <div class="header-right">
                    <button class="btn-add-user">
                        <span class="material-icons-outlined">person_add</span>
                        <span>Add New User</span>
                    </button>
                </div> -->
            </header>

            <section class="filter-section">
                <div class="filter-group">
                    <div class="filter-item">
                        <label>Filter by Role</label>
                        <select>
                            <option>All Roles</option>
                            <option>Student</option>
                            <option>Faculty</option>
                            <option>Administrator</option>
                        </select>
                    </div>
                    <!-- <div class="filter-item">
                        <label>Status</label>
                        <select>
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Pending</option>
                            <option>Inactive</option>
                        </select>
                    </div> -->
                </div>
                <div class="search-group">
                    <label>Search User</label>
                    <div class="search-input">
                        <input type="text" placeholder="Search by name or email...">
                    </div>
                </div>
            </section>

            <section class="complaints-list-card card">
                <div class="table-responsive">
                    <table class="complaints-table detailed">
                        <thead>
                            <tr>
                                <th>Name & ID</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Jurusan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $users as $user ) : ?>
                            <tr>
                                <td>
                                    <div class="complaint-info">
                                        <span class="title"><?= $user["name"] ?></span>
                                        <span class="description">ID: <?= $user["user_id"] ?></span>
                                    </div>
                                </td>
                                <td><?= $user["email"] ?></td>
                                <td><?= $user["role"] ?></td>
                                <td><?= $user["jurusan"] ?? '-' ?></td>
                                <td>
                                    <div class="action-links">
                                        <a href="hapus_user.php?user_id=<?= $user["user_id"] ?>">delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-container">
                    <p class="showing-text">Showing 1 to <?= count($users) ?> of results</p>
                    <div class="pagination">
                        <button class="page-btn">Previous</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">Next</button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>