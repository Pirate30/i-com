<?php
require('connection.php');
require('functions.php');

unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_ID']);
header('location:index.php');
die();
