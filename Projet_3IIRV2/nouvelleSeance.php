<?php 
include('validation.php');

if (isset($_POST['tempsDebut']) && isset($_POST['tempsFin']) ) {
    $seance = new Seance('','','','','','','','','','');
    $seance->t_debut = $_POST['tempsDebut'];
    $seance->t_fin = $_POST['tempsFin'];
    if (isset($_POST['nom']) && isset($_POST['prenom'])) {
      if($_POST['nom']!="" && $_POST['prenom']){
        $pers = new Personne('','','','','','');
        $pers->nom = $_POST['nom'];
        $pers->prenom = $_POST['prenom'];
        $PersID = $seance::fetchPersonID($pers,$connection->conn);
        $seance->idPersonne = $PersID['id_personne'];
      }
      else{
        $seance->idPersonne = "0";
      }
     }
     if (isset($_POST['salle'])) {
      if($_POST['salle']!=""){
        $SalleFields = $seance::fetchSalleFields($_POST['salle'], $connection->conn);
        $seance->idSalle = $SalleFields['id_Salle'];
      }  
      else{
        $seance->idSalle = "0";
      }
    }
     
    if (isset($_POST['niveau']) && isset($_POST['niveau']) && isset($_POST['groupe'])) {
        $groupName = $_POST['niveau'].$_POST['filliere'].$_POST['groupe'];
        $groupFields = $seance::fetchGroupFields($groupName,$connection->conn);
        $seance->idGroupe = $groupFields['id_Groupe'];
    }
    else{
        $seance->idGroupe = "0";
    }
    $seance->idCampus = $_POST['campus'];
    $seance->idMatiere  = $_POST['matiere'];
    $seance->idJour  = $_POST['jour'];
    $seance->AddSeance($connection->conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Salles/Profile</title>
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
          <label for="exampleInputText1">Nom enseignant</label>
          <input type="text" name="nom" class="form-control col-xs-2 " id="exampleInputText1" aria-describedby="emailHelp" placeholder="Nom " >
        </div>
        <div class="form-group col-xs-2" >
          <label for="exampleInputText1">prenom enseignant</label>
          <input type="text" name="prenom" class="form-control col-xs-2 " id="exampleInputText1" aria-describedby="emailHelp" placeholder="Prenom" >
        </div>
        <label for="filliere">Filliere</label>
        <select id="filliere" name="filliere" class="form-select" aria-label="Default select example">
            <option selected value="n">...  </option>
            <option value="IFA">IFA</option>
            <option value="IIR">IIR</option>
            <option value="GI">GI</option>
            <option value="IAII">IAII</option>
            <option value="GC">GC</option>
        </select> 
        <label for="niveau">Niveau</label>
        <select id="niveau" name="niveau" class="form-select" aria-label="Default select example">
            <option selected value="no">...  </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> 
        <label for="groupe">Groupe</label>
        <select id="groupe" name="groupe" class="form-select" aria-label="Default select example">
            <option selected value="e">...  </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        
        <div class="cs-form">
         <label for="time">Temps Debut</label>
           <input id="time" name="tempsDebut" type="time" class="form-control" value="" />
         </div>
        <div class="cs-form">
         <label for="time2">Temps Fin</label>
           <input id="time2" name="tempsFin" type="time" class="form-control" value="" />
         </div>
         
        <div class="form-group col-xs-2" >
          <label for="exampleInputText1">Salle</label>
          <input type="text" name="salle" class="form-control col-xs-2 " id="exampleInputText1" aria-describedby="emailHelp" placeholder="Salle" >
        </div><br>
        <label for="campus">Campus</label>
        <select id="campus" name="campus" class="form-select" aria-label="Default select example">
            <option selected>...  </option>
            <option value="1">Emsi Gueliz</option>
            <option value="2">EMSI Centre</option>
        </select>
        <label for="matiere">matiere</label>
        <select id="matiere" name="matiere" class="form-select" aria-label="Default select example">
            <option selected value="11">...  </option>
            <option value="1">C.S.I</option>
            <option value="2">BD Pl/SQL</option>
            <option value="3">P.O.O</option>
            <option value="4">T.E.C</option>
            <option value="5">ENG</option>
            <option value="6">S.E</option>
            <option value="7">L.S</option>
            <option value="8">C.A</option>
            <option value="9">G.E</option>
            <option value="10">R.I</option>
        </select>
        <label for="jour">jour</label>
        <select id="jour" name="jour" class="form-select" aria-label="Default select example">
            <option selected>...  </option>
            <option value="1">Lundi</option>
            <option value="2">Mardi</option>
            <option value="3">Mercredi</option>
            <option value="4">Jeudi</option>
            <option value="5">Vendredi</option>
            <option value="6">Samedi</option>
        </select><br>
        
        <span id="error"></span>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>