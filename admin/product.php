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

        $sql_update = "update product set status='$status' where id='$id'";
        mysqli_query($con, $sql_update);
    }
    if ($type == 'delete') {
        // $type = get_safe_value($con, $_GET['type']);
        $id = get_safe_value($con, $_GET['id']);
        $sql_delete = "delete from product where id='$id'";
        mysqli_query($con, $sql_delete);
    }
}


$sql = "select product.*,categories.categories from product,categories where product.categories_id = categories.id order by product.id desc";
$res = mysqli_query($con, $sql);

?>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title" style="font-size: 25px;">Product Management </h4>
                        <h3 class="box-title"><a href="add_products.php" style="color:blue">Add New Product <i class="fa fa-plus"></i></a></h3>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>CATEGORY</th>
                                        <th>NAME</th>
                                        <th>IMAGE</th>
                                        <th>MRP</th>
                                        <th>PRICE</th>
                                        <th>QTY</th>
                                        <TH></TH>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc(($res))) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?></td>
                                            <td> <?php echo $row['id'] ?> </td>
                                            <td> <span><?php echo $row['categories'] ?></span> </td>
                                            <td> <span><?php echo $row['name'] ?></span> </td>
                                            <td> <img src="../media/product/<?php echo $row['image'] ?>" alt=""> </td>
                                            <td> <span><?php echo $row['mrp'] ?></span> </td>
                                            <td> <span><?php echo $row['price'] ?></span> </td>
                                            <td> <span><?php echo $row['qty'] ?></span> </td>
                                            <td>

                                                <?php
                                                if ($row['status'] == '1') { ?>
                                                    <span class="badge badge-complete"><?php echo "<a style='color:white' href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>&nbsp;" ?></span>
                                                <?php } else { ?>
                                                    <span class="badge badge-complete bg-warning"><?php echo "<a style='color:white' href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>&nbsp;" ?></span>
                                                <?php } ?>
                                                <span class="badge badge-complete bg-primary"><?php echo "<a style='color:white' href='add_products.php?id=" . $row['id'] . "'>Edit</a>&nbsp" ?></span>

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