<?php
function pr($var)
{
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
}

function sql($requete)
{
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

function insert($requete)
{
  global $mysqli;

  $result = $mysqli->query($requete);
  if (!$result) {
    exit($mysqli->error);
    return false;
  } else {
    return true;
  }
}

function removeURLParameter($keyParams)
{
  $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $url_parts = parse_url($current_url);
  $params = array();
  parse_str($url_parts['query'], $params);
  unset($params[$keyParams]);

  $query = http_build_query($params);
  $new_url = $url_parts['scheme'] . "://" . $url_parts['host'] . $url_parts['path'];
  if ($query) $new_url .= "?" . $query;
  header("Location: " . $new_url);
}


include "functions/profil_functions.php";
include "functions/categories_functions.php";
include "functions/cart_functions.php";