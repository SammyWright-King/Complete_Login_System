<?php
    require "header.php";
?>

<main>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <?php
                if( isset($_SESSION['user_id']))
                {
                    echo "<p>You are logged in</p>";
                }
                else{
                    echo "<p>You are logged out</p>";
                }
            ?>
        </div>
        <div class="col-4"></div>
    </div>
</main>