<?php include 'menu.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link rel="stylesheet" href="liste.css">
</head>
<body>
<?php

$conn = new mysqli('localhost', 'root', '', 'admin');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$sql = "SELECT id, Last_Name, First_Name, Birthdate, Note FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Liste des étudiants</h1>";
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Note</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['Last_Name'] . "</td>
                <td>" . $row['First_Name'] . "</td>
                <td>" . $row['Birthdate'] . "</td>
                <td>" . $row['Note'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<h1>Aucun étudiant trouvé.</h1>";
}

$conn->close();
?>
</body>
</html>
