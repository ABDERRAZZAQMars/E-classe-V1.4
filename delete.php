<?php
  include("cnx.php");
  if (isset($_GET['delete'])) 
  {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id") or die($conn->error());
    echo "<script>window.location.replace('student.php')</script>";
  }
