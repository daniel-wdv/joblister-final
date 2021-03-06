<?php session_start(); ?>

<!doctype html>
<html class="no-js" lang="en">

<!--====== LOAD FILES ======-->
<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--====== Title ======-->
    <title>BasicJobs - Encontre o seu futuro! </title>

    <!--====== Font Awesome ======-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="public/assets/images/favicon.png" type="image/png">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="public/assets/css/animate.css">
                
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="public/assets/css/LineIcons.2.0.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="public/assets/css/bootstrap-4.5.0.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="public/assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="public/assets/css/style.css">

    <!--====== More Icons ======-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<!--====== End Load Files Head Section ======-->

<body>

    <!--====== PRELOADER ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== NAVBAR SECTION START ======-->

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="public/assets/images/logo.svg" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Início</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Sobre</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="public/models/list-jobs.php">Empregos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#blog">Empregadores</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Check if user logged in and change the buttons, if not then redirect to login page -->

                            <?php if( isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) : ?>

                                <div class="dropdown show text-center navbar-btn d-none d-sm-inline-block btn-login">
                                    <a class="dropdown-toggle btn-left main-btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Minha Conta</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="public/views/create.view.php">Create Job</a>
                                        <a class="dropdown-item" href="public/views/my-account.view.php">My Account</a>
                                        <a class="dropdown-item" href="public/models/logout.php">Logout</a>
                                        <a class="dropdown-item" href="public/views/reset-password.view.php">Change Password</a>
                                    </div>
                                </div>

                            <?php else : ?>

                                <div class="text-center navbar-btn d-none d-sm-inline-block btn-login">
                                    <a class="btn-left main-btn" href="public/views/login.view.php">Login</a>
                                </div>
                                <div class="navbar-btn d-none d-sm-inline-block">
                                    <a class="main-btn" data-scroll-nav="0" href="public/views/register.view.php" rel="nofollow">Registar</a>
                                </div>

                            <?php endif; ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!--====== MAIN SECTION ======-->
        <div id="home" class="header-hero bg_cover" style="background-image: url(public/assets/images/banner-bg.svg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">De que estás à espera?</h3>
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">Encontra o teu emprego de sonho</h2>
                            <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">Consulta todas as ofertas que temos pra ti, ligadas à area das TI em todo o mundo.</p>
                            <a href="#" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">Ver Ofertas</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <img src="public/assets/images/header-hero.png" alt="hero">
                        </div>
                    </div>
                </div>
            </div>
            <div id="particles-1" class="particles"></div>
        </div>
    </header>
    
    <!--====== HEADER PART ENDS ======-->


    <!--====== BRAND SECTION ======-->
    
    <div class="brand-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-logo d-flex align-items-center justify-content-center justify-content-md-between">
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <img src="public/assets/images/Caixa_Geral_de_Depósitos_logo.jpg" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <img src="public/assets/images/logo-microsoft-620-original.jpeg" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <img src="public/assets/images/feedzai.jpg" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.4s">
                            <img src="public/assets/images/talkdesk-660x330.jpg" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <img src="public/assets/images/blip-logo.svg" alt="brand">
                        </div> <!-- single logo -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--====== BRAND SECTION ENDS ======-->
    
    <!--====== SERVICES SECTION START ======-->
    
    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Fácil de usar!, <span> Escolhe se és empregador ou se estás à procura de uma nova oportunidade.</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="public/assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="public/assets/images/services-shape-1.svg" alt="shape">
                            <i class="lni lni-baloon"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Oportunidades</a></h4>
                            <p class="text">Acede já à nossa lista com as melhores empresas na area das IT e encontra o teu futuro!</p>
                            <a class="more" href="#">Ver Ofertas <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="public/assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="public/assets/images/services-shape-3.svg" alt="shape">
                            <i class="lni lni-bolt-alt"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Sou Empregador</a></h4>
                            <p class="text">Se tens uma empresa e precisas de colaboradores na area das tecnologias, partilha conosco!</p>
                            <a class="more" href="#">Criar Oferta <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== SERVICES SECTION ENDS ======-->
    
    <!--====== ABOUT SECTION START ======-->
    
    <section id="about" class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">A Nossa plataforma <span>está aqui para ajudar</span></h3>
                        </div>
                        <p class="text">Às vezes não é facil termos acesso a ofertas de trabalho que se enquadram com o nosso perfil e com as nossas necessidades, mas com a nossa ajuda, tu vais encontrar o que precisas!</p>
                        <a href="#" class="main-btn">Registar</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="public/assets/images/about1.svg" alt="about">
                    </div>
                </div>
            </div>
        </div>
        <div class="about-shape-1">
            <img src="public/assets/images/about-shape-1.svg" alt="shape">
        </div>
    </section>
    
    <!--====== ABOUT SECTION ENDS ======-->


    <!--====== SERVICES COUNTER SECTION START ======-->
    
    <section id="facts" class="video-counter pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img class="dots" src="public/assets/images/dots.svg" alt="dots">
                        <div class="video-wrapper">
                            <div class="video-image">
                                <img src="public/assets/images/video.png" alt="video">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="counter-wrapper mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="counter-content">
                            <div class="section-title">
                                <div class="line"></div>
                                <h3 class="title">Factos interessantes <span> sobre a nossa plataforma</span></h3>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-4">
                                <div class="single-counter counter-color-1 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">10</span>K</span>
                                        <p class="text">Ofertas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="single-counter counter-color-2 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">1</span>K</span>
                                        <p class="text">Empresas ativas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="single-counter counter-color-3 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count"><span class="counter">4.8</span></span>
                                        <p class="text">Rating Usuarios</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== VIDEO COUNTER SECTION ENDS ======-->

    <!--====== FOOTER SECTION START ======-->
    
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe-content mt-45">
                            <h2 class="subscribe-title">Subscrever Newsletter <span>receber ofertas por email!</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="subscribe-form mt-50">
                            <form action="#">
                                <input type="text" placeholder="Introduza o seu email">
                                <button class="main-btn">Subscrever</button>
                            </form>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="footer-widget pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a class="logo" href="#">
                                <img src="public/assets/images/logo.svg" alt="logo">
                            </a>
                            <p class="text">A BasicJobs é uma plataforma de emprego, que cria uma ligação entre as empresas e os seus futuros colaboradores.</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-instagram-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-7">
                        <div class="footer-link d-flex mt-50 justify-content-md-between">
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Links Uteis</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Registar</a></li>
                                    <li><a href="#">Política De Privacidade</a></li>
                                </ul>
                            </div>
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">TESTE</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">TESTE</a></li>
                                    <li><a href="#">TESTE</a></li>
                                    <li><a href="#">TESTE</a></li>
                                    <li><a href="#">TESTE</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-5">
                        <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Contactos</h4>
                            </div>
                            <ul class="contact">
                                <li>+351 911 111 111</li>
                                <li>danielcarvalho.wd@gmail.com</li>
                                <li>https://github.com/daniel-wdv</li>
                                <li>Rua teste dos testes , Porto <br> 4430-750.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">Developed by <a href="https://www.linkedin.com/in/daniel-carvalho-wd/" rel="nofollow">Daniel Carvalho</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="particles-2"></div>
    </footer>
    
    <!--====== FOOTER SECTION ENDS ======-->
    
    <!--====== BACK TO TOP ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TO TOP ENDS ======-->

    <!--====== Loading Scripts ======-->

    <!--====== Jquery js ======-->
    <script src="public/assets/js/vendor/jquery-3.5.1-min.js"></script>
    <script src="public/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="public/assets/js/popper.min.js"></script>
    <script src="public/assets/js/bootstrap-4.5.0.min.js"></script>
    
    <!--====== Plugins js ======-->
    <script src="public/assets/js/plugins.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="public/assets/js/waypoints.min.js"></script>
    <script src="public/assets/js/jquery.counterup.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="public/assets/js/jquery.easing.min.js"></script>
    <script src="public/assets/js/scrolling-nav.js"></script>
    
    <!--====== wow js ======-->
    <script src="public/assets/js/wow.min.js"></script>
    
    <!--====== Particles js ======-->
    <script src="public/assets/js/particles.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="public/assets/js/main.js"></script>
    
</body>
</html>
