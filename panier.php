<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>preparer un colis</title>
  </head>
  <body>
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
    <div class="table" style="margin-left:200px">


    <form class="panier" action="panier.php" method="post">


      <p>selectionnez un article  <select name="idarticle" id="articles"> </p>
        <?php
          $requete = $bdd->query('SELECT * FROM articles');

          // $resultat = mysql_query($requete) or die('Erreur SQL !<br />'.mysql_error());
          while($donnees = $requete->fetch())
          {

          echo '<option value="'.$donnees['id'].'">' .$donnees['libelle'].'</option>';

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

<input type="submit"  value="valider">
    </form>
      <!--exécution de la requête -->
    <?php
      // if (isset($_POST['code']) AND $_POST['code']="kirifi") {
      // on verifie que tous les champs sont bien saisis
if(empty($_POST['nombre']) OR empty(['idarticle']) OR empty(['idcolis'])){
  echo "veuillez saisir les valeurs demandées";
}else {
    $idarticle = $_POST["idarticle"] ;
    $nombre = $_POST["nombre"] ;
    $idcolis =$_POST["idcolis"];

    //création de la requête SQL et exécution de la requête SQL:
    $sql = $bdd->exec("INSERT  INTO details_colis (idcolis,id_articles, nombre_articles)
              VALUES ('$idcolis','$idarticle', '$nombre')") ;

    //affichage des résultats, pour savoir si l'insertion a marchée:
    if($sql)
    {
      echo("L'insertion a été correctement effectuée") ;}
      else
      {
        echo("L'insertion à échouée") ;

      }
      }
      ?>

    <div class="test">
      <p><a href="ajout.php">voir la liste des colis et des articles</a></p>  </div>
      <!-- super j'ai pu regler mon bug de connexion a la base de données
      il reste à regler la validation de la selection des articles
      et afficher par la suite la tableau des articles selectionnés
      ajouter un bouton pour ajouter les données selectionnées car l'actualisation de la page ajout
      execute l'envoi des données dans la base de données
      requete pour afficher les données du details colis
      SELECT  libelle, nombre_articles, prix_unitaire FROM details_colis INNER JOIN
articles on details_colis.id_articles=articles.id
WHERE details_colis.idcolis=1

-->
    </div>
  </body>
</html>
