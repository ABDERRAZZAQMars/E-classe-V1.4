<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $enroll_number = $_POST['enroll_number'];
  $date_of_admission = $_POST['date_of_admission'];

  include("cnx.php");
  #else
  {
    $add = $conn->prepare("INSERT INTO students (name, email, phone, enroll_number, date_of_admission) VALUES (?, ?, ?, ?, ?)");
    $add->bind_param("ssiis",$name, $email, $phone, $enroll_number, $date_of_admission);
    $add->execute();
    echo "<script>window.location.replace('student.php')</script>";
    $add->close();
    $conn->close();
  }
?> 