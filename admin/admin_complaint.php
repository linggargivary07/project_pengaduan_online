<?php
require 'functions.php';
$complaint_id = (int)$_GET['complaint_id'];
$complaint = query("SELECT * FROM complaints WHERE complaint_id = $complaint_id")[0];

$responses = query("
    SELECT r.*, u.name, u.role 
    FROM responses r
    JOIN users u ON r.user_id = u.user_id
    WHERE r.complaint_id = $complaint_id
    ORDER BY r.created_at DESC
");


// dapatkan info user pengaduan
$user_id = $complaint['user_id'];
$user = query("SELECT * FROM users WHERE user_id = $user_id")[0];  

if( isset($_POST["submit_response"]) ) {
    // Process booking form 
    if( adminResponse($_POST) > 0 ) {
        echo "response added successfully!');";
    } else {
        echo "data gagal ditambahkan!";
    }   
    // (Handled in process_booking.php)
}

if (isset($_POST['mark_resolved'])) {
    if (markResolved($_POST['complaint_id']) > 0) {
        echo "<script>
                alert('Complaint marked as resolved');
              </script>";
    } else {
        echo "<script>alert('Failed to update status');</script>";
    }
}

if (isset($_POST['mark_progress'])) {
    if (markProgress($_POST['complaint_id']) > 0) {
        echo "<script>
                alert('Complaint marked as progress');
              </script>";
    } else {
        echo "<script>alert('Failed to update status');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - UniComplaint</title>
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <link rel="stylesheet" href="css/response_section.css">
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
                <li><a href="admin_complaints.php" class="active"><span class="material-icons-outlined">report_problem</span><span>Complaints</span></a></li>
                <li><a href="#"><span class="material-icons-outlined">people</span><span>Users</span></a></li>
                <li><a href="#"><span class="material-icons-outlined">settings</span><span>Settings</span></a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="detail-header">
                <div class="header-nav">
                    <a href="admin_complaints.php" class="back-btn">
                        <span class="material-icons-outlined">arrow_back</span>
                    </a>
                    <div class="header-titles">
                        <h1>Complaints</h1>
                        <p>Review and respond to student complaints</p>
                    </div>
                </div>
            </header>

            <div class="detail-grid">
                <section class="detail-main">
                    <div class="card detail-card">
                        <h2 class="complaint-title-main"><?= $complaint["complaint_title"] ?></h2>
                        <p class="submission-date"><span class="material-icons-outlined">calendar_today</span> Submitted: <?= $complaint["create_at"] ?></p>
                        <div class="info-box">
                            <h3>Student Information</h3>
                            <div class="info-grid">
                                <div class="info-item"><span>Name:</span> <strong><?= $user["name"] ?></strong></div>
                                <div class="info-item"><span>Student ID:</span> <strong><?= $user["user_id"] ?></strong></div>
                                <div class="info-item"><span>Program:</span> <strong><?= $user["jurusan"] ?></strong></div>
                                <div class="info-item"><span>Email:</span> <strong><?= $user["email"] ?></strong></div>
                            </div>
                        </div>

                        <div class="complaint-content">
                            <h3>Complaint Description</h3>
                            <p><?= $complaint["complaint_description"] ?></p>
                        </div>

                        <div class="attachments-section">
                            <h3>Attachments</h3>
                            <div class="attachment-list">
                                <img src="../img/attachment/<?= $complaint["attachment_url"] ?>" alt="" width="100%">
                                <!-- <div class="attachment-item">
                                    <span class="material-icons-outlined file-icon doc-blue">description</span>
                                    <div class="file-details">
                                        <span class="file-name">library_hours_screenshot.png</span>
                                        <span class="file-size">(245 KB)</span>
                                    </div>
                                </div>
                                <div class="attachment-item">
                                    <span class="material-icons-outlined file-icon doc-red">picture_as_pdf</span>
                                    <div class="file-details">
                                        <span class="file-name">booking_attempts_log.pdf</span>
                                        <span class="file-size">(182 KB)</span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </section>

                <aside class="detail-side">
                    <div class="card action-card">
                        <h3>Add Response</h3>
                        <form id="response-form" method="POST" action="">
                            <input type="hidden" name="complaint_id" value="<?= $complaint['complaint_id'] ?>">
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <div class="form-group">
                                <label>Response Type</label>
                                <select class="form-control">
                                    <option>Admin Response</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="response_text">Response Message</label>
                                <textarea class="form-control" name="response_text" rows="5" placeholder="Enter your response to the student..."></textarea>
                            </div>
                            <button type="submit" name="submit_response" class="btn btn-primary btn-full">
                                <span class="material-icons-outlined">send</span> Send Response
                            </button>
                        </form>
                    </div>

                    <div class="card action-card quick-actions">
                        <h3>Quick Actions</h3>
                        <form method="POST">
                            <input type="hidden" name="complaint_id" value="<?= $complaint['complaint_id'] ?>">
                            <button type="submit" name="mark_resolved" class="btn btn-success btn-full">
                                <span class="material-icons-outlined">check_circle</span> Mark as Resolved
                            </button>
                        </form>

                        <form method="POST">
                            <input type="hidden" name="complaint_id" value="<?= $complaint['complaint_id'] ?>">
                            <button type="submit" name="mark_progress" class="btn btn-progress btn-full">
                                <span class="material-icons-outlined">check_circle</span> Mark as Progress
                            </button>
                        </form>

                    </div>
                </aside>
            </div>
            <!-- bagian response -->
             <!-- jika terdapat response ==> maka tampilkan -->
            <div class="detail-grid">
                <section class="admin-responses-section">
                    <h2 class="section-main-title">Administrative Responses</h2>

                    <?php if (count($responses) > 0): ?>
                        <?php foreach ($responses as $response): ?>
                            <div class="card response-display-card">
                                <div class="response-display-header">
                                    <div class="admin-profile">
                                        <img src="https://i.pravatar.cc/150?u=<?= $response['user_id'] ?>" 
                                            alt="<?= $response['name'] ?>" 
                                            class="admin-avatar">
                                        <div class="admin-info">
                                            <h4 class="admin-name">for : <?= $response['name'] ?></h4>
                                            <p class="admin-role">as : <?= ucfirst($response['role']) ?></p>
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

                    <?php else: ?>
                        <div class="card response-display-card">
                            <p style="text-align:center; color:#888;">
                                Belum ada response dari admin.
                            </p>
                        </div>
                    <?php endif; ?>
                </section>
            </div>

        </main>
    </div>
    <script src="js/admin_complaint.js"></script>
</body>
</html>