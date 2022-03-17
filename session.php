<?php
session_start();
if (isset($_SESSION['email'])) {
    if ((time() - $_SESSION['time'] > 3600)) {
        session_destroy();
        header('location:index.php?late=You were inactive for too long!');
    }
    $_SESSION['time']=time();
}else {
    header('location:index.php');
}
