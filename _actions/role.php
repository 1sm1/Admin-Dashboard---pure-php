<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\Userstable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();
$table = new UsersTable(new MySQL());
$table->checkCSRF();

if($auth->value > 1)
{
    $id = $_GET['id'];
    $role = $_GET['role'];
    $table->changeRole($id, $role);
} else {
    die("You have no authorizarion");
}
HTTP::redirect("/admin.php");