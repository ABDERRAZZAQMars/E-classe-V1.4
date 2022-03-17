
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background: linear-gradient(90deg, #00C1FE 19.39%, #FAFFC1 96.69%);">
    <form method="POST" style="width: 475px;  border-radius: 20px; box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.1); margin-top: 50px;" class="container bg-white mx-auto">
        <h1 class="pt-4 fw-bolder ms-5 "><span class="text-info">|</span> E-classe</h1>
        <h3 class="mt-5 text-center fw-bold">SIGN IN</h3>
        <P class="text-center">Entrer your credentials to access your account</P>
        <?php if (isset($_GET['error'])) { ?>
            <div class="p-3">
                <p><?php echo $_GET['error']; ?></p>
            </div>
        <?php } ?>
        <?php if (isset($_GET['late'])) { ?>
            <div class="p-3">
                <p><?php echo $_GET['late']; ?></p>
            </div>
        <?php } ?>
        <div class="p-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"] ?>" placeholder="Entrer your email">
        </div>
        <div class="p-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"] ?>" placeholder="Entrer your password">
        </div>
        <div class="p-3">
            <input type="checkbox" name="rememberme">
            <label for="rememberme" class="form-label">Remember me</label>
        </div>
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-info m-3 text-white fw-bold">SIGN IN</button>
        </div>
        <p class="text-center pb-3">Forgot your password? <span class=""><a href="#" class="text-info fw-bold">Reset Password</a></span></p>
        <p class="text-center pb-3"><a href="signup.php" class="text-info fw-bold">SIGN UP</a></p>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
if (isset($_SESSION['email'])) {
    header('location:dashboard.php');
}
include("cnx.php");
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = hash('sha256', $_POST['password']);
    $check = "SELECT * FROM comptes WHERE email = '" . $email . "' AND password = '" . $password . "'";
    $success = mysqli_query($conn, $check);
    $row = mysqli_num_rows($success);
    $fetch = mysqli_fetch_assoc($success);
    if ($row > 0) {
        $_SESSION['email']=$_POST['email'];
        $_SESSION['name']=$fetch['name'];
        $_SESSION['time']=time();
        if (!empty($_POST["rememberme"])) {
            setcookie("email", $_POST["email"], time() + (60));
            setcookie("password", $_POST["password"], time() + (60));
        } else {
            if (isset ($_COOKIE["email"])) {
                setcookie("email", "");
            }
            if (isset ($_COOKIE["password"])) {
                setcookie("password", "");
            }
        }
        header("location:dashboard.php");
    } else {
        echo "
        <script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email or password incorrect!'
          })</script>";
    }
}
?>