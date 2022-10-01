<?php
include '../shared/header.php';
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";
NotAuth();

$getData = "SELECT * FROM `articales`";
$successGetData = mysqli_query($connection,$getData);

if (isset($_GET['delete_post'])) 
{
  $id = $_GET['delete_post'];
  $delete = "DELETE FROM `articales` WHERE `id` = $id";
  $doneDelete = mysqli_query($connection, $delete);
  header("location:  /law_office/articales/list.php ");
}

?>
<?php foreach($successGetData as $data){ ?>
<div class="card" style="width: 18rem;">
      <img src="<?= $data['image_profile'] ?>" class="rounded" width="40">
      <h3><?= $data['auther'] ?></h3>
    
    <hr>
    <img width="300" src="/law_office/articales/uploads/<?= $data['image'] ?>" class="card-img-top" >
    <div class="card-body">
        <h5 class="card-title"><?= $data['title'] ?> </h5>
        <p class="card-title"> <?= $data['description'] ?> </p>
        <a href="/law_office/articales/update.php?edit_post=<?= $data['id'] ?>" class="btn btn-primary">Edit</a>
        <a href="/law_office/articales/list.php?delete_post=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
    </div>
</div>
<br> <br> <br>
<?php } ?>
<?php include "../shared/footer.php" ?>