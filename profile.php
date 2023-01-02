<?php

include("vendor/autoload.php");

use Helpers\Auth;

$auth = Auth::check();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <style>
            .wrap{
                max-width: 400px;
                margin: 40px auto;
            }
        </style>
    </head>
    <body>
        <div class="container wrap">
            <h1 class="mt-5 mb-3">
                <?= $auth->name ?>
                <span class="fw-normal text-muted">
                    (<?= $auth->role ?>)
                </span>
            </h1>
            <?php if(isset($_GET['error'])) : ?>
                <div class="alert alert-warning">
                Cannot Upload File
                </div>
            <?php endif?>    
            <?php if($auth->photo) : ?>
                    <img class="img-thumbnail mb-3"
                        src="_actions/photos/<?= $auth->photo ?>"
                        alt="Profile Photo" width="300">
            <?php endif?>
            <form action="_actions/upload.php" method="post"
                enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="file" name="photo" class="form-control">
                    <button type="submit" class="btn btn-secondary">Upload</button>
                </div>
            </form>
            <ul class="list-group">
                <li class="list-group-item">
                <b>Email:</b> <?= $auth->email ?>
                </li>
                <li class="list-group-item">
                <b>Phone:</b> <?= $auth->phone ?>
                </li>
                <li class="list-group-item">
                <b>Address:</b> <?= $auth->address ?>
                </li>
            </ul>
            <br>
            <a href="admin.php">Manage Users</a> |
            <a href="_actions/logout.php">Log out</a>
        </div>
    </body>
<html>    