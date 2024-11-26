<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification d'âge</title>
</head>

<body>
    <h1>Vérification de palindrome</h1>
    <br>
    <form method="POST" action="">
        <!-- Champ pour entrer un mot -->
        <label for="word">Mot à vérifier : </label>
        <input type="text" name="word" id="word" required>
        <br><br>
        <!-- Bouton de soumission -->
        <button type="submit" name="submit">Afficher</button>
    </form>

    <br>
    <?php
    // Tableau de produits avec leur stock
    $products = [
        [
            "name" => "Phone",
            "price" => 15,
            "stock" => 20,
        ],
        [
            "name" => "Tablet",
            "price" => 25,
            "stock" => 10,
        ],
    ];

    // Calcul du stock total
    $total_stock = 0;
    foreach ($products as $product) {
        $total_stock += $product['stock']; // Ajout du stock du produit courant
        echo "Le stock total est de : " . $total_stock . "<br>"; // Affichage
    }

    /**
     * Vérifie si une chaîne est un palindrome
     * @param string $string : Mot à vérifier
     * @return int : 1 si c'est un palindrome, 0 sinon
     */
    function Palindrome($string)
    {
        // Vérifie si la chaîne est identique à sa version inversée
        if (strrev($string) == $string) {
            return 1; // Retourne 1 si palindrome
        } else {
            return 0; // Retourne 0 sinon
        }
    }

    // Vérification si un mot est soumis
    if (isset($_POST['word'])) {
        $word = $_POST['word']; // Récupération du mot saisi
        // Appel de la fonction Palindrome et affichage du résultat
        if (Palindrome($word)) {
            echo "Palindrome"; // Si le mot est un palindrome
        } else {
            echo "N'est pas un palindrome"; // Sinon
        }
    }
    ?>
</body>

</html>