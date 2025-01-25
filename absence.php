<?php

$conn = new mysqli('localhost', 'root', '', 'admin');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$student_id = $_POST['student_id'];
$status = $_POST['status'];
$date = $_POST['date'];

if (empty($student_id) || empty($status) || empty($date)) {
    echo "Tous les champs sont obligatoires.";
    exit;
}

$sql = "INSERT INTO absences (student_id, date, status) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $student_id, $date, $status);

if ($stmt->execute()) {
    echo "La présence/absence a été enregistrée avec succès.";
} else {
    echo "Erreur lors de l'enregistrement : " . $conn->error;
}

$stmt->close();
$conn->close();
?>
