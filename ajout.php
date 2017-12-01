<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>details colis</title>
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
      $idarticle     = $_POST["idarticle"] ;
      $nombre = $_POST["nombre"] ;
      $idcolis =$_POST["idcolis"];

      //création de la requête SQL:
      $sql = "INSERT  INTO details_colis (idcolis,idarticle, nombre_articles)
                VALUES ( '$idcolis','$idarticle', '$nombre') " ;

      //exécution de la requête SQL:
      $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;

      //affichage des résultats, pour savoir si l'insertion a marchée:
      if($requete)
      {
        echo("L'insertion a été correctement effectuée") ;
      }
      else
      {
        echo("L'insertion à échouée") ;
      }
    ?>
  </body>
</html>
