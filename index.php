<?php
// index.php - Cepora Metal Fabrication Landing Page
require_once 'config/database.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cepora Metal Fabrication - Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">⚙️ Cepora Metal Fab</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="auth/login.php">Login</a>
                <a class="nav-link" href="auth/register.php">Register</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 fw-bold text-primary mb-4">Welcome to Cepora Metal Fabrication</h1>
                <p class="lead mb-4">Advanced web management system for orders, quotations, services, and payments.</p>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h5>👨‍💼 Admin Panel</h5>
                                <p>Manage customers, orders, reports.</p>
                                <a href="admin/dashboard.php" class="btn btn-primary w-100" onclick="alert('Coming soon!')">Admin Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h5>👤 Customer Portal</h5>
                                <p>Request quotations, view orders.</p>
                                <a href="customer/dashboard.php" class="btn btn-success w-100" onclick="alert('Coming soon!')">Customer Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h5>📋 Quick Quote</h5>
                                <p>Get instant fabrication quote.</p>
                                <a href="customer/request-quotation.php" class="btn btn-warning w-100" onclick="alert('Coming soon!')">Request Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>

