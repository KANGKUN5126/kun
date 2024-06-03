<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/func/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/script/main.js';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.function.php';
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/skel.min.js"></script>
<script src="/assets/js/util.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!DOCTYPE HTML>
<html>
<head>
    <title>Projection by TEMPLATED</title>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<header id="header">
    <div class="inner">
        <a href="/" class="logo"><strong>Projection</strong> by kuntest</a>
        <nav id="nav"><a href="/">Home</a>
            <a href="/view/join.php">Join</a>
            <a href="<?= $_SESSION['login'] == 'ok' ? '/proc/index.php?mode=logout' : '/view/login.php' ?>">
                <?= $_SESSION['login'] == 'ok' ? 'Logout' : 'Login' ?>
            </a>
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    </div>
</header><!-- Banner -->