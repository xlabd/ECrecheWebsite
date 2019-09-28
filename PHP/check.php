<?php
$usr1=$_POST['uname'];
$pwd1=$_POST['psw'];

$conn = oci_connect($usr1, $pwd1, "localhost/XE");
if (!$conn)
{
	$m = oci_error();
	echo $m['message'], "\n";
	exit;
}
else
{
	$q1="commit";
	if($usr1=="hitesh" || $usr1=="mayur")
	{	$q2= "update flag@hlink set address='Kurla' where pivot='0'";
		$q3= "update flag@hlink set address='Chembur' where pivot='1'";
		$q4= "update flag@hlink set address='Dadar' where pivot='2'";
	}
	else if($usr1=="labhesh" || $usr1=="admin")
	{
		$q2= "update flag@hlink set address='Add' where pivot='0'";
		$q3= "update flag@hlink set address='Display' where pivot='1'";
		$q4= "update flag@hlink set address='Delete' where pivot='2'";
	}
	else
	{
		$q2= "update flag@hlink set address='Thane' where pivot='0'";
		$q3= "update flag@hlink set address='Bandra' where pivot='1'";
		$q4= "update flag@hlink set address='Vikhroli' where pivot='2'";
	}
	 
    $stidc = oci_parse($conn, $q1);
	$stid1 = oci_parse($conn, $q3);
	$stid2= oci_parse($conn, $q4);
	$stid3 = oci_parse($conn, $q2);
	
	oci_execute($stid1);
	oci_execute($stid2);
	oci_execute($stid3);
	oci_execute($stidc);
	
	header("Location:crce.php");
}

?>