<nav id="nav-menu" class="col-lg-2 col-md-3 col-sm-6" style="background-color: #FAFFC1; height: 100vh;">
    <div class="mt-3 d-flex justify-content-between align-items-center">
        <h4 class="ms-3 fw-bold"><span class="text-info">|</span> E-classe</h4>
        <label id="btnmenu" style="transform: rotate(180deg);" for="menu"><img src="./Icones/menu.svg" alt="menu-icone"></label>
    </div>
    <div class="img mt-4 text-center">
        <img src="./Iamges/youcode.png" alt="image Admin" class="rounded-circle mx-auto d-block">
        <h4 class="pt-3"><?php echo $_SESSION['name'];?></h4>
        <h6 class="text-info">Admin</h6>
    </div>
    <div class="mt-5">
        <a href="./dashboard.php" class="mt-3 w-75 mx-auto text-dark btn btn-outline-info nav-link border-0"><img src="./Icones/Home.svg" alt="home-icone" style="margin-right: 26px;">Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <a href="./courses .php" class="mt-3 w-75 mx-auto text-dark btn btn-outline-info nav-link border-0"><img src="./Icones/Course.svg" alt="Course-icone" style="margin-right: 30px;">Course&nbsp;&nbsp;</a>
        <a href="./student.php" class="mt-3 w-75 mx-auto text-dark btn btn-outline-info nav-link border-0"><img src="./Icones/Students.svg" alt="Students-icone" style="margin-right: 26px;">Students</a>
        <a href="./payment.php" class="mt-3 w-75 mx-auto text-dark btn btn-outline-info nav-link border-0"><img src="./Icones/Payment.svg" alt="Payment-icone" style="margin-right: 26px;">Payment&nbsp;</a>
        <a href="#" class="mt-3 w-75 mx-auto text-dark btn btn-outline-info nav-link border-0"><img src="./Icones/Report.svg" alt="Report-icone" style="margin-right: 31px;">Report&nbsp;&nbsp;&nbsp;</a>
        <a href="#" class="mt-3 w-75 mx-auto text-dark btn btn-outline-info nav-link border-0"><img src="./Icones/Settings.svg" alt="Settings-icone" style="margin-right: 31px;">Settings</a>
        <a href="./logout.php" class="mt-5 mx-auto w-75 text-dark btn btn-outline-info nav-link border-0">Logout<img src="./Icones/Logout.svg " alt="Logout-icone " class="ms-4"></a>
    </div>
</nav>