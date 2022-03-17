<?php
include("./session.php");
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

                    <h1>COURSES EDIT</h1>
                    <div>
                        <img src="./Icones/up.svg" alt="">
                        <a href="formstudent.php"><button type="button" class="btn btn-info ms-3 text-white">ADD NEW COURSES</button></a>
                    </div>
                </div>
                <div class="conatiner-fluid mx-auto mt-3" style="width: 95%;">
                    <div class="row" style="overflow-x: auto;">
                        <?php
                        include("cnx.php");
                        $id = $_GET['edit'];
                        $sql = "SELECT * FROM courses  WHERE id = $id";
                        $res = mysqli_query($conn, $sql);
                        $updat = mysqli_fetch_assoc($res);
                        ?>
                        <form method="POST" style="width: 800px; border-radius: 10px;" class="container bg-white mx-auto">
                            <div class="p-2">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $updat['titre']; ?>" name="titre">
                            </div>
                            <div class="p-2">
                                <label for="temps" class="form-label">Temps</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $updat['temps']; ?>" name="temps">
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-info m-3 text-white fw-bold">Submit</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $titre = $_POST['titre'];
                            $temps = $_POST['temps'];
                            $query = "UPDATE courses  set id = $id , titre='$titre',temps='$temps' where id='$id'";
                            $res = mysqli_query($conn, $query);
                            echo '<script>window.location.href = "courses .php";</script>';
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