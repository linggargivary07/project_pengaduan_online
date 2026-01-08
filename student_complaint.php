<?php
session_start();
require 'admin/functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
$user_id = $_SESSION['user_id'];
$complaint_id = $_GET['complaint_id'];
$complaint = query("SELECT * FROM complaints WHERE complaint_id = $complaint_id")[0];

$responses = query("
    SELECT r.*, u.name, u.role
    FROM responses r
    JOIN users u ON r.user_id = u.user_id
    WHERE r.complaint_id = $complaint_id
    ORDER BY r.created_at DESC
");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Details - UniPortal</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/student_dashboard.css">
    <link rel="stylesheet" href="css/student_complaint.css">
    <link rel="stylesheet" href="admin/css/response_section.css">
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
            </div>
            <ul class="sidebar-menu">
                <li><a href="student_dashboard.php"><span class="material-icons-outlined">dashboard</span><span>Dashboard</span></a></li>
                <li><a href="my_complaint.php" class="active"><span class="material-icons-outlined">assignment</span><span>My Complaints</span></a></li>
                <li>
                    <a href="user_profile.php" class="">
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
            <header class="detail-header-nav">
                <a href="student_dashboard.php" class="btn-back">
                    <span class="material-icons-outlined">arrow_back</span>
                    <span>Back to Dashboard</span>
                </a>
            </header>

            <div class="detail-container-v2">
                <section class="student-card detail-card-main">
                    <div class="detail-card-header">
                        <div class="title-area">
                            <h1 class="complaint-detail-title"><?= $complaint["complaint_title"] ?></h1>
                            <div class="meta-info">
                                <span class="meta-item"><span class="material-icons-outlined">calendar_today</span> Submitted: <?= $complaint["create_at"] ?></span>
                                <span class="meta-item"><span class="material-icons-outlined">category</span> Category: <?= $complaint["category"] ?></span>
                            </div>
                        </div>
                        <div class="status-area">
                            <span class="status-student badge-<?= $complaint["status"] ?>-v2">
                                <span class="dot"></span> <?= $complaint["status"] ?>
                            </span>
                        </div>
                    </div>

                    <hr class="divider">

                    <div class="detail-body-section">
                        <h3>Detailed Description</h3>
                        <p class="description-text"><?= $complaint["complaint_description"] ?></p>

                        <h3>Desired Outcome</h3>
                        <p class="description-text"><?= $complaint["desired_outcome"] ?></p>
                    </div>

                    <div class="attachments-grid">
                        <h3>Attachments</h3>
                        <div class="attachment-item-v2">
                            <img src="img/attachment/<?= $complaint["attachment_url"] ?>" alt="" max-width="350px">
                        </div>
                    </div>
                </section>

                <?php if (count($responses) > 0): ?>
                    <section class="admin-responses-section">
                        <h2 class="section-main-title">Administrative Responses</h2>

                        <?php foreach ($responses as $response): ?>
                            <div class="card response-display-card">
                                <div class="response-display-header">
                                    <div class="admin-profile">
                                        <img src="https://i.pravatar.cc/150?u=<?= $response['user_id'] ?>" 
                                            alt="Admin Avatar" 
                                            class="admin-avatar">
                                        <div class="admin-info">
                                            <h4 class="admin-name"><?= $response['name'] ?></h4>
                                            <p class="admin-role"><?= ucfirst($response['role']) ?></p>
                                        </div>
                                    </div>
                                    <div class="response-timestamp">
                                        <?= date("F d, Y - H:i", strtotime($response['created_at'])) ?>
                                    </div>
                                </div>

                                <div class="response-display-body">
                                    <p><?= nl2br($response['response_text']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </section>
                <?php endif; ?>

            </div>
        </main>
    </div>
</body>
</html>