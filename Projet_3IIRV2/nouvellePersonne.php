<?php 
include('session.php');
include('db.php');
include('personne.php');
var_dump($_POST);
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {
    $personne = new Personne('','','','','','','');
    $personne->nom = $_POST['nom'];
    $personne->prenom = $_POST['prenom'];
    $personne->email = $_POST['email'];
    $personne->password = $_POST['password'];
    $personne->idType = '1';
    $personne->addPersonne($connection->conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Salles/Ajouter une personne</title>
    <link rel="icon" type="image/x-icon" href="Assets/98a7996e0929082e2afe0b90afe429e7_400x400.ico">
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
              <a class="nav-link" href="#">Nom&Prenom </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Emploi</a>
                <a class="dropdown-item" href=<?= $href?>> <?= $msg?> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">logout</a>
              </div>
            </li>
          </ul>
        </div>
    </nav>

      
    <form method="post">
        <div class="form-group col-xs-2" >
          <label for="exampleInputText1">Nom </label>
          <input type="text" name="nom" class="form-control col-xs-2 " id="exampleInputText1" aria-describedby="emailHelp" placeholder="Nom " required >
        </div>
        <div class="form-group col-xs-2" >
          <label for="exampleInputText1">prenom </label>
          <input type="text" name="prenom" class="form-control col-xs-2 " id="exampleInputText1" aria-describedby="emailHelp" placeholder="Prenom" required>
        </div>
        <div class="form-group col-xs-2" >
          <label for="exampleInputText1">email</label>
          <input type="text" name="email" class="form-control col-xs-2 " id="exampleInputText1" aria-describedby="emailHelp" placeholder="email" required>
        </div>
        <div class="form-group col-xs-2" >
          <label for="exampleInputText1">mot de passe</label>
          <input type="text" name="password" class="form-control col-xs-2 " id="exampleInputText1" aria-describedby="emailHelp"  required>
        </div>
        <span id="error"></span>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>