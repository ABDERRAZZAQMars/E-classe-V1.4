<?php
  $nom = $_POST['nom'];
  $payment_schedule = $_POST['payment_schedule'];
  $bill_number = $_POST['bill_number'];
  $amount_paid = $_POST['amount_paid'];
  $balance_amount = $_POST['balance_amount'];
  $datepayment = $_POST['datepayment'];

  include("cnx.php");
  #else
  {
    $add = $conn->prepare("INSERT INTO payment_details (nom, payment_schedule, bill_number, amount_paid, balance_amount,datepayment ) VALUES (?, ?, ?, ?, ?, ?)");
    $add->bind_param("sssiis",$nom, $payment_schedule, $bill_number, $amount_paid, $balance_amount, $datepayment);
    $add->execute();
    echo "<script>window.location.replace('payment.php')</script>";
    $add->close();
    $conn->close();
  }
?> 