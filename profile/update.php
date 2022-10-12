<?php
include '../shared/header.php';
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";

NotAuth();
$id = $_GET['edit_admin'];
$getoneRow = "SELECT * FROM `admin` WHERE `id` = $id";
$oneRow = mysqli_query($connection, $getoneRow);
$row = mysqli_fetch_row($oneRow);


if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $imgUpdate_name = time() . $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];
    $location = "./uploads/$imgUpdate_name";
    move_uploaded_file($img_temp, $location);

    if (empty($_FILES['image']['name'])) {
    $updateAdminData = "UPDATE `admin` SET `name`='$name',`age`=$age,`address`='$address',`phone`='$phone',`email`='$email',`password`='$password',`image`='$row[7]',`role`='1' WHERE `id` = $id ";
    }
else {
    $img_name = time() . $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];
    $location = "./uploads/$img_name";
    move_uploaded_file($img_temp, $location);
    $updateAdminData = "UPDATE `admin` SET `name`='$name',`age`=$age,`address`='$address',`phone`='$phone',`email`='$email',`password`='$password',`image`='$location',`role`='1' WHERE `id` = $id ";
};
    $doneUpdateAdminData = mysqli_query($connection, $updateAdminData);
    go("profile/my_profile.php");
}

?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group"><img width="200" src="<?= $row[7] ?>" class="img-thumbnail"> <input type="file"
            name="image"></div>
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $row[1] ?>" name="name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Age</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="age" value="<?= $row[2] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Phone</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?= $row[4] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Address</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="<?= $row[3] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="<?= $row[5] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="password" value="<?= $row[6] ?>">
    </div>



    <button type="submit" class="btn btn-info" name="update">Update</button>
</form>

<?php include "../shared/footer.php" ?>