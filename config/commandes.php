<?php


function addUser($firstName, $name, $birthDate, $address1, $address2, $postalCode, $country, $phone, $email, $password)
  {
    require("connexion.php");
    $sql = "INSERT INTO user (firstName, name, birthDate, address1, address2, postalCode, country, phone, email, password) VALUES ($firstName, $name, $birthDate, $address1, $address2, $postalCode, $country, $phone, $email, $password)";

    $result = $mysqli->query($sql);
        if (!$result) {
        exit($mysqli->error);
        }
  }



function addItem($name, $price, $description )
  {
    require("connexion.php");
    $req = $access->prepare("INSERT INTO produits (name, price, description) VALUES ($name, $price, $description)");

    $req->execute(array($name, $price, $description));

    $req->closeCursor();
  }

  function showItem()
{
    require("connexion.php");
	$req=$access->prepare("SELECT * FROM item ORDER BY price ASC");

    $req->execute();

    $data = $req->fetchAll(PDO::FETCH_OBJ);

    return $data;

    $req->closeCursor();
}
