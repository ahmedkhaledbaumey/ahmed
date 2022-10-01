<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";
NotAuth();

if($_SESSION['emailAdmin']){
  $name_admin= $_SESSION['emailAdmin'];

}else{

  $name_admin= $_SESSION['emailLawyer'];

}



if (isset($_POST['insert'])) 
{
    $title = $_POST['title'];
    $description = $_POST['description'];

    
        $img_name = time() . $_FILES['image']['name'];
          $img_temp = $_FILES['image']['tmp_name'];
          $location = "./uploads/";

          move_uploaded_file($img_temp, $location . $img_name); 
          $addData = "INSERT INTO `articales` VALUES(null,'$title','$description','$name_admin','$img_name',default,default,'$imageProfile')";
          $aq=mysqli_query($connection,$addData);
    
        
   

        $successInsert = mysqli_query($connection, $addData);
        go("/articales/list.php");
}
?> 
<div class="container col-6"> 
<div class="card "> 
<div class="card-body">
<div >
  <div >
    <div >
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group ">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group ">
          <label for="exampleInputEmail1">Description</label>
          <textarea id="exampleInputEmail1" class="form-control" name="description" rows="6"></textarea>
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