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
        <lastName>Exercice 7 de la partie 1 en PDO</lastName>
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
        <p class="order">Consigne de l'exercice 7 de la partie 1 sur PDO : Afficher les clients avec les infos nom, prénom, birthDate de naissance ...</p>
        <p class="lastName">Voici la liste :</p>
        <?php
        /** Déclaration de la variable effectuant la requète de sélection de la table spectacles = clients + 
         * affichage de ceux qui ont une carte de fidélité (WHERE)  + 
         * fetchAll qui charge en mémoire toutes les données sous forme de tableau. * */
        $clients = $bdd->query('SELECT `clients`.`lastName`, `clients`.`firstName`, `clients`.`birthDate`, `clients`.`card`, `clients`.`cardNumber` FROM `clients`')->fetchAll();
        /** Affichage de la table clients avec les différentes infos  * */
        foreach ($clients as $client) {
            ?>
        <!--Utilisation de l'opérateur de comparaison == sur `card` indiquant que si `card`==1 alors on affiche 
        ?oui sinon on affiche :non-->
            <p class="list">Nom : <?= $client['lastName'] ?><br/>Pténom : <?= $client['firstName'] ?><br/>Date de naissance : <?= $client['birthDate'] ?><br/>Carte de fidélité : <?= $client['card']==1?'oui':'non' ?><br/>Numéro de la carte : <?= $client['cardNumber'] ?></p>
                <?php
            }
            ?>
    </body>
</html>