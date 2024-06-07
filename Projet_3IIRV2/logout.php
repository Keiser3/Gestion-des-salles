<?php 
  require('validation.php');
  session_destroy();
  header('Location: login.php');
?>