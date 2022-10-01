<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";
adminNotAuth(); 

if (isset($_POST['insert'])) 
{
$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($_FILES['image']['name'])) {
$addData = "INSERT INTO `admin` VALUES (null,'$name','$age','$address','$phone','$email','$password','https://tse2.mm.bing.net/th?id=OIP.KHR80cv2s-3ClgkBhEQHZAHaEh&pid=Api&P=0',1)";
}
else {
    $img_name = time() . $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];
    $location = "./upload/$img_name";
    move_uploaded_file($img_temp, $location);
    $addData = "INSERT INTO `admin` VALUES (null,'$name','$age','$address','$phone','$email','$password', 'law_office/employee/upload/$img_name',1)";
};

$successInsert = mysqli_query($connection, $addData);
testMessage($successInsert,"Inserted");
go("/profile/list_admin.php");
}

?>

 
 
 <div class="container col-6">
        <div class="card ">
            <div class="card-body">
                <form method="POST"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for=""> Name </label>
                        <input type="text" name="name" class="form-control">
                    </div> 
                    <hr>  
               
                    <div class="form-group">
                        <label for="">age </label>
                        <input type="text" name="age" class="form-control">
                    </div> 
                    <hr>  
                
                    <div class="form-group">
                        <label for=""> address </label>
                        <input type="text" name="address" class="form-control">
                    </div> 
                    <hr>  
                
                    <div class="form-group">
                        <label for=""> phone </label>
                        <input type="text" name="phone" class="form-control">
                    </div> 
                    <hr>  
             
                    <div class="form-group">
                        <label for=""> email </label>
                        <input type="text" name="email" class="form-control">
                    </div> 
                    <hr>  
                
                    <div class="form-group">
                        <label for=""> password </label>
                        <input type="text" name="password" class="form-control">
                    </div> 
                    <hr>   
                    <div>
                    <label for="exampleInputPassword1">Image</label>
                     <input type="file" name="image"> 
                     </div>
                    <hr>   

                
                    
                    <button type="submit" class="btn btn-primary" name="insert">Submit</button>
                  
        </table>   
    <?php include "../shared/footer.php" ?>