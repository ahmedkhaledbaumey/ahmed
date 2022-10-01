<?php
include "../shared/header.php";
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";
$getData = "SELECT * FROM lawyers";
$successGetData = mysqli_query($connection,$getData);

if(isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    $delete = "DELETE FROM `lawyers` WHERE `id` = $id";
    $doneDelete = mysqli_query($connection, $delete);
    header("location:  /law_office/lawyer/list.php ");
}

?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">address</th>
      <th scope="col">salary</th>
      <th scope="col">yearsex</th>
      <th scope="col">phone</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">action</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($successGetData as $get_data) { ?>
    <tr>
      <th scope="row"><?= "$get_data[id]" ?></th>
      <td><img src="<?= "$get_data[image]" ?> " width="40" ></td>
      <td><?= "$get_data[name]" ?></td>
      <td><?= "$get_data[age]" ?></td>
      <td><?= "$get_data[address]" ?></td>
      <td><?= "$get_data[salary]" ?></td>
      <td><?= "$get_data[yearsex]" ?></td>
      <td><?= "$get_data[phone]" ?></td>
      <td><?= "$get_data[email]" ?></td>
      <td><?= "$get_data[password]" ?></td>
     
      
      <td><a href="/law_office/lawyer/update.php?edit_id=<?= "$get_data[id]" ?>" class="btn btn-info">Edit</a> </td>
      <td><a href="/law_office/lawyer/list.php?delete_id=<?= "$get_data[id]" ?>" class="btn btn-danger">Delete</a></td>
    </tr>
        <?php } ?>
  </tbody>
</table>

<?php include "../shared/footer.php" ?>