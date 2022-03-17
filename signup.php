<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


</head>

<body style="background: linear-gradient(90deg, #00C1FE 19.39%, #FAFFC1 96.69%);">
    <form method="POST" style="width: 475px;  border-radius: 20px; box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.1); margin-top: 50px;" id='myform' class="container bg-white mx-auto">
        <h1 class="pt-4 fw-bolder ms-5 "><span class="text-info">|</span> E-classe</h1>
        <h3 class="mt-5 text-center fw-bold">SIGN UP</h3>
        <div class="p-3">
            <label for="name" class="form-label">Full name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Entrer your name">
        </div>
        <div class="p-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Entrer your email">
        </div>
        <div class="p-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Entrer your password">
        </div>
        <div class="p-3">
            <label for="confirmer" class="form-label">Confirmer</label>
            <input type="password" name="confirmer" class="form-control" id="confirmer" placeholder="Confirmer">
        </div>
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-info m-3 text-white fw-bold">SIGN UP</button>
        </div>
        <p class="text-center pb-3"><a href="index.php" class="text-info fw-bold">SIGN IN</a></p>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
            $("#myform").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirmer: {
                        required: true,
                        equalTo : "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    }
                }
            });
    </script>
</body>

</html>

<?php
include("cnx.php");
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $cntrl = "SELECT * FROM comptes WHERE email='$email'";
    $qq = mysqli_query($conn, $cntrl);
    if ($_POST['password'] == $_POST['confirmer']) {
        if (mysqli_num_rows($qq) == 0) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = hash('sha256', $_POST['password']);


            $add = "INSERT INTO comptes VALUES('','$email','$password','$name')";
            $q = mysqli_query($conn, $add);
            if ($q) {
                echo "
        <script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Compte ajouter',
            showConfirmButton: false,
            timer: 1500
          })</script>";
            }
        } else {
            echo "
        <script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email deja existe!'
          })</script>";
        }
    } else {
        echo "
    <script>Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Votre confirmation password incorrect!'
      })</script>";
    }
}
?>