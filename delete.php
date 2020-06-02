<?php
include_once "apps/db.php";
include_once "apps/functions.php";



  if(isset($_GET['id'])){
      
      $id = $_GET['id'];
      
      $sql = "DELETE  FROM users WHERE id = '$id'";
      $connection ->query($sql);
       
        header("location:register.php");
  }











?>