<?php
  $titre = $_POST['titre'];
  $temps = $_POST['temps'];

  include("cnx.php");
  #else
  {
    $add = $conn->prepare("INSERT INTO courses  (titre, temps) VALUES (?, ?)");
    $add->bind_param("ss",$titre, $temps);
    $add->execute();
    echo "<script>window.location.replace('courses .php')</script>";
    $add->close();
    $conn->close();
  }
?> 