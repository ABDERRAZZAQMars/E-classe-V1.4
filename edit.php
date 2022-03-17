<?php
include('session.php');
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



<body style="background-color:#e5e5e570;">
    <div class="conatiner-fluid" style="overflow-x: hidden;">
        <div class="row">
            <input type="checkbox" id="menu" class="d-none">
            <!--Side Bare-->
            <?php
            include("./sidebar.php");
            ?>
            <!--Nave Bar-->
            <div class="col">
                <div class="row" style="background-color: white;">
                    <?php
                    include("./navbar.php");
                    ?>
                </div>
                <div class="d-flex justify-content-between mx-auto mt-3" style="width: 95%;border-bottom: 1px solid gray;">

                    <h1>STUDENT EDIT</h1>
                    <div>
                        <img src="./Icones/up.svg" alt="">
                        <a href="formstudent.php"><button type="button" class="btn btn-info ms-3 text-white">EDIT STUDENT</button></a>
                    </div>
                </div>
                <div class="conatiner-fluid mx-auto mt-3" style="width: 95%;">
                    <div class="row" style="overflow-x: auto;">
                        <?php
                        include("cnx.php");
                        $id = $_GET['edit'];
                        $sql = "SELECT * FROM students WHERE id = $id";
                        $res = mysqli_query($conn, $sql);
                        $updat = mysqli_fetch_assoc($res);
                        ?>
                        <form method="POST" style="width: 800px; border-radius: 10px;" class="container bg-white mx-auto">
                            <div class="p-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="name" value="<?php echo $updat['name']; ?>">
                            </div>
                            <div class="p-2">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"  name="email" value="<?php echo $updat['email']; ?>">
                            </div>
                            <div class="p-2">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"  name="phone" value="<?php echo $updat['phone']; ?>">
                            </div>
                            <div class="p-2">
                                <label for="enroll_number" class="form-label">Enroll Number</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"  name="enroll_number" value="<?php echo $updat['enroll_number']; ?>">
                            </div>
                            <div class="p-2">
                                <label for="date_of_admission" class="form-label">Date Of Admission</label>
                                <input type="date" class="form-control" id="exampleInputPassword1"  name="date_of_admission" value="<?php echo $updat['date_of_admission']; ?>">
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-info m-3 text-white fw-bold">Submit</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $enroll_number = $_POST['enroll_number'];
                            $date_of_admission = $_POST['date_of_admission'];
                            $query = "UPDATE students set id = $id , name='$name',email='$email',phone='$phone',enroll_number='$enroll_number',date_of_admission='$date_of_admission' where id='$id'";
                            $res = mysqli_query($conn, $query);
                            echo '<script>window.location.href = "student.php";</script>';
                            mysqli_close($conn, $query);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>



</html>