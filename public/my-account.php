<?php include 'templates/header.php'; ?>
<?php require_once "../config/config.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>My account page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .sidebar {
    height: 100%;
    width: 15vw;
    position: relative;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 16px;
    }

    .sidebar a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    }

    .sidebar a:hover {
    color: #f1f1f1;
    }

    .main {
    margin-left: 160px; /* Same as the width of the sidenav */
    padding: 0px 10px;
    }

    input[type=text] {
        width: 40%;
        display: inline-block;
        margin-right: 3vw;
        margin-bottom: 8vh;
    }

    @media screen and (max-height: 450px) {
    .sidebar {padding-top: 15px;}
    .sidebar a {font-size: 18px;}
    }
    </style>
</head>

<body>
<main role="main" class="container my-account top-main">
    <div class="row full-row">
        <div class="col-sm-2">
    <div class="sidebar">
        <a href="#home"><i class="fa fa-fw fa-home"></i> Dashboard</a>
        <a href="#services"><i class="fa fa-fw fa-wrench"></i> Informações</a>
        <a href="#clients"><i class="fa fa-fw fa-user"></i> Trabalhos</a>
        <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Password</a>
    </div>
        </div>
        <div class="col-sm-9">
    <div class="jumbotron jumbotron-row">
        <input type="text" value="">
        <input type="text" value="">
        <input type="text" value="">
        <input type="text" value="">
        </div>
    </div>
    </div>
    <hr>
</main>

</body>
</html>







<?php include 'templates/footer.php';



