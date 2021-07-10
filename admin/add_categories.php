<?php
include("header.php");
$categories = '';
$msg = "";

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from categories where id='$id' ");
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories = $row['categories'];
    } else {
        header('location:categories.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $categories = get_safe_value($con, $_POST['categories']);

    $res = mysqli_query($con, "select * from categories where categories='$categories' ");
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $data = mysqli_fetch_assoc($res);
            if ($data['id'] == '$id') {
            } else {
                $msg = "category is already exist...";
            }
        } else {
            $msg = "category is already exist...";
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($con, "update categories set categories = '$categories' where id='$id'");
        } else {
            mysqli_query($con, "insert into categories(categories,status) values('$categories','1')");
        }
        header('location:categories.php');
        die();
    }
}




?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="font-size: 25px;"><strong>Category Form</strong></div>
                    <form action="" method="POST">
                        <div class="card-body card-block">
                            <div class="form-group"><label for="categories" class=" form-control-label">Category</label>
                                <input type="text" name="categories" placeholder="Enter Category name" class="form-control" required value="<?php echo $categories ?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Submit</button>
                        </div>
                    </form>
                    <div style="color: red; padding-left:10px">
                        <?php
                        echo $msg;
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>