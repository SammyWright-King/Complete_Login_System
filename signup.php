<?php
require "header.php";
?>
<body>
<br><br>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <?php
                if ($_GET['error'] = "emptyfields")
                {
                    echo "<p> Empty fields noticed</p>";
                }
                elseif ($_GET['error'] = "emailFormaterror"){
                    echo "<p> E-mail format not recognized</p>";
                }
            ?>
            <form class="form-group my-2 my-lg-0" method="POST" action="includes/signup.inc.php">
                <input type="text" class="form-control mr-sm-2" placeholder="Username"  name="Username"><br>
                <input type="text" class="form-control mr-sm-2" placeholder="E-mail" name="Email"><br>
                <input type="password" class="form-control mr-sm-2" placeholder="Password.." name="Password"><br>
                <input type="password" class="form-control mr-sm-2" placeholder="Re-enter Password" name="Re_password"><br>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="signup-submit">LOGIN</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</body>