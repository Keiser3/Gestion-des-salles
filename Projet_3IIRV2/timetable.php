<?php 
include('session.php');
include('validation.php');
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
   $msg1 = "'Ajouter une personne'";
  }
$p = new Seance('','','','','','','','','','');
$table=""; 
if (isset($_POST['nom'])) {
    if (preg_match('~[0-9]+~', $_POST['nom'])) {
        $IsGroup = TRUE;
    }else {
        $IsGroup = FALSE;
    }
$c = $p::getTimetableByGroupOrTeacher($connection->conn,$_POST['nom'],$IsGroup);
for ($i=0 ; $i < sizeof($c) ; $i++ ) { 
     
    if ($c[$i]['Course'] == "none") {
       
        $c[$i]['Course'] = "";
        $c[$i]['Room'] = "";
        $c[$i]['Campus'] ="";
    }
}
$Days = array("Lundi", "Mardi", "Mercredi", "Jeudi","Vendredi","Samedi");
$cpt = 0;
$table="<table>";
for ($i=0; $i < 6; $i++) { 
    if ($i==0) {
        $table .= " <tr>
        <th>-----</th>
        <th>8:30-10:00</th>
        <th>10:15-11:45</th>
        <th>14:30-16:00</th>
        <th>16:15-17:45</th>
       </tr>";
     }
       
            $table .=  " <tr><th>".  $Days[$i]  ."</th>";
            for ($k=$cpt; $k < $cpt+4 ; $k++) { 
                $table .= "<td>".$c[$k]['Course']. "<br>" ."salle ". $c[$k]['Room'] ."<br>" . $c[$k]['Campus']  ."</td>";
            }
            $cpt = $k;
            $table .= "</tr>"; 
}
$table .= "</table>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Salles/Profile</title>
    <link rel="icon" href="Assets/98a7996e0929082e2afe0b90afe429e7_400x400.ico" type="image/x-icon" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        #logo{
            height: 50px;
            width: 190px;
        }
        table{
        border: 1px;
        width: 80%;
        }
        td,th{
            border: 1px solid;
            padding: 4px;
        }
    </style>
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
                <a class="dropdown-item" href=<?= $href?>><?=$msg ?></a>
                <a class="dropdown-item" href=<?= $href1?>> <?= $msg1?> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">logout</a>
              </div>
            </li>
          </ul>
        </div>
      <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" name="nom" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </nav>


    <?=$table ?>

     
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>