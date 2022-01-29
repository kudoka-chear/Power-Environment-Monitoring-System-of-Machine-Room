<?php
// header("location:addMsg.html");
require '../dadb.php';
date_default_timezone_set('Asia/Shanghai');
// date_default_timezone_set('PRC');
$PDU1A=$_POST["PDU1A"];
$PDU1B=$_POST["PDU1B"];
$PDU2A=$_POST["PDU2A"];
$PDU2B=$_POST["PDU2B"];
$PDU3A=$_POST["PDU3A"];
$PDU3B=$_POST["PDU3B"];
$KT1=$_POST["KT1"];
$AA1=$_POST["AA1"];
$UAP1=$_POST["UAP1"];
$UCP1=$_POST["UCP1"];
$AP1=$_POST["AP1"];
$KT3=$_POST["KT3"];
$BB1=$_POST["BB1"];
$KT4=$_POST["KT4"];
$date=date('Y-m-d');
$time=date('H:m:s');
$array=compact("PDU1A","PDU1B","PDU2A","PDU2B","PDU3A","PDU3B","KT1","AA1","UAP1","UCP1","AP1","KT3","BB1","KT4");
// 先查询上一条记录
$sql2="select * from roomadd order by id desc limit 1";
$res_sql2=$conn->query($sql2);


//var_dump($array);
$zero="0";
foreach ($array as $key => $value) {
	if (empty($value)) {
		$array[$key]=$zero;
	}
	// $array[$key]=(float)$value;
}
 // var_dump($array);
$sql1="INSERT INTO roomadd (DATEYEAR,TIMEHOUR,PDU1A,PDU1B,PDU2A,PDU2B,PDU3A,PDU3B,KT1,AA1,UAP1,UCP1,AP1,KT3,BB1,KT4) VALUES('$date','$time','$PDU1A','$PDU1B','$PDU2A','$PDU2B','$PDU3A','$PDU3B','$KT1','$AA1','$UAP1','$UCP1','$AP1','$KT3','$BB1','$KT4')";
$res_sql1=$conn->query($sql1);

// 导入每日用电量
if (mysqli_num_rows($res_sql2)>0) {
	 echo "大于0";
	$row=mysqli_fetch_assoc($res_sql2);
	// 计算两天时间差
	$Date_1=$date;
	$Date_2=$row["DATEYEAR"];
	$Date_List_a1=explode("-",$Date_1);
	$Date_List_a2=explode("-",$Date_2);
	$d1=mktime(0,0,0,$Date_List_a1[1],$Date_List_a1[2],$Date_List_a1[0]);
	$d2=mktime(0,0,0,$Date_List_a2[1],$Date_List_a2[2],$Date_List_a2[0]);
	$Days=round(($d1-$d2)/3600/24);
	if ($Days<='0') {
		echo "</br>$Days";
		echo '<script>alert("今日已录入！");</script>';
	}else{
		 echo "right";
		 echo "</br>天$Date_2";
		// 把array和row中varchar变为float计算
		foreach ($array as $key => $value) {
			if ($key!="DATEYEAR") {
				$array[$key]=(float)$value;
			}	 
		}
		foreach ($row as $key => $value) {
			if ($key!="DATEYEAR"){
			 $row[$key]=(float)$value;
			}
		}
		$nPDU1A=$array["PDU1A"]-$row["PDU1A"];
		$nPDU1B=$array["PDU1A"]-$row["PDU1B"];
		$nPDU2A=$array["PDU2A"]-$row["PDU2A"];
		$nPDU2B=$array["PDU2B"]-$row["PDU2B"];
		$nPDU3A=$array["PDU3A"]-$row["PDU3A"];
		$nPDU3B=$array["PDU3B"]-$row["PDU3B"];
		$nKT1=$array["KT1"]-$row["KT1"];
		$nAA1=$array["AA1"]-$row["AA1"];
		$nUAP1=$array["UAP1"]-$row["UAP1"];
		$nUCP1=$array["UCP1"]-$row["UCP1"];
		$nAP1=$array["AP1"]-$row["AP1"];
		$nKT3=$array["KT3"]-$row["KT3"];
		$nBB1=$array["BB1"]-$row["BB1"];
		$nKT4=$array["KT4"]-$row["KT4"];
		$sql3="INSERT INTO electricity_consumption (DATEYEAR,TIMEHOUR,PDU1A,PDU1B,PDU2A,PDU2B,PDU3A,PDU3B,KT1,AA1,UAP1,UCP1,AP1,KT3,BB1,KT4) VALUES('$Date_2','$time','$nPDU1A','$nPDU1B','$nPDU2A','$nPDU2B','$nPDU3A','$nPDU3B','$nKT1','$nAA1','$nUAP1','$nUCP1','$nAP1','$nKT3','$nBB1','$nKT4')";
		$res_sql3=$conn->query($sql3);
		if ($res_sql3&&$res_sql1) {
			echo '<script>alert("导入成功！");window.location="addMsg.html"</script>';
		}else{
			echo '<script>alert("出现错误！");window.location="addMsg.html</script>';
			printf("Error: %s\n", mysqli_error($conn));
		}
	}
}else{
	if ($res_sql1) {
		 echo '<script>alert("导入成功！");window.location="addMsg.html"</script>';
	}else{
		echo '<script>alert("出现错误！");window.location="addMsg.html</script>';
		printf("Error: %s\n", mysqli_error($conn));
	}
}


?>