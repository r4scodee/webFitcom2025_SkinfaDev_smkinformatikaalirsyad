<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$valid_username = 'admintanidigital';
$valid_password = 'cirebon2025-admin'; 

$error = '';

if (isset($_SESSION['user_id'])) {
    header("Location: /webFitcom2025_SkinfaDev_smkinformatikaalirsyad/dashboard");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $username;

        header("Location: /webFitcom2025_SkinfaDev_smkinformatikaalirsyad/dashboard");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Dashboard TaniDigital</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/satoshi/satoshi.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <div class="preloader_wrap">
        <div class="preloader"></div>
    </div>

    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.php">
                                <img src="assets/img/logo.png" alt="edutec">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mobile-menu fix mb-3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas__overlay"></div>

    <section class="main-banner banner_style_2" style="background-image: url(assets/img/slider/bg.svg);">
        <div class="container text-center">
            <h2>Masuk</h2>
            <p><a href="#">Beranda</a> / Masuk</p>
        </div>
    </section>

    <section class="login_register section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 mx-auto wow fadeIn">
                    <div class="login">
                        <h4 class="login_register_title">Masuk</h4>
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                        <form method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="contact-name">Nama Pengguna<span>*</span></label>
                                <input type="text" id="contact-name" placeholder="Nama Pengguna atau Email"
                                    class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="contact-password">Kata Sandi<span>*</span></label>
                                <input type="password" placeholder="Masukkan Kata Sandi" id="contact-password"
                                    class="form-control" name="password" required>
                            </div>

                            <div class="form-check mb-4">
                                <input id="rpaword" class="form-check-input" type="checkbox" name="remember">
                                <label class="form-check-label" for="rpaword">
                                    Ingat Saya (Opsional)
                                </label>
                            </div>

                            <div class="form-group col-lg-12">
                                <button class="main_btn" type="submit" name="submit">Masuk <i
                                        class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const usernameInput = document.getElementById("contact-name");
            const passwordInput = document.getElementById("contact-password");
            const rememberCheckbox = document.getElementById("rpaword");

            const savedUsername = localStorage.getItem("rememberedUsername");
            const savedPassword = localStorage.getItem("rememberedPassword");

            if (savedUsername && savedPassword) {
                usernameInput.value = savedUsername;
                passwordInput.value = savedPassword;
                rememberCheckbox.checked = true;
            }

            const form = document.querySelector("form");
            form.addEventListener("submit", function () {
                if (rememberCheckbox.checked) {
                    localStorage.setItem("rememberedUsername", usernameInput.value);
                    localStorage.setItem("rememberedPassword", passwordInput.value);
                } else {
                    localStorage.removeItem("rememberedUsername");
                    localStorage.removeItem("rememberedPassword");
                }
            });
        });
    </script>

</body>

</html>