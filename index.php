<?php
session_start();
unset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <title>HOME</title>
        <style>
            .wrap{
                max-width: 400px;
                margin: 40px auto;
            }
        </style>
    </head>
    <body class="text-center">
        <div class="wrap">
            <h1 class="mb-3 h3"><b>Login</b></h1>

            <?php if( isset($_GET['registered']) ) : ?>
                <div class="alert alert-success">
                    Account created. Please login.
                </div>
            <?php endif ?>

            <?php if( isset($_GET['suspended']) ) : ?>
                <div class="alert alert-danger">
                    Your account is suspended
                </div>
            <?php endif ?>

            <?php if( isset($_GET['incorrect']) ) : ?>
            <div class="alert alert-warning">
                Incorrect Email or Password 
            </div>
            <?php endif ?>

            <form action="_actions/login.php" method="post">
                <input 
                    type="email" name="email"
                    class="form-control mb-3"
                    placeholder="Email" required
                >
                <input 
                    type="password" name="password"
                    class="form-control mb-3"
                    placeholder="Password" required
                >
                <button type="submit"
                    class="w-100 btn btn-lg btn-primary">
                    Login
                </button>
            </form>
            <br>
            <a href="register.php">Register</a>
        </div>
    </body>
</html>