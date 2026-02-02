<?php
    session_start();
    require_once("dbcon.php");

    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

            if (empty($_POST["email"]) || empty($_POST["pass"])) {
                $message = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><b>x</b></button><label>All fields are required</label></div>';
            } else {
                $statement = $connect->prepare("SELECT * FROM users WHERE email = ? AND pass = ?");
                $statement->execute([$_POST["email"], $_POST["pass"]]);
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    $_SESSION["email"] = $_POST["email"];
                    // header("location:success.php");
                    print "<meta http-equiv='refresh' content='0;url=success.php'>";
                    exit();                      
                } else {
                    $message = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><label>Email & password not registered</label></div>';
                }
            }
        }
    } catch (PDOException $error) {
        $message = $error->getMessage();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Noobie login</title>

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
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Noobie login</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <section class="page-section" id="contact">
        <div class="container">
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Log in</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <form method="post">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Email Address</label>
                                <input class="form-control" name="email" type="text" placeholder="Email" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Password</label>
                                <input class="form-control" name="pass" type="password" placeholder="Password" />
                            </div>
                        </div>
                        <br />
                        <?php
                            if (isset($message)) {
                                echo '<label class="text-danger">' . $message . '</label>';
                            }
                        ?>
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-xl" type="submit" name="login">LOGIN</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
</body>

</html>