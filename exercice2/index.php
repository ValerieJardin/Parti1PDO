<?php
/** Code pour se connecter au vhost puis à la base de données souhaitée : * */
try {
    /** Déclaraton de la variable dde connection * */
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'amstcvj60');
    /** Dans le cas où la connection ne peut se faire, déclaration de la variable message d'exception * */
} catch (Exception $e) {
    /** Dans le cas où la connection ne peut se faire, déclaration de la variable message d'erreur * */
    $msg = 'Erreur PDO dans ' . $e->getFile() . ' ligne ' . $e->getLine() . ' : ' . $e->getMessage();
    /** Sécurisation du code en demandant l'arrêt de la recherche de connection après avoir récupéré 
      le dossier, la ligne et le message d'erreur. * */
    die($msg);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Exercice 2 de la partie 1 en PDO</title>
        <meta charset="utf-8"/>
        <meta Name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <?php include '../index.php'; ?>
        </header>
        <p class="order">Consigne de l'exercice 2 de la partie 1 sur PDO : Afficher tous les types de spectacles possibles.</p>
        <p class="title">Voici la liste des spectacles :</p>
        <?php
        /** Déclaration de la variable effectuant la requète de sélection de la table spectacles = showTypes + 
         * fetchAll qui charge en mémoire toutes les données sous forme de tableau. * */
        $showTypes = $bdd->query('SELECT `showTypes`.`type` FROM `showTypes`')->fetchAll();
        /** Affichage de la table showTypes  * */
        foreach ($showTypes as $showType) {
            ?>    
            <p class="list"><?= $showType['type'] ?></p>
            <?php
        }
        ?>
    </body>
</html>