<?php
class Connection{
private $servername="localhost";
private $username="root";
private $password="";
private $dbName = "gestionsalle";
public $conn;
public function __construct(){
   $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbName);
   if (!$this->conn) {
     die("Connection failed: " . mysqli_connect_error());
   }
}
}
?>