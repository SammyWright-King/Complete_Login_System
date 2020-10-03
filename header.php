<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    

    <title>Procedural Programming</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 -->
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact us</a>
                        </li>
                    </ul>
                    <?php
                        if ( isset($_SESSION['user_id']))
                        {
                            echo '<form action="includes/logout.inc.php" method="POST" class="form-inline my-2 my-lg-0">
                                    <button class="btn btn-outline-success my-2 my-sm" type="submit" name="logout-submit">LOGOUT</button>
                                    </form>';
                        }
                        else{
                            echo '<form class="form-inline my-2 my-lg-0" method="POST" action="includes/login.inc.php">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Username/Email" aria-label="Search" name="Username">
                                    <input type="password" class="form-control mr-sm-2" placeholder="Password.." name="Password">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="login-submit">LOGIN</button>
                                    </form>
    
                                    <div class="nav-item">
                                        <a href="signup.php" class="nav-link">SIGNUP</a>
                                    </div> ';
                        }
                    
                    ?>
                </div>
            </nav>
        </header>
       <!--  bootstrap core javascript -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
