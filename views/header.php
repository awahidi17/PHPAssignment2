<?php
// Compute project base URL (works from /index.php or nested /views/... pages)
if (!isset($base_url)) {
    $dir = dirname($_SERVER['SCRIPT_NAME']); // e.g. /PHP or /PHP/views/admin
    $base_url = $dir;

    foreach (['/views', '/db', '/models', '/controllers', '/core'] as $cut) {
        $pos = strpos($base_url, $cut);
        if ($pos !== false) {
            $base_url = substr($base_url, 0, $pos);
            break;
        }
    }

    $base_url = rtrim($base_url, '/');
    if ($base_url === '') { $base_url = '/'; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SportsPro Technical Support</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(1200px 600px at 20% 0%, rgba(13,110,253,.12), transparent 60%),
                        radial-gradient(900px 500px at 90% 10%, rgba(25,135,84,.10), transparent 55%),
                        #f8f9fa;
        }
        .brand-pill {
            letter-spacing: .2px;
        }
        .glass {
            background: rgba(255,255,255,.86);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(0,0,0,.06);
        }
        .soft-shadow { box-shadow: 0 12px 30px rgba(0,0,0,.08); }
        .rounded-4 { border-radius: 1rem !important; }
        .list-group-item-action:hover {
            background: rgba(13,110,253,.06);
        }
        .icon-badge {
            width: 34px; height: 34px;
            display: inline-flex;
            align-items: center; justify-content: center;
            border-radius: 10px;
            background: rgba(13,110,253,.10);
        }
    </style>
</head>

<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
        <a class="navbar-brand fw-bold brand-pill" href="<?= $base_url ?>/index.php">
            <i class="bi bi-headset me-2"></i>SportsPro Technical Support
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/index.php">
                        <i class="bi bi-house-door me-1"></i>Home
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
