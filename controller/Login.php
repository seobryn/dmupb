<?php

include_once '../classes/Login.class.php';
$account = $_POST['acc_inp'];
$password = $_POST['pss_inp'];
Login::loginQuery($account, $password);