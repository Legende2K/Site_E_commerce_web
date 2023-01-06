<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mrs+Sheppards" />
  <link rel="stylesheet" href="css/all.css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/accueil.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel='stylesheet' href="https://css.gg/instagram.css">
  <link rel='stylesheet' href="https://css.gg/facebook.css">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="js\carousel.js" async></script>
  <title>Kittools</title>
</head>

<body>
  <?php include "php/components/header.php"; ?>
  <div id="trois_parties">
    <div id="partie_gauche">

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
    <div id="partie_droite">
      
    </div>
    
  </div>
  
  <div id="chevrons_position">
    <div class="chevrons">
      <i id="prev" class="fa-solid fa-chevron-left"></i>
      <i id="next" class="fa-solid fa-chevron-right"></i>
    </div>
  </div>

  <footer>
    <div id="palette_footer">
      <div id="section_1">
        <h3>Boutique</h3>
        <h5>Catégorie 1</h5>
        <h5>Catégorie 2</h5>
        <h5>Catégorie 3</h5>
      </div>
      <div id="section_2">
        <h3>Accès Client</h3>
        <h5>Compte</h5>
        <h5>Panier</h5>
        <h5>Contact</h5>
      </div>
      <div id="section_3">
        <h3>Nos Réseaux</h3>
        <div id="icons_reseaux">
          <i class="gg-instagram"></i>
          <i class="gg-facebook"></i>
        </div>
      </div>
    </div>
    <div id="credits">
      <h5>Site réalisé par le groupe 5</h5>
    </div>

  </footer>
</body>

</html>