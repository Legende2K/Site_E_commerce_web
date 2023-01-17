<?php
include "php/core.php";
include "php/functions.php";
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
  <script src="../js/carousel.js" async></script>
  <script src="../js/category.js" async></script>
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
      <div id="carousel">
        <div class="hideLeft">
          <img src="images\casseroles.jpg" />
        </div>

        <div class="prevLeftSecond">
          <img src="images\ustenciles_silicone.png" />
        </div>

        <div class="prev">
          <img src="images\ustencils_bois.jpg" />
        </div>

        <div class="selected">
          <img src="images\ustencils_metal.jpg" />
        </div>

        <div class="next">
          <img src="images\tiroirs.png" />
        </div>

        <div class="nextRightSecond">
          <img src="images\ustenciles_or.png" />
        </div>

        <div class="hideRight">
          <img src="images\poeles.jpg" />
        </div>
      </div>
      <div class="products_list">
        <?php
        $Items = showItem();
        while ($row = mysqli_fetch_assoc($Items)) {
        ?>
          <form action="" class="product">
            <div class="image_product">
              <img src="images/<?= $row['Picture'] ?>">
            </div>
            <div class="content">
              <h4 class="name"><?= $row['Name'] ?></h4>
              <h2 class="price"><?= $row['Price'] ?>€</h2>
              <h4 onclick="showCart()" class="id_product">Ajouter au panier</h4>
            </div>
          </form>

        <?php } ?>
      </div>
      <div id="partie_droite">

      </div>

    </div>

    <div id="chevrons_position">
      <div class="chevrons">
        <i id="prev" class="fa-solid fa-chevron-left"></i>
        <i id="next" class="fa-solid fa-chevron-right"></i>
      </div>
    </div>
  </main>
  <?php include "php/components/footer.php"; ?>
</body>
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

  function showSubcaterory2() {
    var carousel = document.getElementById("carousel");
    var chevrons = document.getElementsByClassName("chevrons");
    carousel.style.display = "none";
    for (var i = 0; i < chevrons.length; i++) {
      chevrons[i].style.display = "none";
    }
    var productsList = document.getElementsByClassName("products_list");
    for (var j = 0; j < productsList.length; j++) {
      productsList[j].style.display = "flex";
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
  while ($row = $result->fetch_assoc()) {
    $innerHTML = $innerHTML . '<form action="" class="product"><div class="image_product"><img src="images/' . $row['Picture'] .  '"></div><div class="content"><h4 class="name">' . $row['Name'] . '</h4><h2 class="price">' . $row['Price'] . '€</h2><h4 onclick="showCart()" class="id_product">Ajouter au panier</h4></div></form>';
  }

  echo "<script>document.getElementsByClassName('products_list')[0].innerHTML = '" . $innerHTML . "';</script>";
}
?>

</html>