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
<script>
  const main = document.querySelector("main");
  const footer = document.querySelector("footer");
  const header = document.querySelector("header");

  main.style.minHeight = "calc(100% - " + (header.offsetHeight + footer.offsetHeight) + "px)";
</script>