<?php

include '../classes/Login.php';



$account = $_POST['acc_inp'];
$password = $_POST['pss_inp'];


loginQuery($account, $password);

//loginQuery($account, $password);