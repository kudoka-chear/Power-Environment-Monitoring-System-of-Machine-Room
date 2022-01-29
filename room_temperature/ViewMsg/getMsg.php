<?php
require'../dadb.php';
 $Num=7;
if ($Num == null) {
	$Num=7;
}
$res="select DATEYEAR,KT1,AA1,UAP1,UCP1,AP1,KT3,BB1,UBP1,BP1,KT4 from electricity_consumption order by idEC DESC limit ?";
$sql=$conn->prepare($res);//负责准备要执行的查询
$sql->bind_param("i",$Num);
$sql->execute();//执行准备查询
$sql->store_result();//查询的结果集存储到变量中
$sql->bind_result($dateyear,$kt1,$aa1,$uap1,$ucp1,$ap1,$kt3,$bb1,$ubp1,$bp1,$kt4);
$array=array();
while ($sql->fetch()) {
	$temp=array();
	$temp["dateyear"]=$dateyear;
	$temp["kt1"]=$kt1;
	$temp["aa1"]=$aa1;
	$temp["uap1"]=$uap1;
	$temp["ucp1"]=$ucp1;
	$temp["ap1"]=$ap1;
	$temp["kt3"]=$kt3;
	$temp["bb1"]=$bb1;
	$temp["ubp1"]=$ubp1;
	$temp["bp1"]=$bp1;
	$temp["kt4"]=$kt4;
	array_push($array, $temp);
}

$sql->close();
echo json_encode($array);
$conn->close();
?>
