<?php
    include_once('session.php');
    require('db.php');
    require('personne.php');
    include('seance.php');
    $err = "";
    if (isset($_POST["email"]) &&  isset($_POST["password"]  )) {
      var_dump($_POST);
        $email = $_POST["email"];
        $password = $_POST['password'];
        $personne = new Personne('','','','','','');
        $personne->email = $email;
        $personne->password = $password;
        var_dump($personne);
        $exists = $personne->fetchPersonne($personne->email,$connection->conn);
        var_dump($exists);
        if (!$exists) {
            $err = "The entered email doesn't exist";
        }
        else{
           if (password_verify($personne->password,$exists->password)) {
             $_SESSION['id'] = $exists->id;
             $_SESSION['name'] = $exists->nom ." ". $exists->prenom;
             $_SESSION['email'] = $exists->email;
             if($exists->idType == 1){
                $_SESSION['type'] = 'enseignant';
             }
             else{
              $_SESSION['type'] = 'surveillant';
             }
             header('Location: index.php');
             }
            else{
              $err = "Wrong password";
            }
           }
        }
        
      
?>