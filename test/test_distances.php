<?php
include_once '../classes/Utils.class.php';
echo "<a href='../views/home.php'>Go Home</a><br/>";
$data_test1 = array(10,12,14,15,11,20,34,22,1,4,229);
$data_test2 = array(40,22,14,55,3,1,55,60,31,1,3);
echo "Vector1: [ ";
foreach ($data_test1 as $data){
	echo "$data  ";
}
echo "]<br />";
echo "Vector2: [ ";
foreach ($data_test2 as $data){
	echo "$data ";
}
echo "]<br /><br /> <Strong>Euclidean distance test:</Strong><br />";
echo "result: <em>".Utils::calculate_euclidean($data_test1,$data_test2)."</em>";
echo "<br /> <Strong>Quad Euclidean distance test:</Strong><br />";
echo "result: <em>".Utils::calculate_qeuclidean($data_test1,$data_test2)."</em>";
echo "<br /> <Strong>Manhathan distance test:</Strong><br />";
echo "result: <em>".Utils::calculate_manhathan($data_test1,$data_test2)."</em>";
?>