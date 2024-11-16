<?php
include "db_conn.php";

if(isset($_POST['submit'])){
  $prénom = $_POST['prénom'];
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $sexe = $_POST['sexe'];

  $sql ="INSERT INTO `crud`(`id`, `prénom`, `nom`, `email`, `tel`, `sexe`) VALUES (NULL,'$prénom','$nom','$email','$tel','$sexe')";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Nouvel enregistrement créé avec succés");
 } else {
    echo "Échoué: " . mysqli_error($conn);
 }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #6699CC">
    PHP Complete CRUD application
  </nav>
  <div class="container">
    <div class="text-center mb-4">
      <h3>Ajouter un nouvel utilisateur</h3>
      <p class="text-muted">Saisissez le formulaire en dessous pour ajouter un nouvel utilisateur </p>
    </div>
    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row">
          <div class="col">
            <label class="form-label">Prénom:</label>
            <input type="text" class="form-control" name="prénom" placeholder="Prénom">
          </div>

          <div class="col">
            <label class="form-label">Nom:</label>
            <input type="text" class="form-control" name="nom" placeholder="Nom">
          </div>

          <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
          </div>

          <div class="mb-3">
            <label class="form-label">Téléphone:</label>
            <input type="tel" class="form-control" pattern="^0[1-7][0-9]{7,8}$" name="tel" placeholder="+213">
          </div>

          <div class="form-group mb-3">
            <label>Sexe:</label>
            &nbsp;
            <input type="radio" class="form-check-input" name="sexe" id="homme" value="homme">
            <label for="homme" class="form-input-label">Homme</label>
            &nbsp;
            <input type="radio" class="form-check-input" name="sexe" id="femme" value="femme">
            <label for="femme" class="form-input-label">Femme</label>
          </div>
          <div>
            <button type="submit" class="btn btn-success" name="submit">Sauvegarder</button>

            <a href="index.php" class="btn btn-danger">Annuler</a>
          </div>

      </form>
    </div>
  </div>

  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

</body>

</html>