<?php
// admin/dashboard.php - Admin Dashboard
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../auth/login.php');
    exit;
}
$current_page = 'dashboard';
$page_title = 'Admin Dashboard';
include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="container-fluid">
    <div class="row">
        <nav class="d-none d-md-block col-md-3 col-lg-2">
            <?php include '../includes/sidebar.php'; ?>
        </nav>
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="fas fa-tachometer-alt text-primary"></i> Admin Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <i class="fas fa-calendar"></i> This week
                    </button>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>Total Customers</h5>
                                    <h2 class="mb-0">124</h2>
                                </div>
                                <i class="fas fa-users fa-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>Pending Orders</h5>
                                    <h2 class="mb-0">23</h2>
                                </div>
                                <i class="fas fa-shopping-cart fa-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-dark shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>Revenue Today</h5>
                                    <h2 class="mb-0">₱45,200</h2>
                                </div>
                                <i class="fas fa-coins fa-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>Services Offered</h5>
                                    <h2 class="mb-0">12</h2>
                                </div>
                                <i class="fas fa-tools fa-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <div class="card shadow">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-chart-line"></i> Recent Orders</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer</th>
                                            <th>Service</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>J. Dela Cruz</td>
                                            <td>Laser Cutting</td>
                                            <td>₱12,500</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>2024-04-15</td>
                                        </tr>
                                        <tr>
                                            <td>002</td>
                                            <td>M. Santos</td>
                                            <td>Welding</td>
                                            <td>₱8,750</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                            <td>2024-04-14</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card shadow">
                        <div class="card-header bg-light">
                            <h6 class="mb-0"><i class="fas fa-bell"></i> Notifications</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3">
                                    <div class="avatar rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                        <i class="fas fa-quote-left text-white small"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0">New quotation requested</p>
                                        <small class="opacity-50">2 min ago</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

