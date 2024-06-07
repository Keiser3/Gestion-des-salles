<?php 
include('database.php');

class Etudiant {
    $id,$nom,$prenom,$note;
    public function __construct($nom,$prenom,$note){
         $this->nom =  $nom;
         $this->prenom =  $prenom;
         $this->note =  $note;
    }
    public function creerEtudiant($tableName , $conn){
        $sql = "INSERT INTO $tableName(nom, prenom, note) 
                VALUES ('$this->nom', '$this->prenom', '$this->note');";
        mysqli_query($conn, $sql);
    }
    static function lireEtudiant($tableName, $conn, $id){
        $sql = "SELECT * FROM $tableName WHERE id = '$id'";
        $temp = mysqli_query($conn,$sql);
        $result = mysqli_fetch_assoc($temp);
    }
};




?>