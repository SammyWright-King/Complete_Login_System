<?php

if (isset($_POST['login-submit']))
{
    require "dbh.inc.php";

    $username_email = $_POST['Username'];
    $password = $_POST['Password'];

    if ( empty($username_email) || empty($password))
    {
        header("Location: ../signup.php?error=emptyfields&Username=".$username_email."&Password=".$password);
        exit();
    }
    else{
        $sql = "SELECT * FROM loginsystem WHERE username=? OR email=?";
        $stmt = mysqli_stmt_init($conn);
        if ( !mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $username_email, $password );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == FALSE)
                {
                    header("Location: ../signup.php?error=wrongpassword");
                    exit();
                }
                elseif( $pwdCheck == TRUE)
                {
                    //start session
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] =$row['username'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
            else{
                header("Location: ../signup.php?error=nouser");
                exit();
            }
        }
    }
}