<?php
session_start();
require 'admin/functions.php';

// Proteksi Halaman
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - UniPortal</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/student_dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <style>
        /* Tambahan CSS Khusus Profile agar rapi dalam grid */
        .profile-layout {
            display: flex;
            gap: 40px;
            align-items: flex-start;
        }
        .profile-photo-side {
            flex: 0 0 200px;
            text-align: center;
        }
        .profile-img-large {
            width: 180px;
            height: 180px;
            border-radius: 20px;
            object-fit: cover;
            border: 4px solid #f1f5f9;
            box-shadow: var(--shadow-sm);
        }
        .profile-info-side {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        .info-field label {
            display: block;
            font-size: 0.85rem;
            color: var(--color-text-muted);
            margin-bottom: 6px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .info-field p {
            font-size: 1.1rem;
            color: var(--color-text-main);
            font-weight: 500;
            margin: 0;
        }
        @media (max-width: 768px) {
            .profile-layout { flex-direction: column; align-items: center; }
            .profile-info-side { grid-template-columns: 1fr; width: 100%; text-align: center; }
        }
    </style>
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
                    <a href="student_dashboard.php">
                        <span class="material-icons-outlined">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="my_complaint.php">
                        <span class="material-icons-outlined">assignment</span>
                        <span>My Complaints</span>
                    </a>
                </li>
                <li>
                    <a href="user_profile.php" class="active">
                        <span class="material-icons-outlined">person</span>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="material-icons-outlined">logout</span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="main-header student-header">
                <div class="header-left">
                    <span class="material-icons-outlined menu-btn" id="open-sidebar">menu</span>
                    <div>
                        <h1>Account Settings</h1>
                        <p class="welcome-text">Manage your personal information and account details</p>
                    </div>
                </div>
            </header>

            <section class="card student-card">
                <div class="card-header-flex">
                    <h2>Personal Information</h2>
                    <!-- <a href="edit_profile.php" style="text-decoration: none;">
                        <button class="btn-ghost" style="display: flex; align-items:center; gap:8px; border:1px solid #e2e8f0; padding: 8px 16px; border-radius:8px; cursor:pointer;">
                            <span class="material-icons-outlined" style="font-size: 18px;">edit</span>
                            Edit Profile
                        </button>
                    </a> -->
                </div>

                <div class="profile-layout">
                    <div class="profile-photo-side">
                        <img src="img/character1.png" alt="Profile" class="profile-img-large">
                    </div>

                    <div class="profile-info-side">
                        <div class="info-field">
                            <label>Full Name</label>
                            <p><?= $_SESSION['name'] ?></p>
                        </div>
                        <div class="info-field">
                            <label>Email Address</label>
                            <p><?= $_SESSION['email'] ?></p>
                        </div>
                        <div class="info-field">
                            <label>Major (Jurusan)</label>
                            <p><?= $_SESSION['jurusan'] ?? 'General Student' ?></p>
                        </div>
                        <div class="info-field">
                            <label>Account Role</label>
                            <p><span class="status-student badge-resolved-v2" style="padding: 4px 12px;"><span class="dot"></span>Student</span></p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="js/user_dashboard.js"></script>
</body>
</html>