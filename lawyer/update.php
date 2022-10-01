<?php
include '../shared/header.php';
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";


$id = $_GET['edit_id'];
$getoneRow = "SELECT * FROM `lawyers` WHERE `id` = $id";
$oneRow = mysqli_query($connection, $getoneRow);
$row = mysqli_fetch_row($oneRow);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $years_ex = $_POST['yearsex'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $imgUpdate_name = time() . $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];
    $location = "./uploads/$imgUpdate_name";
    move_uploaded_file($img_temp, $location);
    if (empty($_FILES['image']['name'])) {
    $updateEmpData = "UPDATE `lawyers` SET `name`='$name',`age`=$age,`address`='$address',`salary`=$salary,`yearsex`=$years_ex,`phone`='$phone',`email`='$email',`password`='$password',`image`='$row[9]' WHERE `id` = $id";
    }
  else {
    $img_name = time() . $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];
    $location = "./uploads/$img_name";
    move_uploaded_file($img_temp, $location);
    $updateEmpData = "UPDATE `lawyers` SET `name`='$name',`age`=$age,`address`='$address',`salary`=$salary,`yearsex`=$years_ex,`phone`='$phone',`email`='$email',`password`='$password',`image`='/project/screens/lawyer/uploads/$imgUpdate_name' WHERE `id` = $id";
  };
    $doneUpdateEmpData = mysqli_query($connection, $updateEmpData);
    go("/lawyer/list.php");
}

?>
<div class="container col-6">
        <div class="card ">
            <div class="card-body">
<form method="post" enctype="multipart/form-data">
      <div class="form-group"><img width="200" src="<?= $row[9] ?>" class="img-thumbnail" > <input type="file" name="image"></div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $row[1] ?>" name="name">
  </div>
  <div class="form-group">
      <label for="exampleInputPassword1">Salary</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="salary" value="<?= $row[4] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Phone</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?= $row[6] ?>">
  </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Age</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="age" value="<?= $row[2] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Address</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="<?= $row[3] ?>">
       </div>
       <div class="form-group">
        <label for="exampleInputPassword1">Years Experience</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="yearsex" value="<?= $row[5] ?>">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="email" value="<?= $row[7] ?>">
         </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="password" value="<?= $row[8] ?>">
    </div>
      <button type="submit" class="btn btn-info" name="update">Update</button>
      </form> 
      </div>  
      </div>  
       </div>

<?php include "../shared/footer.php" ?>