<?php

session_start();

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table = new UsersTable(new MySQL());

unset($_SESSION['user']);

$email = $_POST["email"];
$password = md5($_POST["password"]);


$user = $table->findByEmailAndPassword($email, $password);

if($user) {
    if($table->suspended($user->id)) {
        HTTP::redirect("/index.php", "suspended=1");
    }
    $_SESSION['user'] = $user;
    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/index.php", "incorrect=1");
}