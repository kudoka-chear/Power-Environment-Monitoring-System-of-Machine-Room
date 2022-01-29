<?php
require'../dadb.php';
$Num=6;
if ($Num == null) {
	$Num=6;
}
$sql="select position,valueT,valueH,dateTime from temperature order by idtemperature DESC limit ?";
$p=$conn->prepare($sql);//负责准备要执行的查询
$p->bind_param("i",$Num);
$p->execute();//执行准备查询
$p->store_result();//查询的结果集存储到变量中
$p->bind_result($position,$valueT,$valueH,$dateTime);
$array=array();
while ($p->fetch()) {
	$temp=array();
	$temp["position"]=$position;
	$temp["valueT"]=$valueT;
	$temp["valueH"]=$valueH;
	$temp["dateTime"]=$dateTime;
	array_push($array,$temp);
}
$p->close();
//var_dump($array);
echo json_encode($array);
$conn->close();
?>