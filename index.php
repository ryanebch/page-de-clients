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
    <link rel="stylesheet" href="./css/style.css">
  <title>PHP CRUD application</title>
</head>

<body>
<nav class="navbar_f navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Nouvelle Barre</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
  
</nav>
<nav class="navbar navbar-expand-lg navbar-dark fs-6 mb-5 fixed-top" style="background-color: #72A0C1">
  <div class="container-fluid">
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Page de client</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produits.php">Page de produits</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <div class="container">
  <?php
  if (isset($_GET['msg'])){
    $msg= $_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>
   <a href="add_new.php" class= "btn btn-dark mb-3" style ="background-color:#545AA7;border-color= #545AA7">Ajouter un nouvel utilisateur</a>
   <form action="" method="get" class="mb-3">
  <input type="text" name="search" class="form-control mb-3" placeholder="Rechercher un utilisateur" />
</form>      
<table class="table table-hover text-center">
      <thead class="table-dark">
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
            <th><?php echo $row['id']?></th>
            <th><?php echo $row['prénom']?></th>
            <th><?php echo $row['nom']?></th>
            <th><?php echo $row['email']?></th>
            <th><?php echo $row['tel']?></th>
            <th><?php echo $row['sexe']?></th>

            <td>
            <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
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
              <img 
              style ="
              height: 50px;
              width: 50px; 
              object-fit:cover;
              border-radius: 100%;"src="<?php echo $row["image"]?>"
              alt="Image not found">
              <div class="ms-2">
                <span class="h6">
                  <?php echo $row["prénom"]?>
                </span>
                <br>
                <small class="fw-medium text-body-secondary"></small>
                ID: <?php echo $row["id"]?>
              </div>
        </td>
        <td><?php echo $row["prénom"]?></td>
        <td><?php echo $row["email"]?></td>
        <td><?php echo $row["tel"]?></td>
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

  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous">
  const navLinks = document.querySelectorAll('.nav-link');
  const currentLocation = window.location.href;

  navLinks.forEach(link => {
    if (link.href === currentLocation) {
      link.classList.add('active');
    }
  });

  </script>

</body>

</html>
<?php
mysqli_close($conn);
?>