<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hapus semua session
session_unset();
session_destroy();

// Redirect ke home
header("Location: /webFitcom2025_SkinfaDev_smkinformatikaalirsyad/");
exit;
