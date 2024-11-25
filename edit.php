<?php
include "db_conn.php";

$id = $_GET['id'];

if(isset($_POST['submit'])){
  $prénom = $_POST['prénom'];
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $sexe = $_POST['sexe'];

  $sql ="UPDATE `crud` SET `prénom`='$prénom', `nom`='$nom', `email`='$email', `tel`='$tel', `sexe`='$sexe' WHERE id=$id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Données mises à jour avec succés");
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

  <!-- bootstrap cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
  <!-- custom css file link  -->
  <link rel="stylesheet" href="./css/style4.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD application</title>
</head>

<body>
<header class="header fixed-top">

<div class="h-bar">
  <div class="row align-items-center justify-content-between">
    <div><img src="./images/tooth.png" alt="logo">
      <a href="#home" class="logo">Cabinet<span>Plus</span></a>
</div>
    <nav class="nav">
                <a href="#home">Accueil</a>
                <a href="#">Patients</a>
                <a href="#">Prothèses</a>
                <a href="#">Calendrier</a>
                <div class="dropdown">
                    <a href="#suivre" class="suivre" >Suivre</a>
                    <ul class="suivre-menu">
                        <li><a href="#suivi-produits">Suivi des Produits</a></li>
                        <li><a href="#suivi-achats">Suivi des Achats</a></li>
                        <li><a href="#suivi-protheses">Suivi des Prothèses</a></li>
                    </ul>
                </div>
            </nav>
    <button class="link-btn">Connexion</button>
    <div id="menu-btn" class="fas fa-bars">
    </div>
  </div>
</header>


<main>
  <div class="side-nav">
    <div class="user">
      <img src="images/midune.jpg" class="user-img">
      <div>
        <h2>midune</h2>
        <p>midune@gmail.com</p>
        </div>
    </div>
    <ul>
      <a href="index.php"><li><img src="images/dashboard.png">
        <p>Dashboard</p>
      </li></a>
      <a href="#"><li><img src="images/members.png">
        <p>Page de clients</p>
      </li></a>
      <a href="./produit/index2.php"><li><img src="images/rewards.png">
        <p>Pages de produits</p>
      </li></a>
      <a href="#"><li><img src="images/projects.png">
        <p>Bon d'achat</p>
      </li></a>
      <a href="#"><li><img src="images/setting.png">
        <p>Fournisseur</p>
      </li></a>
    </ul>

    <ul>
      <li><img src="images/logout.png">
        <p>Deconnexion</p>
      </li>
    </ul>
  </div>
</div>

  <div class="container">
    <div class="text-center">
      <h3>Modifier les informations de l'utilisateur</h3>
      <p class="text-muted">Cliquez sur "Mettre à jour" après avoir modifié les informations.</p>
    </div>

    <?php
    $sql = "SELECT * FROM `crud` WHERE id =$id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

  <form action="" method="post">
    <!-- Row for first and last name -->
    <div class="row">
      <div class="col">
        <label for="prénom" class="form-label">Prénom:</label>
        <input type="text" id="prénom" class="form-control" name="prénom" value="<?php echo  $row['prénom'] ?>" required>
      </div>
      <div class="col">
        <label for="nom" class="form-label">Nom:</label>
        <input type="text" id="nom" class="form-control" name="nom" value="<?php echo  $row['nom'] ?>" required>
      </div>
    </div>

    <!-- Email field -->
    <div class=">
      <label for="email" class="form-label">Email:</label>
      <input type="email" id="email" class="form-control" name="email" value="<?php echo  $row['email'] ?>" required>
    </div>

    <!-- Phone field -->
    <div class="">
      <label for="tel" class="form-label">Téléphone:</label>
      <input type="tel" id="tel" class="form-control" pattern="^0[1-7][0-9]{7,8}$" name="tel" value="<?php echo  $row['tel'] ?>" required>
    </div>

    <!-- Gender selection -->
    <div class="form-group">
      <label class="form-label">Sexe:</label>
      <div>
        <input type="radio" class="form-check-input" name="sexe" id="homme" value="homme" <?php echo ($row['sexe'] == 'homme') ? "checked" : "" ?>>
        <label for="homme" class="form-input-label">Homme</label>

        <input type="radio" class="form-check-input" name="sexe" id="femme" value="femme" <?php echo ($row['sexe'] == 'femme') ? "checked" : "" ?>>
        <label for="femme" class="form-input-label">Femme</label>
      </div>
    </div>

    <!-- Buttons -->
    <div>
      <button type="submit" class="btn btn-success" name="submit">Mettre à jour</button>
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