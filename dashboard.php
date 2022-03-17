<?php
include('session.php');
include("cnx.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="conatiner-fluid" style="overflow-x: hidden;">
        <div class="row">
            <input type="checkbox" id="menu" class="d-none">
            <!--Side Bar-->
            <?php
            include("./sidebar.php");
            ?>
            <!--Nave Bar-->
            <div class="col">
                <div class="row">
                    <?php
                    include("./navbar.php");
                    ?>
                    <!--Cartes-->
                    <div class="conatiner-fluid">
                        <div class="row mx-auto mt-3 ">
                            <div class="col-lg-3 col-md-6 col-sm-12 pb-2">
                                <div style="background-color: #F0F9FF; border-radius: 10px;">
                                    <div class="pt-3 ps-3">
                                        <img src="./Icones/student.svg" alt="">
                                        <h5 class="pt-3">Students</h5>
                                    </div>
                                    <div class="text-end pe-4 pb-2">
                                        <h1>
                                            <?php
                                            include("cnx.php");
                                            $sql = "SELECT * FROM students";
                                            $res = mysqli_query($conn, $sql);
                                            $nrows = mysqli_num_rows($res);
                                            echo "$nrows";
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 pb-2">
                                <div style="background-color: #FEF6FB;border-radius: 10px;">
                                    <div class="pt-3 ps-3">
                                        <img src="./Icones/coursecarte.svg" alt="">
                                        <h5 class="pt-3">Course</h5>
                                    </div>
                                    <div class="text-end pe-4 pb-2">
                                        <h1>
                                            <?php
                                            include("cnx.php");
                                            $sql = "SELECT * FROM courses";
                                            $res = mysqli_query($conn, $sql);
                                            $nrows = mysqli_num_rows($res);
                                            echo "$nrows";
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 pb-2">
                                <div style="background-color: #FEFBEC;border-radius: 10px;">
                                    <div class="pt-3 ps-3">
                                        <img src="./Icones/paymentcarte.svg" alt="">
                                        <h5 class="pt-3 text-gray">Payments</h5>
                                    </div>
                                    <div class="text-end pe-4 pb-2">
                                        <h1><span class="fs-3">Dhs</span>
                                            <?php
                                            include("cnx.php");
                                            $nsum = "SELECT SUM(amount_paid) AS sumprix FROM payment_details";
                                            $res = mysqli_query($conn, $nsum);
                                            $total = mysqli_fetch_assoc($res);
                                            $sumtotal = $total['sumprix'];
                                            echo $sumtotal;
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 pb-2">
                                <div style="background: linear-gradient(90deg, #00C1FE 19.39%, #FAFFC1 96.69%);border-radius: 10px;">
                                    <div class="pt-3 ps-3">
                                        <img src="./Icones/userscarte.svg" alt="">
                                        <h5 class="pt-3 text-white">Users</h5>
                                    </div>
                                    <div class="text-end pe-4 pb-2">
                                        <h1>
                                            <?php
                                            include("cnx.php");
                                            $sql = "SELECT * FROM comptes";
                                            $res = mysqli_query($conn, $sql);
                                            $nrows = mysqli_num_rows($res);
                                            echo "$nrows";
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>