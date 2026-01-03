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
                <li><a href="dashboard.html"><span class="material-icons-outlined">dashboard</span><span>Dashboard</span></a></li>
                <li><a href="complaints.html" class="active"><span class="material-icons-outlined">report_problem</span><span>Complaints</span></a></li>
                <li><a href="#"><span class="material-icons-outlined">people</span><span>Users</span></a></li>
                <li><a href="#"><span class="material-icons-outlined">settings</span><span>Settings</span></a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="detail-header">
                <div class="header-nav">
                    <a href="complaints.html" class="back-btn">
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
                        <h2 class="complaint-title-main">Library Access Issues During Finals Week</h2>
                        <p class="submission-date"><span class="material-icons-outlined">calendar_today</span> Submitted: March 15, 2024</p>

                        <div class="info-box">
                            <h3>Student Information</h3>
                            <div class="info-grid">
                                <div class="info-item"><span>Name:</span> <strong>Sarah Johnson</strong></div>
                                <div class="info-item"><span>Student ID:</span> <strong>STU-2021-4567</strong></div>
                                <div class="info-item"><span>Program:</span> <strong>Computer Science, Year 3</strong></div>
                                <div class="info-item"><span>Email:</span> <strong>sarah.johnson@university.edu</strong></div>
                            </div>
                        </div>

                        <div class="complaint-content">
                            <h3>Complaint Description</h3>
                            <p>I am writing to express my concern about the limited library hours during finals week. The main library closes at 10 PM, which is insufficient for students who need extended study time during this critical period. Many students, including myself, rely on the library's quiet environment and resources for effective studying.</p>
                            <p>Additionally, the study rooms are consistently fully booked, and the reservation system seems to favor certain student groups. I have attempted to book study rooms multiple times but have been unsuccessful. This situation is affecting my ability to prepare adequately for my final examinations.</p>
                            <p>I would appreciate if the university could consider extending library hours during finals week and implementing a more equitable study room booking system.</p>
                        </div>

                        <div class="attachments-section">
                            <h3>Attachments</h3>
                            <div class="attachment-list">
                                <div class="attachment-item">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <aside class="detail-side">
                    <div class="card action-card">
                        <h3>Add Response</h3>
                        <form id="response-form">
                            <div class="form-group">
                                <label>Response Type</label>
                                <select class="form-control">
                                    <option>Admin Response</option>
                                    <option>Internal Note</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Response Message</label>
                                <textarea class="form-control" rows="5" placeholder="Enter your response to the student..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-full">
                                <span class="material-icons-outlined">send</span> Send Response
                            </button>
                        </form>
                    </div>

                    <div class="card action-card quick-actions">
                        <h3>Quick Actions</h3>
                        <button class="btn btn-success btn-full">
                            <span class="material-icons-outlined">check_circle</span> Mark as Resolved
                        </button>
                    </div>
                </aside>
            </div>
            <div class="detail-grid">
                <section class="admin-responses-section">
                    <h2 class="section-main-title">Administrative Responses</h2>
                    
                    <div class="card response-display-card">
                        <div class="response-display-header">
                            <div class="admin-profile">
                                <img src="https://i.pravatar.cc/150?u=elena" alt="Dr. Elena Martinez" class="admin-avatar">
                                <div class="admin-info">
                                    <h4 class="admin-name">Dr. Elena Martinez</h4>
                                    <p class="admin-role">Academic Affairs Officer</p>
                                </div>
                            </div>
                            <div class="response-timestamp">
                                Mar 18, 2024 - 3:45 PM
                            </div>
                        </div>

                        <div class="response-display-body">
                            <p>Dear Sarah,</p>
                            <p>Thank you for bringing this matter to our attention. We take all academic concerns seriously and are committed to ensuring fair and transparent grading practices across all departments.</p>
                            <p>I have initiated a formal review of your case and have requested the following materials from Professor Anderson:</p>
                            
                            <ul class="response-list">
                                <li>Detailed grading rubric for the midterm examination</li>
                                <li>Your exam responses with specific feedback annotations</li>
                                <li>Grade distribution for the entire class</li>
                            </ul>

                            <p>We expect to complete our review within 5-7 business days. I will keep you updated on our progress.</p>
                            
                            <div class="response-signature">
                                <p>Best regards,</p>
                                <p><strong>Dr. Elena Martinez</strong></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
    <script src="js/admin_complaint.js"></script>
</body>
</html>