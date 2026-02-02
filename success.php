<?php
    session_start();
    $mail = $_SESSION["email"];

    if(!isset($_SESSION["email"]))
    { 
        print "<meta http-equiv='refresh' content='0;url=index.php'>";
        exit;
    } 
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Success page</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="AdhirSaurio" />
        <meta name="description" content="Easy peasy login for php beginners with PHP7, PDO, ajax and SPA" />

        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <script src="assets/js/jquery4.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v7.1.0/js/all.js" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body id="page-top" class="d-flex flex-column min-vh-100">

        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Noobie login Success</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="btn btn-primary btn-lg" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <section class="page-section">
            <div class="container text-center">
                
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Success</h2>
                <p class="lead mb-0"> Welcome <?php echo  $mail; ?></p>
                
            </div>
        </section>
    </body>
</html>