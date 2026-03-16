<?php
// includes/footer.php
?>
    <footer class="footer mt-auto py-4 bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-industry"></i> Cepora Metal Fabrication</h5>
                    <p>Precision metal fabrication services with advanced management system.</p>
                </div>
                <div class="col-md-4">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="../index.php" class="text-light text-decoration-none">Home</a></li>
                        <li><a href="../customer/request-quotation.php" class="text-light text-decoration-none">Request Quote</a></li>
                        <li><a href="../auth/login.php" class="text-light text-decoration-none">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Contact</h6>
                    <p><i class="fas fa-phone"></i> +63 XXX XXX XXXX<br>
                    <i class="fas fa-envelope"></i> info@cepora.com.ph<br>
                    <i class="fas fa-map-marker-alt"></i> Philippines</p>
                </div>
            </div>
            <div class="text-center mt-4 border-top pt-3">
                <p>&copy; <?php echo date('Y'); ?> Cepora Metal Fabrication. All rights reserved. | Powered by PHP/MySQL</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php if (isset($extra_js)) echo $extra_js; ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>

