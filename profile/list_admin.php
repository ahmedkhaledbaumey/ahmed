<?php
include '../shared/header.php';
include "../shared/nav.php";
include "../general/env.php";
include "../general/function.php";

NotAuth();

$getData = "SELECT * FROM `admin`";
$successGetData = mysqli_query($connection,$getData);

if(isset($_GET['delete_Admin']))
{
    $id = $_GET['delete_Admin'];
    $delete = "DELETE FROM `admin` WHERE `id` = $id";
    $doneDelete = mysqli_query($connection, $delete);
    go("/profile/list_admin.php");
}

?>

<table class="table table-dark">
<thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Profile</th>
        <th scope="col">Name</th>
        <th scope="col">age</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($successGetData as $get_data) { ?>
    <tr>
        <th scope="row"><?= "$get_data[id]" ?></th>
        <td><img src="<?= "$get_data[image]" ?> " width="45" ></td>
        <td><?= "$get_data[name]" ?></td>
        <td><?= "$get_data[age]" ?></td>
        <td><?= "$get_data[address]" ?></td>
        <td><?= "$get_data[phone]" ?></td>
        <td><?= "$get_data[email]" ?></td>
        <td><?= "$get_data[password]" ?></td>
        <td><a href="list_admin.php?delete_Admin=<?= "$get_data[id]" ?>" class="btn btn-danger">Delete</a></td>
    </tr>
        <?php } ?>
</tbody>
</table>

<?php include "../shared/footer.php" ?>