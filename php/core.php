<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
ini_set("display_startup_errors", "On");

session_start();

$infoBdd = ["server" => "localhost",
"login" => "root",
"password" => "",
"db_name" => "database", ];

$mysqli = new mysqli($infoBdd["server"], $infoBdd["login"],
                        $infoBdd["password"],$infoBdd["db_name"]);

if ($mysqli->connect_errno) {
    exit("Connexion to the database failed");
}

$_COMPTE =false;
if (isset($_SESSION["compte"])) {
    $sql = "SELECT * FROM user WHERE UserID = '{$_SESSION["compte"]}'";
    $result = $mysqli->query($sql);    
    $nb = $result->num_rows;
    if ($nb) {
        $row = $result->fetch_assoc();
        $_COMPTE = $row;
    }
}

?>