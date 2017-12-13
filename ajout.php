<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>details colis</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      //connection au serveur et la base de données
      try {
          $bdd = new PDO('mysql:host=localhost;dbname=transit;charset=utf8', 'root', '');
      } catch (Exception $e)
      {
        die('Erreur :' .$e->getMessage());
      }


      //récupération des valeurs des champs:
      //nom:
      // $idarticle     = $_POST["idarticle"] ;
      // $nombre = $_POST["nombre"] ;
      // $idcolis =$_POST["idcolis"];

      //création de la requête SQL et exécution de la requête SQL:
      // $sql = $bdd->exec("INSERT  INTO details_colis (idcolis,id_articles, nombre_articles)
      //           VALUES ('$idcolis','$idarticle', '$nombre')") ;

      //affichage des résultats, pour savoir si l'insertion a marchée:
      // if($sql)
      // {
      //   echo("L'insertion a été correctement effectuée") ;?>
      <!-- //   <div class="liste"> -->

<!-- requête sql pour afficher le libelle du colis
et regrouper les articles par colis ,le nom de l'articles-->
                <div class="tableau">
                  <p>historique des colis </p>
                <table>
                  <thead>
                    <tr>
                    <th>colis</th>
                    <th>articles</th>
                    <th>nombre articles</th>
                    <th>actions</th>


                    </tr>
                  </thead>

                  <tbody>
                    <?php
                  $requete = $bdd->query('SELECT colis.libelle AS libelle, articles.libelle As articles, details_colis.nombre_articles AS nombre, colis.frais_transport AS transport FROM colis , details_colis, articles
WHERE colis.id = details_colis.idcolis AND articles.id = details_colis.id_articles');

                while($donnees = $requete->fetch())
                   {
                     ?>
                    <tr>
                    <td> <?php echo $donnees['libelle'] ?></td>
                      <td> <?php echo $donnees['articles'] ?></td>
                        <td> <?php echo $donnees['nombre'] ?></td>
                        <td>supprimer/modifier</td>  </tr>

                        <!--le total des achat + les frais de transport (requête à realiser)
                      requete de modification et de suppression d'une ligne dans le details-colis-->

<?php
          }


?>
</tbody>
<tfoot>
</tr><td colspan="3">frais total transport: <?php echo $donnees[0]['transport'] ?></td></tr>
  <tr><td colspan="3">total achat:</td></tr>

</tfoot>
</table>
</div>
<?php
$requete->closeCursor();
 ?>
        <!--

      // else
      {
        // echo("L'insertion à échouée") ;

      }

    <div class="retour" style="margin-top:50px">
      <input type="button" value="back"onclick="goBack()">

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    </div>
    <!--requête preparer -->
   <?php
// $req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
// $req->execute(array(
// 	'nom' => $nom,
// 	'possesseur' => $possesseur,
// 	'console' => $console,
// 	'prix' => $prix,
// 	'nbre_joueurs_max' => $nbre_joueurs_max,
// 	'commentaires' => $commentaires
// ));
//
// echo 'Le jeu a bien été ajouté !';
// ?>
  </body>
</html>
