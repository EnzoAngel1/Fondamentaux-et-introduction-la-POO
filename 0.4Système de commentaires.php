<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
</head>

<body>
    <h1>Ajouter un commentaire</h1>

    <!-- Formulaire pour saisir un commentaire -->
    <form method="POST" action="">
        <label for="username">Votre nom :</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="comment">Votre commentaire :</label><br>
        <textarea name="comment" id="comment" rows="5" cols="30" required></textarea><br><br>

        <button type="submit" name="submit">Envoyer</button>
    </form>

    <h2>Liste des commentaires</h2>

    <?php
    // Chemin du fichier JSON pour stocker les commentaires
    $file = "comments.json";

    // Initialiser un tableau pour les commentaires
    $comments = [];

    // Vérifier si le fichier JSON existe et contient des données
    if (file_exists($file)) {
        $jsonData = file_get_contents($file); // Lire le contenu du fichier
        $comments = json_decode($jsonData, true); // Décoder le JSON en tableau associatif
    }

    // Vérifier si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        $username = htmlspecialchars(trim($_POST['username'])); // Nettoyer le nom
        $comment = htmlspecialchars(trim($_POST['comment']));   // Nettoyer le commentaire

        // Ajouter le nouveau commentaire au tableau
        $newComment = [
            "username" => $username,
            "comment" => $comment,
        ];
        $comments[] = $newComment; // Ajouter le commentaire au tableau

        // Sauvegarder les commentaires dans le fichier JSON
        file_put_contents($file, json_encode($comments, JSON_PRETTY_PRINT));
    }

    // Afficher les commentaires
    if (!empty($comments)) {
        echo "<ul>";
        foreach ($comments as $c) {
            echo "<li><strong>" . htmlspecialchars($c['username']);
            echo htmlspecialchars($c['comment']) . "</li><br>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun commentaire pour l'instant.</p>";
    }
    ?>
</body>

</html>
