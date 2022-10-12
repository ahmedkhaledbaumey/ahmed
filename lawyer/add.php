<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";

if (isset($_POST['insert'])) 
{ 
  
  $name = $_POST['name'];
  $salary = $_POST['salary'];
  $phone = $_POST['phone'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $years_ex = $_POST['yearsex'];
  $salary = $_POST['salary'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (empty($_FILES['image']['name'])) {
  $addData = "INSERT INTO `lawyers` VALUES (null,'$name','$age','$address','$salary','$years_ex','$phone','$email','$password','https://tse1.mm.bing.net/th?id=OIP.u6p0fQYUUXQMpIfCNHtWxQHaDt&pid=Api&P=0')";
  }
  else {
      $img_name = time() . $_FILES['image']['name'];
      $img_temp = $_FILES['image']['tmp_name'];
      $location = "./uploads/$img_name";
      move_uploaded_file($img_temp, $location);
      $addData = "INSERT INTO `lawyers` VALUES (null,'$name',$age,'$address',$salary,$years_ex,'$phone','$email','$password','$location')";
  };

  $successInsert = mysqli_query($connection, $addData);
  go("/lawyer/list.php");
}

?>
<div class="container col-6">
    <div class="card ">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Salary</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="salary">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Age</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="age">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Years Experience</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="yearsex">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <hr>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary" name="insert">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>

<?php include "../shared/footer.php" ?>