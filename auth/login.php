<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";
$error="";
if (isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginQuery = "SELECT * FROM `admin` WHERE `email` = '$email' and `password` = '$password' ";
    $successLogin = mysqli_query($connection, $loginQuery); 
    $r = mysqli_fetch_assoc($successLogin);
    $numberOfRowsAdmin = mysqli_num_rows($successLogin); 
    if (!empty($numberOfRowsAdmin)) {
        $_SESSION['emailAdmin'] = "$email"; 
        
        print_r($_SESSION); 
        
        echo "true admin";
        go("/index.php");
    }
    else {
        $loginQuery = "SELECT * FROM `lawyers` WHERE `email` = '$email' and `password` = '$password' ";
        $successLogin = mysqli_query($connection, $loginQuery);
        $numberOfRowslawyers = mysqli_num_rows($successLogin);
        if (!empty($numberOfRowslawyers)) {
            $_SESSION['emailLawyer'] = "$email";
           
            print_r($_SESSION);
            echo "true lawyer";
        go("/index.php");
        }else {
            echo " <div class='alert alert-danger col-4 mx-auto'>
        Not Register
    </div>";
        }
    }
}
?>
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/law_office//index.php" class="logo d-flex align-items-center w-auto">
                                <img src="/layer_company/assets/img/logo.png" alt="">
                                <h5 class="card-title text-center pb-0 fs-4">Law Office</h5>

                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>

                                <form class="row g-3 needs-validation" method="POST" novalidate
                                    enctype="multipart/form-data">

                                    <div class="col-12">
                                        <label for="email" class="form-label">email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control" id="yourUsername"
                                                required>

                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>
                                        <div class="text-danger"><?php echo "$error" ?></div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <div class="input-group has-validation">
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>

                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="text-danger"><?php echo "$error"  ?></div>
                                    </div>

                                    <div class="col-12">

                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="submit" type="submit">Login</button>
                                    </div>


                                </form>

                            </div>
                        </div>

                        <div class="credits">


                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
<!-- <form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control" id="exampleInputEmail1" name="password">
    </div>
    <button type="submit" class="btn btn-light" name="login">Login</button>
</form> -->

<?php include "../shared/footer.php" ?>