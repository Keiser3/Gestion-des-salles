<?php 
 class Personne{
    public $id;
    public $idType;
    public $nom; 
    public $prenom;
    public $email;
    public $password;
    public static $errMsg = "";
    public static $succMsg="";
    public function __construct($id,$type,$nom,$prenom,$email,$password){
        $this->id = $id;
        $this->idType = $type;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->$email = $email;
        $this->$password = $password;
    }
    public function addPersonne($conn){
        $hash = password_hash($this->password,PASSWORD_DEFAULT);
        $query = "INSERT INTO personnes (id_type, nom, prenom, email, password)
                         VALUES ('$this->idType','$this->nom','$this->prenom', '$this->email','$hash');
        ";
        if (mysqli_query($conn,$query)) {
                self::$succMsg = "operation successfull";
            }
        else{
            self::$errMsg = "SQL exited with error: <br>" . mysqli_error($conn);
        } 
    }
    public function fetchPersonne($email,$conn){
        $query = "SELECT * FROM personnes WHERE email = '$email'";
        
        if ($temp = mysqli_query($conn,$query)) {
           $assoc = mysqli_fetch_assoc($temp);
           var_dump($assoc);
           $result = new Personne('','','','','','');
           $result->id = $assoc['id_Personne'];
           $result->idType = $assoc['id_Type'];
           $result->nom = $assoc['nom'];
           $result->prenom = $assoc['prenom'];
           $result->email = $assoc['email'];
           $result->password = $assoc['password'];
          return $result;
        }
        else{
            return FALSE;
        }
    }
 }
?>