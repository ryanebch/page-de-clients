<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ensure all form data is being received
    if (isset($_POST['id'], $_POST['prénom'], $_POST['nom'], $_POST['email'], $_POST['tel'], $_POST['sexe'], $_POST['description'])) {
        // Retrieve the form data
        $id = $_POST['id'];
        $prénom = $_POST['prénom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $sexe = $_POST['sexe'];
        $description = $_POST['description'];

        // Prepare the SQL query with placeholders for data
        $stmt = $conn->prepare("UPDATE crud SET prénom=?, nom=?, email=?, tel=?, sexe=?, description=? WHERE id=?");
        
        if ($stmt === false) {
            die('MySQL prepare failed: ' . $conn->error); // Show any prepare statement errors
        }

        // Bind the parameters to the query
        $stmt->bind_param("ssssssi", $prénom, $nom, $email, $tel, $sexe, $description, $id);

        // Execute the query and check for success
        if ($stmt->execute()) {
            header("Location: index.php?msg=Modification réussie");
            exit; // Exit after redirect
        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Missing form data!";
    }
} else {
    echo "Invalid request method!";
}

// Close the database connection
mysqli_close($conn);
?>
