<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= App\Configuration::APP_NAME ?></title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $link->asset('favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $link->asset('favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $link->asset('favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= $link->asset('favicons/site.webmanifest') ?>">
    <link rel="shortcut icon" href="<?= $link->asset('favicons/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
</head>
<body>
<header class="site-header">
    <div class="container">
        <a class="brand" href="<?= $link->url('home.index') ?>">
            <img src="<?= $link->asset('images/logo.svg') ?>" alt="">
            <span class="brand-name"><?= App\Configuration::APP_NAME ?></span>
        </a>
        <nav class="nav" aria-label="Main navigation">
            <a href="<?= $link->url('home.index') ?>">Worlds</a>
            <a href="<?= $link->url('monster.index') ?>">My worlds</a>
            <?php if ($user->isLoggedIn()) { ?>
                <span><?= e($user->getName()) ?></span>
                <a class="btn" href="<?= $link->url('auth.logout') ?>">Log out</a>
            <?php } else { ?>
                <a href="<?= App\Configuration::LOGIN_URL ?>">Log in</a>
                <a class="btn" href="<?= App\Configuration::LOGIN_URL ?>">Sign up</a>
            <?php } ?>
        </nav>
    </div>
</header>
<main>
    <div class="container">
        <?= $contentHTML ?>
    </div>
</main>
<footer class="site-footer">
    <div class="container">
        <p><?= App\Configuration::APP_NAME ?></p>
    </div>
</footer>
</body>
</html>
