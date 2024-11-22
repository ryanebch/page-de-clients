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
  <link rel="stylesheet" href="./css/style.css">
  <title>PHP CRUD application</title>
</head>

<body>

<header class="header fixed-top">

    <div class="h-bar">

    <div class="row align-items-center justify-content-between">
<div><img src="./images/tooth.png" alt="logo">

      <a href="#home" class="logo">Cabinet<span>Plus</span></a></div>
      
      <nav class="nav">
        <a href="#home">Accueil</a>
        <a href="#">Patients</a>
        <a href="#">Prothèses</a>
        <a href="#">Calendrier</a>
        <div class="dropdown">
          <a href="#suivre" class="suivre" aria-haspopup="true">Suivre</a>
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
  
  <div class="container">
    <?php
  if (isset($_GET['msg'])){
    $msg= $_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.$msg.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
  }
  ?>
    <a href="add_new.php" class="btn btn-dark mb-3" style="background-color:#545AA7;border-color= #545AA7">Ajouter un
      nouvel utilisateur</a>
    <form action="" method="get" class="mb-3">
      <input type="text" name="search" class="form-control mb-3" placeholder="Rechercher un utilisateur" />
    </form>
    <div class="table-wrapper">
    <table class="table table-hover text-center">
      <thead class="table-f">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Prénom</th>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Téléphone</th>
          <th scope="col">Sexe</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
</div>
        <?php
        include "db_conn.php";

        $sql="SELECT * FROM `crud`";
        
        $search_term = isset($_GET['search']) ? $_GET['search'] : '';
        
        if (!empty($search_term)) {
          $sql = "SELECT * FROM `crud` WHERE `prénom` LIKE '%$search_term%' OR `nom` LIKE '%$search_term%' OR `email` LIKE '%$search_term%'";
        } else {
        $sql = "SELECT * FROM `crud`";
      }
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
         ?>
        <tr>
          <th>
            <?php echo $row['id']?>
          </th>
          <th>
            <?php echo $row['prénom']?>
          </th>
          <th>
            <?php echo $row['nom']?>
          </th>
          <th>
            <?php echo $row['email']?>
          </th>
          <th>
            <?php echo $row['tel']?>
          </th>
          <th>
            <?php echo $row['sexe']?>
          </th>

          <td>
            <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark"><i
                class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
            <a href="delete.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
          </td>
        </tr>
        <?php
        }
        
        ?>
      </tbody>
      <?php
      if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
          ?>
      <tr>
        <td class="d-flex align-items-center">
          <img style="
              height: 50px;
              width: 50px; 
              object-fit:cover;
              border-radius: 100%;" src="<?php echo $row[" image"]?>"
          alt="Image not found">
          <div class="ms-2">
            <span class="h6">
              <?php echo $row["prénom"]?>
            </span>
            <br>
            <small class="fw-medium text-body-secondary"></small>
            ID:
            <?php echo $row["id"]?>
          </div>
        </td>
        <td>
          <?php echo $row["prénom"]?>
        </td>
        <td>
          <?php echo $row["email"]?>
        </td>
        <td>
          <?php echo $row["tel"]?>
        </td>
      </tr>
      <?php
        }
      } else {
        echo "Pas de résultats";
      }
      ?>
      <?php
  $search = isset($_GET['search']) ? $_GET['search'] : '';
  if (!empty($search)) {
      $sql = "SELECT * FROM `crud` WHERE `prénom` LIKE '%$search%' OR `nom` LIKE '%$search%' OR `email` LIKE '%$search%'";
  } else {
      $sql = "SELECT * FROM `crud`";
  }?>
    </table>

  </div>
<main>
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>

</body>
<?php
mysqli_close($conn);
?>
</html>
