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
    $sql = "INSERT INTO produits (name, price, description) VALUES ($name, $price, $description)";

    $result = $mysqli->query($sql);
        if (!$result) {
        exit($mysqli->error);
        }
  }

  function showItem()
{
  require("connexion.php");
  $sql = "SELECT * FROM item ORDER BY price ASC";

  $result = $mysqli->query($sql);
  if (!$result) {
  exit($mysqli->error);
  }
  
  return($result);
}

function showCategory()
{
  require("connexion.php");
  $sql = "SELECT * FROM category ORDER BY categoryID ASC";

  $result = $mysqli->query($sql);
  if (!$result) {
  exit($mysqli->error);
  }
  
  return($result);
}

function showSubCategory($categoryID)
{
  require("connexion.php");
  $sql = "SELECT * FROM subcategory WHERE categoryID= $categoryID ORDER BY subCategoryID ASC";

  $result = $mysqli->query($sql);
  if (!$result) {
  exit($mysqli->error);
  }
  
  return($result);
}
?>