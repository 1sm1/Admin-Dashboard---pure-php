<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$auth = Auth::check();
$table = new UsersTable(new MySQL);
$table->checkCSRF();

if($auth->value > 1)
{
    $id = $_GET['id'];
    $sus = $_GET['suspended'];
    $table->suspend($id,$sus);
} else {
    die("You have no authorizarion");
}
HTTP::redirect("/admin.php");