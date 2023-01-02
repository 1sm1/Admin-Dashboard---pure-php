<?php
namespace Helpers;

class HTTP
{
    static $base = "HTTP://localhost/project";
    static function redirect($path, $query="") {
        $url =static::$base . $path;
        if($query) $url .= "?$query";
        header("location: $url");
        exit();
    }
}