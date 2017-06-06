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
        <title>Exercice 3 de la partie 1 en PDO</title>
        <meta charset="utf-8"/>
        <meta lastName="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link href="../style.css" rel="stylesheet" lastName="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <?php include '../index.php'; ?>
        </header>
        <p class="order">Consigne de l'exercice 3 de la partie 1 sur PDO : Afficher les 20 premiers clients.</p>
        <p class="title">Voici la liste des spectacles :</p>
        <ol>
            <?php
            /** Déclaration de la variable effectuant la requète de sélection de la table spectacles = clients + 
             * limitation au 20 premiers clients  + 
             * fetchAll qui charge en mémoire toutes les données sous forme de tableau. * */
            $clients = $bdd->query('SELECT `clients`.`lastName`, `clients`.`firstName` FROM `clients` LIMIT 20')->fetchAll();
            /** Affichage de la table clients  * */
            foreach ($clients as $client) {
                ?>
                <li class="list"><?= $client['lastName'] ?> <?= $client['firstName'] ?></li>
                    <?php
                }
                ?>
        </ol>
    </body>
</html>