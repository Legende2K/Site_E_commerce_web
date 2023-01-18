<?php
function showCategory()
{
  global $mysqli;
  $sql = "SELECT * FROM category ORDER BY categoryID ASC";

  $result = $mysqli->query($sql);
  if (!$result) {
    exit($mysqli->error);
  }

  return ($result);
}

function showSubCategory($categoryID)
{
  global $mysqli;
  $sql = "SELECT * FROM subcategory WHERE categoryID= $categoryID ORDER BY subCategoryID ASC";

  $result = $mysqli->query($sql);
  if (!$result) {
    exit($mysqli->error);
  }

  return ($result);
}