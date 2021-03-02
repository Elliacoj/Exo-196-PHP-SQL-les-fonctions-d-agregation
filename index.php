<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.
    require "./Classes/DB.php";

    $db = DB::getInstance();

    $search = $db->prepare("SELECT MIN(age) AS minimum FROM user");

    $state = $search->execute();

    if($state) {
        $min = $search->fetch();
        echo "L'âge minimum est de " . $min['minimum'] . "<br>";
    }

    $search = $db->prepare("SELECT MAX(age) AS minimum FROM user");

    $state = $search->execute();

    if($state) {
        $min = $search->fetch();
        echo "L'âge maximum est de " . $min['minimum'] . "<br>";
    }

    $search = $db->prepare("SELECT COUNT(*) AS number FROM user");

    $state = $search->execute();

    if($state) {
        $min = $search->fetch();
        echo "Le nombre d'utilisateur est de " . $min['number'] . "<br>";
    }

    $search = $db->prepare("SELECT COUNT(*) AS number  FROM user WHERE numero >= 5");

    $state = $search->execute();

    if($state) {
        $min = $search->fetch();
        echo "Le nombre d'utilisateur ayant un numero de rue supérieur ou égal à 5 est de " . $min['number'] . "<br>";
    }

    $search = $db->prepare("SELECT AVG(age) AS number  FROM user");

    $state = $search->execute();

    if($state) {
        $min = $search->fetch();
        echo "La moyenne d'âge des utilisateurs est de " . $min['number'] . "<br>";
    }

    $search = $db->prepare("SELECT SUM(numero) AS number  FROM user");

    $state = $search->execute();

    if($state) {
        $min = $search->fetch();
        echo "La somme des numéros de rue des utilisateurs est de " . $min['number'] . "<br>";
    }
    ?>
</body>
</html>

