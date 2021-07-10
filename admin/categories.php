<?php
include("header.php");
$operation = '';
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);


    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);

        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }

        $sql_update = "update categories set status='$status' where id='$id'";
        mysqli_query($con, $sql_update);
    }
    if ($type == 'delete') {
        // $type = get_safe_value($con, $_GET['type']);
        $id = get_safe_value($con, $_GET['id']);
        $sql_delete = "delete from categories where id='$id'";
        mysqli_query($con, $sql_delete);
    }
}


$sql = "select * from categories order by categories asc";
$res = mysqli_query($con, $sql);

?>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title" style="font-size: 25px;">Category Management </h4>
                        <h3 class="box-title"><a href="add_categories.php" style="color:blue">Add New category <i class="fa fa-plus"></i></a></h3>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>category</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc(($res))) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?></td>
                                            <td> <?php echo $row['id'] ?> </td>
                                            <td> <span class="name"><?php echo $row['categories'] ?></span> </td>
                                            <td>

                                                <?php
                                                if ($row['status'] == '1') { ?>
                                                    <span class="badge badge-complete"><?php echo "<a style='color:white' href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>&nbsp;" ?></span>
                                                <?php } else { ?>
                                                    <span class="badge badge-complete bg-warning"><?php echo "<a style='color:white' href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>&nbsp;" ?></span>
                                                <?php } ?>
                                                <span class="badge badge-complete bg-primary"><?php echo "<a style='color:white' href='add_categories.php?id=" . $row['id'] . "'>Edit</a>&nbsp" ?></span>

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