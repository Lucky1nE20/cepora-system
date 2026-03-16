<?php
// customer/dashboard.php - Customer Dashboard
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header('Location: ../auth/login.php');
    exit;
}
$current_page = 'dashboard';
$page_title = 'Customer Dashboard';
include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="container-fluid">
    <div class="row">
        <nav class="d-none d-lg-block col-lg-3">
            <?php include '../includes/sidebar.php'; ?>
        </nav>
        
        <main class="col-lg-9 ms-lg-auto px-lg-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0"><i class="fas fa-home text-success"></i> Welcome back, <?php echo $_SESSION['email']; ?>!</h2>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow metal-accent">
                        <div class="card-body text-center">
                            <i class="fas fa-file-invoice-dollar fa-3x mb-3 opacity-75"></i>
                            <h4>Request Quotation</h4>
                            <p>Submit specifications for instant quote.</p>
                            <a href="request-quotation.php" class="btn btn-primary w-100">Get Quote</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-list fa-3x mb-3 text-info"></i>
                            <h4>My Orders</h4>
                            <p>Track all your fabrication orders.</p>
                            <a href="orders.php" class="btn btn-info w-100">View Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-history fa-3x mb-3 text-warning"></i>
                            <h4>Order History</h4>
                            <p>Review past projects and payments.</p>
                            <a href="history.php" class="btn btn-warning w-100">View History</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-clock"></i> Recent Activity</h5>
                        </div>
                        <div class="card-body">
                            <ul class="timeline">
                                <li class="timeline-item">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Quotation Requested</h6>
                                            <p class="mb-1">Steel plate cutting - 2mm thick</p>
                                            <small class="text-muted">2 hours ago</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Order Completed</h6>
                                            <p class="mb-1">Order #CUST023 - Welding service</p>
                                            <small class="text-muted">3 days ago</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<style>
.timeline-item { padding: 1rem 0; border-bottom: 1px solid #eee; }
.timeline-item:last-child { border-bottom: none; }
.timeline-icon { width: 40px; height: 40px; font-size: 0.9rem; }
</style>

<?php include '../includes/footer.php'; ?>

