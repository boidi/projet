<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="/style.css">
  </head>
  <body>
    <?php
    if (isset($_POST['code']) AND $_POST['code']="kirifi") {

     ?>
    <h1>Bienvenue sur la page colis </h1>
    <ul>
      <!-- lien vers la page de selection des articles -->
      <li><a href="panier.php">Preparer un colis</a></li>
      <li> <a href="#">Articles</a></li>
      <li> <a href="#">historiques des colis envoyés</a></li>
    </ul>
    <!-- <div class="">

    </div> -->

    <?php
}
else
{
    echo '<p>Mot de passe incorrect</p>';
}
?>
<div class="test">
  <p>paragraphe test</p>

</div>

  </body>
</html>
