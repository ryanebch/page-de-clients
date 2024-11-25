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
<div id="menu-btn" class="fas fa-bars"></div>

<header class="header fixed-top">
    <div class="h-bar">
        <div class="row align-items-center justify-content-between">
            <div>
                <img src="./images/tooth.png" alt="logo">
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
        </div> <!-- End of row -->
    </div> <!-- End of h-bar -->
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
  <td><?php echo $row['id']; ?></td>
  <td><?php echo $row['prénom']; ?></td>
  <td><?php echo $row['nom']; ?></td>
  <td><?php echo $row['email']; ?></td>
  <td><?php echo $row['tel']; ?></td>
  <td><?php echo $row['sexe']; ?></td>
  <td>
    <!-- Edit Button -->
    <a href="#" class="link-dark edit-btn"
       data-id="<?php echo $row['id']; ?>"
       data-prénom="<?php echo $row['prénom']; ?>"
       data-nom="<?php echo $row['nom']; ?>"
       data-email="<?php echo $row['email']; ?>"
       data-tel="<?php echo $row['tel']; ?>"
       data-sexe="<?php echo $row['sexe']; ?>"
       data-description=""> <!-- Correctly pass the description here -->
      <i class="fa-solid fa-pen-to-square fs-5 me-3"></i>
    </a>
    <!-- View Button -->
    <a href="#" class="link-dark view-btn"
       data-description="<?php echo htmlspecialchars($row['description']); ?>"> <!-- Pass description for viewing -->
      <i class="fa-solid fa-eye fs-5"></i>
    </a>
  </td>
</tr>

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


 <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Increased modal size -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modifier l'utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Edit form -->
        <form id="editForm" method="post" action="edit_handler.php">
          <input type="hidden" name="id" id="edit-id">

          <!-- Prénom -->
          <div class="mb-3">
            <label for="edit-prénom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="edit-prénom" name="prénom" placeholder="Ex: Jean" required>
          </div>

          <!-- Nom -->
          <div class="mb-3">
            <label for="edit-nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="edit-nom" name="nom" placeholder="Ex: Dupont" required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="edit-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="edit-email" name="email" placeholder="Ex: jean.dupont@email.com" required>
          </div>

          <!-- Téléphone -->
          <div class="mb-3">
            <label for="edit-tel" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="edit-tel" name="tel" placeholder="Ex: 0123456789" pattern="[0-9]{10}" required>
          </div>

          <!-- Sexe -->
          <div class="mb-3">
            <label for="edit-sexe" class="form-label">Sexe</label>
            <select class="form-select" id="edit-sexe" name="sexe">
              <option value="homme">Homme</option>
              <option value="femme">Femme</option>
            </select>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="edit-description" class="form-label">Description</label>
            <textarea class="form-control" id="edit-description" name="description" rows="4" placeholder="Ajoutez une description"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- View Modal -->
<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">Description de l'utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-secondary">Voici la description de l'utilisateur. Vous pouvez la lire et décider de l'action à prendre.</p>
        <div class="mb-3">
          <label for="view-description" class="form-label">Description</label>
          <textarea class="form-control" id="view-description" rows="6" readonly style="resize: none;"></textarea>
        </div>
      </div>
    </div>
  </div>
</div>

<main>
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>

<script src="index.js"></script>

</body>
<?php
mysqli_close($conn);
?>
</html>