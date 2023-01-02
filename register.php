<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta name="viewport" content="width= device-width, initial-scale= 1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <style>
            .wrap {
                width: 100%;
                max-width: 400px;
                margin: 40px auto;
            }
        </style>
    </head>
    <body class="text-center">
        <div class="wrap">
            <h1 class="h3 mb-3">Register</h1>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-warning">
                Cannot create account. Please try again.
                </div>
            <?php endif ?>
            <form action="_actions/create.php" method="post" class="form-control p-3">
                <input type="text" name="name" class="form-control mb-3"
                    placeholder="Name" required>
                <input type="email" name="email" class="form-control mb-3"
                    placeholder="Email" required>
                <input type="text" name="phone" class="form-control mb-3"
                    placeholder="Phone Number" required>
                <textarea name="address" class="form-control mb-3"
                    placeholder="Address" required></textarea>
                <input type="password" name="password" class="form-control mb-3"
                    placeholder="Password" required>
                <button type="submit"
                    class="w100 btn btn-lg btn-primary">
                    Register
                </button>
                <br>
                <a href="index.php">Login</a>
            </form>
        </div>
    </body>
</html>