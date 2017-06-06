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
        <title>Exercice 6 de la partie 1 en PDO</title>
        <meta charset="utf-8"/>
        <meta title="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link href="../style.css" rel="stylesheet" title="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <?php include '../index.php'; ?>
        </header>
        <p class="order">Consigne de l'exercice 6 de la partie 1 sur PDO : Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.</p>
        <p class="title">Voici la liste :</p>
        <?php
        /** Déclaration de la variable effectuant la requète de sélection de la table spectacles = shows + 
         * affichage de ceux qui ont une carte de fidélité (WHERE)  + 
         * fetchAll qui charge en mémoire toutes les données sous forme de tableau. * */
        $shows = $bdd->query('SELECT `shows`.`title`, `shows`.`performer`, `shows`.`date`, `shows`.`startTime` FROM `shows` ORDER BY `shows`.`title`')->fetchAll();
        /** Affichage de la table shows avec les différentes infos  * */
        foreach ($shows as $show) {
            ?>
            <p class="list">"<?= $show['title'] ?>" par : <?= $show['performer'] ?> le <?= $show['date'] ?> à <?= $show['startTime'] ?>.</p>
                <?php
            }
            ?>
    </body>
</html>