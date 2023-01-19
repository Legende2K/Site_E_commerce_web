<?php
include "php/core.php";
include "php/functions.php";
addToCart();
if (isset($_SESSION["error_cart_message"])) {
  echo "<script>alert('" . $_SESSION["error_cart_message"] . "')</script>";
  unset($_SESSION["error_cart_message"]);
}
?>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/all.css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/accueil.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <title>Kittools</title>
</head>

<body>
  <?php include "php/components/header.php"; ?>
  <main>
    <div id="trois_parties">
      <div id="partie_gauche">
        <div id=categories>
          <?php

          $Categories = showCategory();
          while ($row = mysqli_fetch_assoc($Categories)) {
          ?>

            <div class="category" data-id="<?= $row['CategoryID'] ?>">
              <?= $row['Name'] ?>
            </div>

          <?php } ?>
        </div>

        <div id=subcategories>
          <?php

          $Categories = showCategory();
          while ($row1 = mysqli_fetch_assoc($Categories)) {
          ?>
            <div id="sub_of_category<?= $row1['CategoryID'] ?>">
              <i class="fa-solid fa-arrow-left-long"></i>
              <?php

              $SubCategories = showSubCategory($row1['CategoryID']);
              while ($row2 = mysqli_fetch_assoc($SubCategories)) {
              ?>
                <div class="subcategory">
                  <?= $row2['Name'] ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
      <div id=partieCentre >
        <div id="carousel">
          <div id="picture1" class="hideLeft"></div>

          <div id="picture2" class="prevLeftSecond"></div>

          <div id="picture3" class="prev"></div>

          <div id="picture4" class="selected"></div>

          <div id="picture5" class="next"></div>

          <div id="picture6" class="nextRightSecond"></div>

          <div id="picture7" class="hideRight"></div>
        </div>
        <div class="products_list"></div>
        <div id="chevrons_position">
          <div class="chevrons">
            <i id="prev" class="fa-solid fa-chevron-left"></i>
            <i id="next" class="fa-solid fa-chevron-right"></i>
          </div>
        </div>
      </div>
      <div id="partie_droite">
          <span class="bandeau"> - Kittools - Kittools - Kittools - Kittools&nbsp;</span>
          <span class="bandeau"> - Kittools - Kittools - Kittools - Kittools&nbsp;</span>
      </div>
    </div>
  </main>
  <?php include "php/components/footer.php"; ?>
</body>
<script src="../js/category.js"></script>
<?php
  $requete = "SELECT ItemID FROM item";
  $result = $mysqli->query($requete);
  $nb = $result->num_rows;
  $item_ids = array();
  while ($row = $result->fetch_assoc()) {
      $item_ids[] = $row['ItemID'];
  }
  shuffle($item_ids);
  $random_ids = array_slice($item_ids, 0, 7);
  $random_ids_string = implode(",", $random_ids);
  $result = $mysqli->query("SELECT Picture, ItemID FROM item WHERE ItemID IN ($random_ids_string)");
  for ($i = 1; $i <= 7; $i++) {
    $data = mysqli_fetch_assoc($result);
    $picture = $data['Picture'];
    $idItem = $data['ItemID'];
    echo "<script>document.getElementById('picture$i').innerHTML = \"<img pictureId='$idItem' src='../images/{$picture}'/>\";</script>";
  }
?>
<script>
  const pictures = document.querySelectorAll("#carousel div");
  const picturesId = document.querySelectorAll("#carousel img");
  for (let i = 0; i < pictures.length; i++) {
    pictures[i].addEventListener("click", function() {
      if (pictures[i].classList.contains("selected")) {
        window.location.href = "../item.php?id=" + picturesId[i].getAttribute("pictureId");
      }
    });
  }
</script>


<script>
  function removeLeadingTrailingWhitespaces(name) {
    return name.replace(/(^[\s\n]+|[\s\n]+$)/g, '');
  }
  const subCategories2 = document.getElementsByClassName("subcategory");
  for (let i = 0; i < subCategories2.length; i++) {
    subCategories2[i].addEventListener("click", function() {
      console.log(subCategories2[i], i);
      const name = subCategories2[i].innerHTML
      window.location.href = "index.php?category=" + removeLeadingTrailingWhitespaces(name);
    });
  }

  function goToItem(id) {
    window.location.href = "../item.php?id=" + id;
  }

  function showSubcaterory2() {
    var carousel = document.getElementById("carousel");
    var chevrons = document.getElementsByClassName("chevrons");
    carousel.style.display = "none";
    for (var i = 0; i < chevrons.length; i++) {
      chevrons[i].style.display = "none";
    }
    var productsList = document.getElementsByClassName("products_list");
    for (var j = 0; j < productsList.length; j++) {
      productsList[j].style.display = "grid";
    }
  }

  <?php if (isset($_GET['category'])) { ?>
    showSubcaterory2();
  <?php } ?>
</script>
<?php
if (isset($_GET['category'])) {
  //recup id par rapport au nom de la catégorie
  $sql = "SELECT SubCategoryID FROM subcategory WHERE Name = '" . $_GET['category'] . "'";
  $result = sql($sql);

  //recup items par rapport à l'id de la catégorie
  $sql = "SELECT * FROM item WHERE SubCategoryID = '" . $result["SubCategoryID"] . "'";
  $result = $mysqli->query($sql);
  $nb = $result->num_rows;
  $innerHTML = "";
  $i = 0;
  while ($row = $result->fetch_assoc()) {
    if ($nb == 1) {
      $innerHTML = $innerHTML . '<form style="grid-column:2; grid-row:1;" id="' . $row["ItemID"] . '" class="product" onclick="goToItem(' . $row["ItemID"] . ')"><div class="image_product"><img src="images/' . $row['Picture'] .  '"></div><div class="content"><h4 class="name">' . $row['Name'] . '</h4><h2 class="price">' . $row['Price'] . '€</h2><h4 class="id_product">Ajouter au panier</h4></div></form>';
    } else if ($nb ==2) {
      $innerHTML = $innerHTML . '<form style="grid-column:' . ($i%3 + 2) . '; grid-row:' . (floor($i/3) + 1) . ';" id="' . $row["ItemID"] . '" class="product" onclick="goToItem(' . $row["ItemID"] . ')"><div class="image_product"><img src="images/' . $row['Picture'] .  '"></div><div class="content"><h4 class="name">' . $row['Name'] . '</h4><h2 class="price">' . $row['Price'] . '€</h2><h4 class="id_product">Ajouter au panier</h4></div></form>';
    } else {
      $innerHTML = $innerHTML . '<form style="grid-column:' . ($i%3 + 1) . '; grid-row:' . (floor($i/3) + 1) . ';" id="' . $row["ItemID"] . '" class="product" onclick="goToItem(' . $row["ItemID"] . ')"><div class="image_product"><img src="images/' . $row['Picture'] .  '"></div><div class="content"><h4 class="name">' . $row['Name'] . '</h4><h2 class="price">' . $row['Price'] . '€</h2><h4 class="id_product">Ajouter au panier</h4></div></form>';
    }
    $i++;
  }
  if ($nb == 2) {
    echo "<script>document.getElementsByClassName('products_list')[0].style.gridTemplateColumns = '1fr 2fr 2fr 1fr';</script>";
  }

  echo "<script>document.getElementsByClassName('products_list')[0].innerHTML = '" . $innerHTML . "';</script>";
}
?>
<script>
  const id_products = document.getElementsByClassName("id_product");
  for (let i = 0; i < id_products.length; i++) {
    id_products[i].addEventListener("click", function() {
      event.preventDefault();
      event.stopPropagation();
      window.location.href = window.location.href + "&cart_id=" + id_products[i].parentElement.parentElement.id;
    });
  }
</script>
<script src="../js/carousel.js"></script>
</html>