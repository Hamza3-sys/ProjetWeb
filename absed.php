<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absences</title>
    <link rel="stylesheet" href="abs.css">
</head>
<body>
<h1>Marquer la présence/absence</h1>
<form action="absence.php" method="POST">
    <label for="student_id">ID de l'étudiant :</label>
    <input type="number" id="student_id" name="student_id" required>

    <label for="status">Statut :</label>
    <select id="status" name="status" required>
        <option value="présent">Présent</option>
        <option value="absent">Absent</option>
    </select>

    <label for="date">Date :</label>
    <input type="date" id="date" name="date" required>

    <button type="submit">Enregistrer</button>
</form>
</body>
</html>
