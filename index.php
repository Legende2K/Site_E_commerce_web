<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/all.css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/header.css">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="js\carousel.js" async></script>
  <title>Kittools</title>
</head>

<body>
  <?php include "php/components/header.php"; ?>
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
  <div id="chevrons_position">
    <div class="chevrons">
      <i id="prev" class="fa-solid fa-chevron-left"></i>
      <i id="next" class="fa-solid fa-chevron-right"></i>
    </div>
  </div>
</body>

</html>