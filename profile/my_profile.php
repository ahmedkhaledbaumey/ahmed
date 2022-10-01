<?php
include '../shared/header.php';
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";
NotAuth();
$myEmail =  $_SESSION['emailAdmin'];
$getData = "SELECT * FROM `admin` WHERE `email` = '$myEmail'";
$successGetData = mysqli_query($connection,$getData);
$row = mysqli_fetch_row($successGetData);

// if(isset($_GET['delete_id']))
// {
//     $id = $_GET['delete_id'];
//     $delete = "DELETE FROM `admin` WHERE `id` = $id";
//     $doneDelete = mysqli_query($connection, $delete);
//     header("location:  /project/screens/employee/list.php ");
// }
?> 
<div class="container col-6">
        <div class="card ">
            <div class="card-body">
<div class="card" style="width: 18rem;">
    <img width="100" src="<?= $row[7] ?>" class="card-img-top" >
    <div class="card-body">
        <h5 class="card-title">Name : <?= $row[1] ?> </h5>
        <h6 class="card-title">Age : <?= $row[2] ?> </h6>
        <h6 class="card-title">Phone : <?= $row[4] ?> </h6>
        <h6 class="card-title">Address : <?= $row[3] ?> </h6>
        <h6 class="card-title">Email : <?= $row[5] ?> </h6>
        <h6 class="card-title">Password : <?= $row[6] ?> </h6>
        <a href="/law_office/profile/update.php?edit_admin=<?= $row[0] ?>" class="btn btn-primary">Edit</a>
    </div>
</div>
</div>
</div>
</div>
<?php include "../shared/footer.php" ?>