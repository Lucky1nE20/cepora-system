<?php
// includes/sidebar.php - Admin/Customer Sidebar
$user_role = $_SESSION['role'] ?? '';
if (!isset($_SESSION['user_id'])) return;
?>
<div class="sidebar bg-dark text-white vh-100 position-fixed" style="width: 250px;">
    <div class="p-3 border-bottom">
        <h5 class="text-white mb-0"><?php echo $_SESSION['email']; ?></h5>
        <small class="opacity-75"><?php echo ucfirst($user_role); ?></small>
    </div>
    
    <nav class="nav flex-column p-3">
        <a class="nav-link text-white mb-2 <?php echo $current_page == 'dashboard' ? 'active bg-primary' : ''; ?>" href="dashboard.php">
            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>
        
        <?php if ($user_role == 'admin'): ?>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'customers' ? 'active bg-primary' : ''; ?>" href="customers/">
                <i class="fas fa-users me-2"></i>Customers
            </a>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'orders' ? 'active bg-primary' : ''; ?>" href="orders/">
                <i class="fas fa-shopping-cart me-2"></i>Orders
            </a>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'services' ? 'active bg-primary' : ''; ?>" href="services/">
                <i class="fas fa-tools me-2"></i>Services
            </a>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'quotations' ? 'active bg-primary' : ''; ?>" href="quotations/">
                <i class="fas fa-file-invoice me-2"></i>Quotations
            </a>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'payments' ? 'active bg-primary' : ''; ?>" href="payments/">
                <i class="fas fa-credit-card me-2"></i>Payments
            </a>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'reports' ? 'active bg-primary' : ''; ?>" href="reports/">
                <i class="fas fa-chart-bar me-2"></i>Reports
            </a>
        <?php else: ?>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'orders' ? 'active bg-primary' : ''; ?>" href="../customer/orders.php">
                <i class="fas fa-shopping-cart me-2"></i>My Orders
            </a>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'quotations' ? 'active bg-primary' : ''; ?>" href="../customer/request-quotation.php">
                <i class="fas fa-file-invoice me-2"></i>Request Quote
            </a>
            <a class="nav-link text-white mb-2 <?php echo $current_page == 'profile' ? 'active bg-primary' : ''; ?>" href="../customer/profile.php">
                <i class="fas fa-user me-2"></i>Profile
            </a>
        <?php endif; ?>
        
        <hr class="text-white opacity-25 my-3">
        <a class="nav-link text-danger" href="../auth/logout.php">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </a>
    </nav>
</div>

