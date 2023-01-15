<?php
function pr($var) {
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
}

function sql($requete) {
  global $mysqli;

  $result = $mysqli->query($requete);
  if (!$result) {
      exit($mysqli->error);
  } else {
      $nb = $result->num_rows;
      $row = false;
      if ($nb) {
          $row = $result->fetch_assoc();
      }
  }
  return $row;
}

function insert($requete) {
  global $mysqli;

  $result = $mysqli->query($requete);
  if (!$result) {
      exit($mysqli->error);
      return false;
  } else {
      return true;
  }
}

function addUser($firstName, $name, $birthDate, $address1, $address2, $postalCode, $country, $phone, $email, $password) {
  global $mysqli;
  $sql = "INSERT INTO user (firstName, name, birthDate, address1, address2, postalCode, country, phone, email, password) VALUES ($firstName, $name, $birthDate, $address1, $address2, $postalCode, $country, $phone, $email, $password)";

  $result = $mysqli->query($sql);
  if (!$result) {
    exit($mysqli->error);
  }
}



function addItem($name, $price, $description) {
  global $mysqli;
  $sql = "INSERT INTO produits (name, price, description) VALUES ($name, $price, $description)";

  $result = $mysqli->query($sql);
  if (!$result) {
    exit($mysqli->error);
  }
}

function showItem() {
  global $mysqli;
  $sql = "SELECT * FROM item ORDER BY price ASC";

  $result = $mysqli->query($sql);
  if (!$result) {
    exit($mysqli->error);
  }

  return ($result);
}

function showCategory() {
  global $mysqli;
  $sql = "SELECT * FROM category ORDER BY categoryID ASC";

  $result = $mysqli->query($sql);
  if (!$result) {
    exit($mysqli->error);
  }

  return ($result);
}

function showSubCategory($categoryID) {
  global $mysqli;
  $sql = "SELECT * FROM subcategory WHERE categoryID= $categoryID ORDER BY subCategoryID ASC";

  $result = $mysqli->query($sql);
  if (!$result) {
    exit($mysqli->error);
  }

  return ($result);
}
