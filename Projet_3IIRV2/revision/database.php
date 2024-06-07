<?php 
   include('connection.php');
   $connection = new Connection();
   //appel de la methode creatDatabase
   $connection->createDatabase('test');
   //selection de la base de donnees
   $connection->selectDatabase('test');
   //stockage de la requete sql sous forme d'une chaine de caractere 
   $sql = " CREATE TABLE etudiant (
        id INT UNIQUE PRIMARY KEY AUTO-INCREMENT,
        nom varchar(255),
        prenom varchar (255),
        note NUMBER 
        )";
   // appel de la fonction createTable pour creer la table Etudiant
   $connection->createTable($sql);
?>