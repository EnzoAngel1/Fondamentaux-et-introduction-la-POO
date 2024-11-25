<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification d'âge</title>
</head>

<body>
    <h1>Ajouter un utilisateur</h1>
    <br>
    <form method="POST" action="">

        <label for="name">Prénom de la personne : </label>
        <input type="text" name="name" id="name" required>
        <br><br>


        <label for="age">Âge de la personne : </label>
        <input type="number" name="age" id="age" required>
        <br><br>


        <button type="submit" name="submit">Afficher</button>
    </form>

    <br>

    <?php
    if (isset($_POST['submit'])) {

        function age_verif($age, $prenom)
        {
            $majeur = 18;
            if ($age >= $majeur) {
                return "$prenom est majeur.";
            } else {
                return "$prenom est mineur.";
            }
        }

        $prenom = htmlspecialchars($_POST['name']); // Sécurisation des données
        $age = intval($_POST['age']); // Conversion en entier

        $resultat = age_verif($age, $prenom);
        echo "<p><strong>Résultat :</strong> $resultat</p>";
    }
    ?>
</body>

</html>
