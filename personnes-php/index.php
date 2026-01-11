<?php
$fichier = "personnes.json";

$personnes = [];

if (file_exists($fichier)) {
    $json = file_get_contents($fichier);
    $personnes = json_decode($json, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];

    $personne = [
        "nom" => $nom,
        "prenom" => $prenom,
        "age" => $age
    ];

    $personnes[] = $personne;

    file_put_contents($fichier, json_encode($personnes, JSON_PRETTY_PRINT));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP XAMPP - Personnes</title>
</head>
<body>

<h2>Ajouter une personne</h2>

<form method="post">
    Nom : <input type="text" name="nom" required><br><br>
    Prénom : <input type="text" name="prenom" required><br><br>
    Âge : <input type="number" name="age" required><br><br>
    <input type="submit" value="Ajouter">
</form>

<h2>Liste des personnes</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Âge</th>
    </tr>

    <?php foreach ($personnes as $p) { ?>
        <tr>
            <td><?php echo $p['nom']; ?></td>
            <td><?php echo $p['prenom']; ?></td>
            <td><?php echo $p['age']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>