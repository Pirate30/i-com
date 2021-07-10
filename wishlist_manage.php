<?php
require('connection.php');
require('functions.php');
require('add_to_cart.php');

$pid = get_safe_value($con, $_POST['pid']);
$type = get_safe_value($con, $_POST['type']);

if (isset($_SESSION['USER_LOGIN'])) {
} else {
    echo "not_login";
}
