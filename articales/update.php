<?php
include '../shared/header.php';
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";
NotAuth();

$id = $_GET['edit_post'];
$getoneRow = "SELECT * FROM `articales` WHERE `id` = $id";
$oneRow = mysqli_query($connection, $getoneRow);
$onerow = mysqli_fetch_row($oneRow);

if (!empty($_SESSION['emailLawyer'])) {
  $myEmail = $_SESSION['emailLawyer'];
  $getData = "SELECT * FROM `lawyers` WHERE `email` = '$myEmail'";
  $successGetData = mysqli_query($connection, $getData);
  $row = mysqli_fetch_row($successGetData);
  $auther = $row[1];
  $imageProfile = $row[9];
}
else {
  $myEmail = $_SESSION['emailAdmin'];
  $getData = "SELECT * FROM `admin` WHERE `email` = '$myEmail'";
  $successGetData = mysqli_query($connection, $getData);
  $row = mysqli_fetch_row($successGetData);
  $auther = $row[1];
  $imageProfile = $row[7];
}

if (isset($_POST['update'])) 
{
  $title = $_POST['title'];
  $description = $_POST['description'];

  if (empty($_FILES['image']['name'])) {
      $addData = "UPDATE `articales` SET `title`='$title',`description`='$description',`auther`='$auther',`image`='https://tse2.mm.bing.net/th?id=OIP.KHR80cv2s-3ClgkBhEQHZAHaEh&pid=Api&P=0' WHERE `id` = $id";
  }else {
      $img_name = time() . $_FILES['image']['name'];
      $img_temp = $_FILES['image']['tmp_name'];
      $location = "./uploads/$img_name";
      move_uploaded_file($img_temp, $location);
      $addData = "UPDATE `articales` SET `title`='$title',`description`='$description',`auther`='$auther',`image`='$location' WHERE `id` = $id";
    };

    $successInsert = mysqli_query($connection, $addData);
    go("/articales/list.php");
}

?>
<div>
    <div>
        <div>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group"><img width="200" src="<?= $onerow[4] ?>" class="img-thumbnail"> <input
                        type="file" name="image"></div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" value="<?= $onerow[1] ?>" class="form-control" name="title"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" value="<?= $onerow[2] ?>" class="form-control" name="description"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" name="update" class="btn btn-info">Update</button>
            </form>
        </div>
    </div>
</div>
<?php include "../shared/footer.php" ?>