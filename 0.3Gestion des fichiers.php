<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification d'âge</title>
</head>

<body>
    <h1>Ajouter un utilisateur dans un fichier txt</h1>
    <br>
    <form method="POST" action="">
        <!-- Champ pour le prénom -->
        <label for="name">Prénom de la personne : </label>
        <input type="text" name="name" id="name" required>
        <br><br>

        <!-- Champ pour l'âge -->
        <label for="age">Âge de la personne : </label>
        <input type="number" name="age" id="age" required>
        <br><br>

        <!-- Champ pour l'email -->
        <label for="email">Email de la personne : </label>
        <input type="email" name="email" id="email" required>
        <br><br>

        <!-- Bouton de soumission -->
        <button type="submit" name="submit">Ajouter</button>
    </form>

    <br>

    <?php
    if (isset($_POST['submit'])) {
        // Récupération et sécurisation des données du formulaire
        $prenom = $_POST['name']; 
        $age = intval($_POST['age']); // Conversion en entier
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

        // Validation des données
        if (empty($prenom) || $age <= 0 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:red;'>Veuillez entrer des informations valides.</p>";
        } else {
            // Affichage des informations saisies
            echo "<p><strong>Bienvenue :</strong> $prenom </p>";
            echo "<p><strong>Âge :</strong> $age ans</p>";
            echo "<p><strong>Email :</strong> $email </p>";

            // Enregistrement dans le fichier
            $file = "liste.txt";
            $data = "$prenom, $age ans, $email;\n";
            file_put_contents($file, $data, FILE_APPEND);

            echo "<p>Les informations ont été enregistrées avec succès dans le fichier <strong>$file</strong>.</p>";

            // Lecture et affichage du contenu du fichier
            if (file_exists($file)) {
                echo "<h2>Contenu du fichier :</h2>";
                $content = file_get_contents($file); // Lit le contenu du fichier
                $elements = explode(";", $content);

                echo "<table border='1'>";
                echo "<thead><tr>";
                echo "<th>Nom</th>";
                echo "<th>Âge</th>";
                echo "<th>Email</th>";
                echo "</tr></thead>";
                echo "<tbody>";

                foreach ($elements as $value) {
                    $row = explode(",", $value);
                    if (count($row) >= 3) {
                        echo "<tr>";
                        foreach ($row as $cell) {
                            echo "<td>" . $cell . "</td>";
                        }
                        echo "</tr>";
                    }
                }

                echo "</tbody></table>";
            } else {
                echo "<p>Le fichier <strong>$file</strong> n'existe pas encore.</p>";
            }
        }
    }
    ?>
</body>

</html>