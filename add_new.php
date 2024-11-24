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
<?php if (isset($_GET['msg'])): ?>
    <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($_GET['msg']); ?>
        <!-- Close button -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- bootstrap cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
  <!-- custom css file link  -->
  <link rel="stylesheet" href="./css/style3.css">
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
  
<section>
<div class="form-container">
    <h2>Ajouter un nouvel utilisateur</h2>
    <p>Saisissez le formulaire en dessous pour ajouter un nouvel utilisateur </p>

    <form id="userForm" method="post" action="">
    <div class="form-group">
        <label for="prénom">Prénom:</label>
        <input type="text" id="prénom "name="prénom" placeholder="Prénom" required>
      </div>
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" placeholder="Nom"required>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email "name="email" placeholder="name@example.com" required>
      </div>
      <div class="form-group">
        <label for="telephone">Numéro de Téléphone:</label>
        <input type="tel" id="telephone" name="tel" pattern="^0[1-7][0-9]{7,8}$" placeholder="+213" required>
      </div>
      <div class="form-group">
        <label>Sexe:</label>
        <div class="radio-group">
          <label>
            <input type="radio" name="sexe" id="homme" value="homme" required>
            Masculin
          </label>
          <label>
            <input type="radio" name="sexe" id="femme" value="femme">
            Féminin
          </label>
        </div>
      </div>
      <div class="button-group">
        <button type="submit" name="submit" class="btn sauvegarder">Sauvegarder</button>
        <button class="btn annuler">Annuler</button>
      </div>
    </form>
  </div>
</section>
</body>
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous">
    <script src="index.js"></script>


</html>