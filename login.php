<?php
session_start();

$hash = '$2y$10$dFzqS3v2bjNYSQEho4OYrOdeutF4Lt6IQu4w3t5Z36Bj8TQwDOeeG';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    // login attempt
    if(password_verify($_POST['password'], $hash)) {
        // successful login
        $_SESSION['auth'] = true;
        header('Location: admin.php');
    }
}
?>


<?php include "templates/header.php"; ?>

    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-6 col-10 bg-white p-5 border rounded-lg">
                    <h1 class="mb-4 text-dark">Authentication Required</h1>
                    <form action="login.php" method="post">
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <small class="form-text text-muted text-right">
                                <a href="index.php" class="btn btn-link" style="margin-top: -10px;">I shouldn't be here!</a>
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "templates/footer.php"; ?>