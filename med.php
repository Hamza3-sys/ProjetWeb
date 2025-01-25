<?php
?>
<?php include 'menu.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Étudiants</title>
    <link rel="stylesheet" href="modification.css">
</head>
<body>
<div>
    <h1>Ajouter un étudiant</h1>
    <form action="ajout.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="Last_Name" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="First_Name" required>

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" id="date_naissance" name="Birthdate" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="Email" required>

        <label for="classe">Classe :</label>
        <input type="text" id="classe" name="Class" required>

        <label for="note_moyenne">Note moyenne :</label>
        <input type="number" step="0.5" id="note_moyenne" name="Note" required>

        <button type="submit">Ajouter</button>
    </form>
</div>

<div>
    <h1>Supprimer un étudiant</h1>
    <form action="suppression.php" method="POST">
        <label for="id">ID de l'étudiant :</label>
        <input type="number" id="id" name="id" required>

        <label for="Nom">Nom de l'étudiant :</label>
        <input type="text" id="Last_Name" name="Last_Name" required>

        <label for="Prenom">Prenom de l'étudiant :</label>
        <input type="text" id="First_Name" name="First_Name" required>

        <button type="submit">Supprimer</button>
    </form>
</div>

<div>
    <h1>Modifier la note d'un étudiant</h1>
    <form action="modification.php" method="POST">
        <label for="id">ID de l'étudiant :</label>
        <input type="number" id="id" name="id" required>

        <label for="note">Nouvelle note :</label>
        <input type="number" id="note" name="note" step="0.5" min="0" max="20" required>

        <button type="submit">Modifier</button>
    </form>
</div>
</body>
</html>
