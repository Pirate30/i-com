<?php
include("header.php");
$operation = '';
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'delete') {
        // $type = get_safe_value($con, $_GET['type']);
        $id = get_safe_value($con, $_GET['id']);
        $sql_delete = "delete from contact_us where id='$id'";
        mysqli_query($con, $sql_delete);
    }
}


$sql = "select * from contact_us order by id desc";
$res = mysqli_query($con, $sql);

?>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title" style="font-size: 25px;">Contacts Management </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc(($res))) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?></td>
                                            <td> <?php echo $row['id'] ?> </td>
                                            <td> <span><?php echo $row['name'] ?></span> </td>
                                            <td> <span><?php echo $row['email'] ?></span> </td>
                                            <td> <span><?php echo $row['mobile'] ?></span> </td>
                                            <td> <span><?php echo $row['comment'] ?></span> </td>
                                            <td> <span><?php echo $row['added_on'] ?></span> </td>
                                            <td>

                                                <span class="badge badge-complete bg-danger"><?php echo "<a style='color:white' href='?type=delete&id=" . $row['id'] . "'>Delete</a>" ?></span>


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>