<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['Last_Name'];
    $prenom = $_POST['First_Name'];
    $date_naissance = $_POST['Birthdate'];
    $email = $_POST['Email'];
    $classe = $_POST['Class'];
    $note_moyenne = $_POST['Note'];

    if (empty($nom) || empty($prenom) || empty($date_naissance) || empty($email) || empty($classe) || empty($note_moyenne)) {
        die("All fields must be filled");
    }

    $conn = new mysqli('localhost', 'root', '', 'admin');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO students (Last_Name, First_Name, Birthdate, Email, Class, Note) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssd", $nom, $prenom, $date_naissance, $email, $classe, $note_moyenne);

    if ($stmt->execute()) {
        echo "Student added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
