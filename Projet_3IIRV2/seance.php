<?php
class Seance{
public $idSeance;
public $t_debut;
public $t_fin;
public $idPersonne;
public $idSalle;
public $idGroupe; 
public $idJour;
public $idMatiere;
public $idCampus;
public static $errMsg = "";
public static $succMsg="";
public function __construct($idSeance,$t_debut,$t_fin,$idPersonne,$idSalle,$idGroupe,$idJour,$idMatiere,$idCampus){
     $this->idSeance = $idSeance;
     $this->t_debut = $t_debut;
     $this->t_fin = $t_fin;
     $this->idPersonne = $idPersonne;
     $this->idSalle = $idSalle;
     $this->idGroupe = $idGroupe;
     $this->idJour = $idJour;
     $this->idMatiere = $idMatiere;
     $this->idCampus = $idCampus;
}
public function AddSeance($conn){
    $query = "INSERT INTO seances (t_debut, t_fin, id_Personne, id_Salle, id_Groupe, id_Jour, id_Matiere, id_Campus)
              VALUES ('$this->t_debut','$this->t_fin','$this->idPersonne', '$this->idSalle','$this->idGroupe','$this->idJour','$this->idMatiere','$this->idCampus');   
             ";
    if (mysqli_query($conn,$query)) {
        self::$succMsg = "operation successfull";
    }
else{
    self::$errMsg = "SQL exited with error: <br>" . mysqli_error($conn);
} 
}
static function fetchGroupFields($groupe,$conn){
    $query = "SELECT * FROM groupes WHERE labelG = '$groupe'";
    $temp = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($temp);
    return $result;
}
static function fetchSalleFields($salle,$conn){
    $query = "SELECT * FROM salles WHERE labelS = '$salle'";
    $temp = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($temp);
    return $result;
}
static function fetchPersonID($person,$conn){
    $query = "SELECT id_personne FROM personnes WHERE nom = '$person->nom' AND prenom = '$person->prenom'";
    $temp = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($temp);
    return $result;
}

static function getTimetableByGroupOrTeacher($conn,$name, $isGroup = true){
    $columnName = $isGroup ? 'Groupe' : 'LastName';
    $query = "SELECT * FROM timetable WHERE $columnName = '$name'";
    $temp = mysqli_query($conn,$query);
    if (mysqli_num_rows($temp) > 0) {
      $result=[];
      while($row = mysqli_fetch_assoc($temp)){
        $result[] = $row;
      }
      return $result;
    }
}



static function selectFreeSeance($idPersonne,$idGroupe,$conn){
   $query = "SELECT * FROM seances WHERE id_Matiere = 0 AND (id_Personne = '$idPersonne' OR id_Groupe = '$idGroupe')";
    $temp = mysqli_query($conn,$query);
    if (mysqli_num_rows($temp) > 0) {
      $result=[];
      while($row = mysqli_fetch_assoc($temp)){
        $result[] = $row;
      }
      return $result;
    }
}
static function updateSeance($seance,$conn,$id){
    $query = "UPDATE seances SET t_debut = '$seance->t_debut', 
                                 t_fin = '$seance->t_fin', 
                                 id_Personne = '$seance->idPersonne',
                                 id_Salle = '$seance->idSalle',
                                 id_Groupe = '$seance->idGroupe',
                                 id_Jour = '$seance->idJour',
                                 id_Matiere = '$seance->idMatiere',
                                 id_Campus = '$seance->idCampus'
                            WHERE id_Seance = '$id';
                                 ";
    if (mysqli_query($conn,$query)) {
        self::$succMsg = "Operation successfull";
    }
    else{
        self::$errMsg = "SQL exited with error: <br>" . mysqli_error($conn);
    }
}
static function deleteSeance($conn,$id){
    
       $query = "DELETE FROM seances WHERE id_Seance = '$id'";
       if (mysqli_query($conn,$query)) {
        self::$succMsg = "operation successfull";
      }
     else{
       self::$errMsg = "SQL exited with error: <br>" . mysqli_error($conn);
    }
}
}
?>
