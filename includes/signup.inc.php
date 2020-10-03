<?php
if (isset($_POST['signup-submit']))
{
    require "dbh.inc.php";

    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $repassword = $_POST['Re_password'];

    //checking the input from the form
    if ( empty($username) || empty($email) || empty($password) || empty($repassword))
    {
        header("Location: ../signup.php?error=emptyfileds&Username=". $username."&Email=". $email);
        exit();
    }
    elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) )
    {
        header("Location: ../signup.php?error=emailFormaterror&Username=". $username );
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        header("Location: ../signup.php?error=invalidusernmae&Email=". $email);
        exit();
    }
    elseif ($password != $repassword)
    {
        header("Location: ../signup.php?error=passwordmismatch&Password=".$password."&Re_password=".$repassword);
        exit();
    }
    else{
        $sql = "SELECT username FROM loginsystem WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if( !mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerrorcannotselect");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if ($result > 0)
            {
                header("Location: ../signup.php?error=usertaken");
                exit();
            }
            else{
                $sql = "INSERT INTO loginsystem (username, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if ( !mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../signup.php?error=sqlerrorcannotinsert");
                    exit();
                }
                else{
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
        mysqli_stmt_close();
    }
    
}
