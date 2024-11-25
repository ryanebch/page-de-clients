<?php
include "db_conn.php";

$id = $_GET['id'];

// Fetch the client details
$sql = "SELECT * FROM `crud` WHERE id =$id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
  <title>View Client Description</title>
</head>
<body>
  <div class="container mt-5">
    <h3>Détails de l'utilisateur</h3>
    <p><strong>Prénom:</strong> <?php echo $row['prénom']; ?></p>
    <p><strong>Nom:</strong> <?php echo $row['nom']; ?></p>
    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
    <p><strong>Téléphone:</strong> <?php echo $row['tel']; ?></p>
    <p><strong>Sexe:</strong> <?php echo $row['sexe']; ?></p>

    <h4>Description:</h4>
    <pre><?php echo nl2br($row['description']); ?></pre> <!-- Display the entire description -->
  </div>
</body>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>
