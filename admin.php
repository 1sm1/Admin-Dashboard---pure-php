<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$all = $table->getAll();

$auth = Auth::check();
$token = $table->makeToken();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint"
            content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <title>Manage Users</title>
    </head>
    <body>
        <div class="container">
            <div class="float-end">
                <a href="profile.php">Profile</a> | 
                <a href="_actions/logout.php">Log out</a>
            </div>
            <h1 class="mt-4 mb-5">
                Manage Users
                <span class="badge bg-danger">
                    <?= count($all); ?>
                </span>
                <span class="badge bg-success"><?=$auth->role?></span>
            </h1>
            <div><?php print_r($auth);?></div>
            <table class="table table-striped table-bordered">
                <tr>    
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Actions</th>
                <tr>    
                <?php foreach($all as $user) : ?>
                    <tr>
                        <td> <?= $user->id ?> </td>
                        <td> <?= $user->name ?> </td>
                        <td> <?= $user->email ?> </td>
                        <td> <?= $user->phone ?> </td>
                        <td> 
                            <?php if($user->value == 1 ) : ?>
                                <div class="badge bg-secondary"
                                    ><?= $user->role?>
                                </div>
                            <?php elseif($user->value == 2) : ?>
                                <div class="badge bg-primary"
                                    ><?= $user->role?>
                                </div>
                            <?php else : ?>
                                <div class="badge bg-success"
                                    ><?= $user->role?>
                                </div>
                            <?php endif?>
                        </td>
                        <td>
                            <?php if($auth->value > 1 ) : ?>
                                <div class="btn-group dropdown">
                                    <a href="#" 
                                        class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        >Change Role
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-dark">
                                        <a href="_actions/role.php?id=<?=$user->id?>&role=1&usrf=<?=$token?>"
                                            class="dropdown-item">User
                                        </a>
                                        <a href="_actions/role.php?id=<?=$user->id?>&role=2&usrf=<?=$token?>" 
                                            class="dropdown-item">Manager
                                        </a>
                                        <a href="_actions/role.php?id=<?=$user->id?>&role=3&usrf=<?=$token?>" 
                                            class="dropdown-item">Admin
                                        </a>
                                    </div>
                                </div>
                                <?php if($user->suspended) : ?>
                                    <a href="_actions/suspend.php?id=<?=$user->id?>&suspended=0&usrf=<?=$token?>"
                                        class="btn btn-sm btn-outline-danger">Suspended 
                                    </a>
                                <?php else : ?>
                                    <a href="_actions/suspend.php?id=<?=$user->id?>&suspended=1&usrf=<?=$token?>"
                                        class="btn btn-sm btn-outline-success">Active
                                    </a>
                                <?php endif?>
                                <?php if($auth->id !== $user->id) : ?>
                                    <a href="_actions/delete.php?id=<?=$user->id?>&usrf=<?=$token?>"
                                        class="btn btn-sm btn-outline-danger"
                                        onClick="return confirm('Are you sure?')">Delete
                                    </a>
                                <?php endif?>
                            <?php else : ?>
                                ###
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>