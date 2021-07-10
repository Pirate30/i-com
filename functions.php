<?php
// include('connection.php');

function pr($arr)
{
    echo '<pre>';
    print_r($arr);
}
function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
}

function get_safe_value($con, $str)
{
    if ($str != '') {
        $str = trim($str);
        return mysqli_real_escape_string($con, $str);
    }
}

function get_product($con, $limit = '', $cat_id = '', $product_id = '', $search_str = '')
{

    $sql = "SELECT * FROM `product` WHERE STATUS=1 ";

    // if ($type == 'latest') {
    //     $sql .= "order by id desc";
    // }
    if ($limit != '') {
        $sql = "SELECT * FROM `product` WHERE STATUS=1 limit $limit ";
    }
    if ($cat_id != '') {
        $sql .= "and categories_id = $cat_id";
    }
    if ($product_id != '') {
        $sql .= "and product.id = $product_id";
    }
    if ($search_str != '') {
        $sql .= "and (product.name like '$search_str' or product.description like '$search_str')";
    }



    $res = mysqli_query($con, $sql);
    $get_data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $get_data[] = $row;
    }
    return $get_data;
}
