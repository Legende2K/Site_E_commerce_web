<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
ini_set("display_startup_errors", "On");

$infoBdd = ["server" => "localhost",
"login" => "root",
"password" => "root",
"db_name" => "database", ];

$mysqli = new mysqli($infoBdd["server"], $infoBdd["login"],
                        $infoBdd["password"],$infoBdd["db_name"]);

if ($mysqli->connect_errno) {
    exit("Connexion to the database failed");
}

$_DATE_TIME=date('Y-m-d H:i:s');


?>