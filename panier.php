<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>preparer un colis</title>
  </head>
  <body>
    <div class="table" style="margin-left:200px">


    <form class="panier" action="ajout.php" method="post">
      <?php
try
{

	$bdd = new PDO('mysql:host=localhost;dbname=transit;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur :' .$e->getMessage());
}
?>
      <p>selectionnez un article  <select name="idarticle" id="articles"> </p>
<?php
          $requete = $bdd->query('SELECT * FROM articles');

          // $resultat = mysql_query($requete) or die('Erreur SQL !<br />'.mysql_error());
          while($donnees = $requete->fetch())
          {

          echo '<option value="'.$donnees['id'].'">'.$donnees['libelle'].'</option>';
                // echo $donnees['libelle']. '<br />';

          }
          $requete->closeCursor();
         ?>
     </select><br /><br >
    <p>selectionnez un colis <select name="idcolis" id="colis"></p>
       <?php
       $resultat= $bdd->query('SELECT * FROM colis');
       while($reponse = $resultat->fetch())
       {

       echo '<option value="'.$reponse['id'].'">'.$reponse['libelle'].'</option>';
             // echo $donnees['libelle']. '<br />';

       }
       $resultat->closeCursor();
         ?>
     </select> <br /> <br>


          <p>nombre d'article  <input type="number" name="nombre" value=""></p>

<input type="submit" name="" value="valider">
    </form>
    <div class="test">
      <p>je suis un paragraphe test</p>  </div>
      <!-- super j'ai pu regler mon bug de connexion a la base de données
      il reste à regler la validation de la selection des articles
      et afficher par la suite la tableau des articles selectionnés
-->
    </div>
  </body>
</html>
