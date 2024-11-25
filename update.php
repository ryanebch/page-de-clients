<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $id = $_POST['id'];
    $prénom = $_POST['prénom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $sexe = $_POST['sexe'];
    $description = $_POST['description'];  // Ensure the description is being fetched from the form

    // Use prepared statement for security
    $stmt = $conn->prepare("UPDATE crud SET prénom=?, nom=?, email=?, tel=?, sexe=?, description=? WHERE id=?");
    $stmt->bind_param("sssssssi", $prénom, $nom, $email, $tel, $sexe, $description, $id);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Modification réussie");
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($conn);
?>
