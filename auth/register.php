<?php
// auth/register.php - User Registration
session_start();
require_once '../config/database.php';

$error = $success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role']; // admin/customer

    if (empty($name) || empty($email) || empty($password)) {
        $error = 'Please fill all fields!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format!';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters!';
    } else {
        // Check existing email
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $error = 'Email already registered!';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())");
            if ($stmt->execute([$name, $email, $hashed_password, $role])) {
                $success = 'Registration successful! Please login.';
            } else {
                $error = 'Registration failed. Try again.';
            }
        }
    }
}
$page_title = 'Register';
include '../includes/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center">
                    <h3><i class="fas fa-user-plus"></i> Create Account</h3>
                </div>
                <div class="card-body p-4">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="">Choose...</option>
                                <option value="customer" <?php echo isset($_POST['role']) && $_POST['role']=='customer' ? 'selected' : ''; ?>>Customer</option>
                                <option value="admin" <?php echo isset($_POST['role']) && $_POST['role']=='admin' ? 'selected' : ''; ?>>Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mb-3">Register</button>
                    </form>
                    <div class="text-center">
                        <a href="login.php" class="btn btn-link">Already have account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

