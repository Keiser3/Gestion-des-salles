<?php 
 require_once('validation.php');
 if(!isset($_SESSION['name'])){
   header('Location: login.php');
 }
 if($_SESSION["type"] == "enseignant"){
   $href = "'emploi.php'";
   $msg = "Emploi";
   $href1 = "'Reservation.php'";
   $msg1 = "Reserver une salle";
 }
 else{
  $href = "'nouvelleSeance.php'";
  $msg = "Ajouter une seance";
  $href1 = "'nouvellePersonne.php'";
  $msg1 = "'Ajouter une personne'"
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Salles/Profile</title>
    <link rel="icon" href="Assets/98a7996e0929082e2afe0b90afe429e7_400x400.ico" type="image/x-icon" >
    <link rel="stylesheet" href="Css/indexStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="topnav">
        <a class="navbar-brand" href="#"> <img id="logo" src="Assets/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><?=  $_SESSION['name'] ?> </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href=<?=$href ?>> <?=$msg ?> </a>
                <a class="dropdown-item" href=<?= $href1?>> <?= $msg1?> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">logout</a>
              </div>
            </li>
          </ul>
        </div>
    </nav>

      
    <div id="card" class="card" style="width: 18rem;">
      <img class="card-img-top" src="Assets/profile.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?=  $_SESSION['name'] ?></h5>
        <p class="card-text"><?= $_SESSION['type'] ?></p>
        <h6 class="card-title">Matricule: <?= $_SESSION["id"] ?></h6>
      </div>
    </div>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>