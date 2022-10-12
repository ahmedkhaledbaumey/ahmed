<?php

session_start();

if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("location:  /law_office/ ");
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Company</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php if (isset($_SESSION['emailAdmin'] ) || isset($_SESSION['emailLawyer'])   ) { ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/law_office">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    lawyer
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/law_office/lawyer/add.php">Add</a>
                    <a class="dropdown-item" href="/law_office/lawyer/list.php">List</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    articales
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/law_office/articales/add.php">Add</a>
                    <a class="dropdown-item" href="/law_office/articales/list.php">List</a>
                </div>
            </li>
            <?php if (isset($_SESSION['emailAdmin'] )   ) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/law_office/profile/add_admin.php">Add New Admin</a>
                    <a class="dropdown-item" href="/law_office/profile/list_admin.php">list of Admin</a>
                    <a class="dropdown-item" href="/law_office/profile/my_profile.php">my_profile</a>
                </div>
            </li>
        </ul>
        <?php
} }?>
        <ul class="navbar-nav mr-auto"> </ul>

        <?php if (isset($_SESSION['emailAdmin'] ) || isset($_SESSION['emailLawyer'])   ) { ?>
        <form class="form-inline my-2 my-lg-0">
            <button name="logout" class="btn btn-dark"> Logout </button>
        </form>
        <?php
}
else { ?>
        <a href="/law_office/auth/login.php" class="btn btn-dark " type="submit">Login</a>
        <?php
}  ?>
    </div>
</nav>