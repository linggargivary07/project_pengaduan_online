<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Complaint - UniPortal</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/student_dashboard.css">
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
                <li><a href="student_dashboard.php"><span class="material-icons-outlined">dashboard</span><span>Dashboard</span></a></li>
                <li><a href="#" class="active"><span class="material-icons-outlined">assignment</span><span>My Complaints</span></a></li>
                <li><a href="#"><span class="material-icons-outlined">settings</span><span>Settings</span></a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="student-header">
                <div class="header-left">
                    <span class="material-icons-outlined menu-btn" id="open-sidebar">menu</span>
                    <div>
                        <h1>Dashboard</h1>
                        <p class="welcome-text">Welcome back, Alex</p>
                    </div>
                </div>
                <div class="header-right">
                    <a href="add_complaint.php" style="text-decoration: none;">
                        <button class="btn-new-complaint active-page">
                        <span class="material-icons-outlined">add</span> New Complaint
                    </button>
                    </a>
                </div>
            </header>

            <div class="form-title-section">
                <span class="material-icons-round info-icon-blue">error</span>
                <div>
                    <h2>Submit a Complaint</h2>
                    <p>Please provide detailed information about your concern. We review all complaints within 48 hours.</p>
                </div>
            </div>

            <div class="student-card form-container">
                <form id="complaintForm">
                    <div class="form-section">
                        <h3>Student Information</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Student ID</label>
                                <input type="text" value="STU-2024-001234" disabled class="form-control-disabled">
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" value="Computer Science" disabled class="form-control-disabled">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3>Complaint Details</h3>
                        <div class="form-group">
                            <label>Complaint Title *</label>
                            <input type="text" placeholder="Enter a brief, descriptive title for your complaint" required class="form-control">
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Category *</label>
                                <select class="form-control" required>
                                    <option value="" disabled selected>Select a category</option>
                                    <option>Academics</option>
                                    <option>Facilities</option>
                                    <option>IT Services</option>
                                    <option>Dining</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Priority Level</label>
                                <select class="form-control">
                                    <option>Low - General inquiry or minor issue</option>
                                    <option>Medium - Standard issue</option>
                                    <option>High - Urgent matter</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detailed Description *</label>
                            <textarea class="form-control" rows="6" placeholder="Please provide a detailed description of your complaint..." required id="descInput"></textarea>
                            <small class="input-note">Minimum 50 characters required</small>
                        </div>
                        <div class="form-group">
                            <label>Desired Outcome</label>
                            <textarea class="form-control" rows="3" placeholder="What would you like to see happen as a result of this complaint? (Optional)"></textarea>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3>Contact Preferences</h3>
                        <div class="checkbox-group">
                            <label class="checkbox-item">
                                <input type="checkbox" checked>
                                <span>Email me updates about this complaint</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox">
                                <span>I am available for a follow-up phone call</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-footer">
                        <span class="required-note">* Required fields</span>
                        <div class="form-actions">
                            <button type="button" class="btn-ghost">Save as Draft</button>
                            <button type="submit" class="btn-new-complaint">
                                <span class="material-icons-outlined">send</span> Submit Complaint
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="help-info-box">
                <span class="material-icons-round help-icon">info</span>
                <div class="help-text">
                    <h4>Need Help?</h4>
                    <p>If you need assistance with this form or have urgent concerns, please contact:</p>
                    <ul>
                        <li><strong>Student Affairs Office:</strong> (555) 123-4567</li>
                        <li><strong>Email:</strong> studentaffairs@university.edu</li>
                        <li><strong>Hours:</strong> Monday - Friday, 8:00 AM - 5:00 PM</li>
                    </ul>
                </div>
            </div>
            
            <footer class="system-footer">
                <p>&copy; 2024 University Portal. All rights reserved. | Student Complaint System v2.1</p>
            </footer>
        </main>
    </div>
    <script src="js/add_complaint.js"></script>
</body>
</html>