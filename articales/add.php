<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";
NotAuth();


if (!empty($_SESSION['emailLawyer'])){
    $myEmail =  $_SESSION['emailLawyer'];
    $getData = "SELECT * FROM `lawyers` WHERE `email` = '$myEmail'";
    $successGetData = mysqli_query($connection,$getData);
    $row = mysqli_fetch_row($successGetData);
    $auther = $row[1];
    $imageProfile = $row[9];
  }else {
    $myEmail =  $_SESSION['emailAdmin'];
    $getData = "SELECT * FROM `admin` WHERE `email` = '$myEmail'";
    $successGetData = mysqli_query($connection,$getData);
    $row = mysqli_fetch_row($successGetData);
    $auther = $row[1];
    $imageProfile = $row[7];  
   

}


if (isset($_POST['insert']))
{
$title = $_POST['title'];
$description = $_POST['description'];


$img_name = time() . $_FILES['image']['name'];
$img_temp = $_FILES['image']['tmp_name'];
$location = "./uploads/img_name";

move_uploaded_file($img_temp, $location);
$addData = "INSERT INTO `articales`VALUES(null,'$title','$description','$auther','$location',default,default,'$imageProfile')";
$aq=mysqli_query($connection,$addData);





go("/articales/list.php");
}
?>
<div class="container col-6">
    <div class="card ">
        <div class="card-body">
            <div>
                <div>
                    <div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea id="exampleInputEmail1" class="form-control" name="description"
                                    rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Image</label>
                                <input type="file" name="image">
                            </div>

                            <button type="submit" name="insert" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "../shared/footer.php" ?>