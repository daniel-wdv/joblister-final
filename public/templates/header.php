<?php session_start(); ?>

<!doctype html>

<html class="no-js" lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Title ======-->
    <title>BasicJobs - Encontra o seu futuro! </title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="../assets/css/animate.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="../assets/css/LineIcons.2.0.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="../assets/css/bootstrap-4.5.0.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="../assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--====== Bootstrap files ======-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <!--====== More Icons ======-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

<!--====== HEADER SECTION START ======-->

<header class="header-area">
    <div style="position: relative" class="navbar-area sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="../../index.php">
                            <img src="../assets/images/logo-2.svg" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="page-scroll" href="../../index.php">Início</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="../../#features">Sobre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="../models/list-jobs.php">Empregos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#">Empregadores</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Check if user logged in, if not then redirect to login page -->
                        <?php if( isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) : ?>

                            <div class="dropdown show text-center navbar-btn d-none d-sm-inline-block btn-login">
                                <a class="dropdown-toggle btn-left main-btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Minha Conta</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="../views/create.view.php">Create Job</a>
                                    <a class="dropdown-item" href="../views/my-account.view.php">My Account</a>
                                    <a class="dropdown-item" href="../models/reset-password.php">Change Password</a>
                                    <a class="dropdown-item" href="../models/logout.php">Logout</a>
                                </div>
                            </div>

                        <?php else: ?>

                            <div class="text-center navbar-btn d-none d-sm-inline-block btn-login">
                                <a class="btn-left main-btn" href="../views/login.view.php">Login</a>
                            </div>
                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" data-scroll-nav="0" href="../views/register.view.php" rel="nofollow">Registar</a>
                            </div>

                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>