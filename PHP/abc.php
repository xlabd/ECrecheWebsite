<html>
<head>
<style>
table {
    border-collapse: collapse;
	border: 1px solid black;
}

th {
    border: 1px solid black;
	width: 20%;
	padding: 5px 20px;
	background-color: yellow;
    color: black;
	font-size: 25;
	text-align: left
}

td {
    border: 1px solid black;
	width: 20%;
	padding: 2px 20px;
	font-size: 20;
}

tr:nth-child(even) {
	background-color: #f2f2f2;
}

tr:nth-child(odd) {
	background-color: #ffffff;
}

body{
	background-color: Purple;
    color: black;
    font-family: Roboto;
	font-size:40;
}

h1 {
    font-size: 70px;
}
</style>
</head>

<body>

<br><br>

<?php
	$conn = oci_connect("hitesh", "hit", "localhost/XE");
	$variable = $_GET['var'];
	
	$query = "select address from flag where pivot='0'";
	$stid = oci_parse($conn, $query);
	$r = oci_execute($stid);
	$a = oci_fetch_array($stid, OCI_BOTH);
	//echo $a[0];
	$query = "select address from flag where pivot='1'";
	$stid = oci_parse($conn, $query);
	$r = oci_execute($stid);
	$b = oci_fetch_array($stid, OCI_BOTH);
	//echo $b[0];
	$query = "select address from flag where pivot='2'";
	$stid = oci_parse($conn, $query);
	$r = oci_execute($stid);
	$c = oci_fetch_array($stid, OCI_BOTH);
//	echo $c[0];
	
	switch($variable)
	{
		case 1:
		if($a[0]=='Thane')
		{
			print '<h1 align="center">Creche Center: Thane</h1>';
			$query = 'select * from emp1@slink order by eid';
		}
		else 
		{
			if($a[0]=='Kurla')
			{
				print '<h1 align="center">Creche Center: Kurla</h1>';
				$query = 'select * from emp1@hlink order by eid';
			}
			else
			{
			header("Location:add.php");
			}
		}
		break;
		case 2:
		if($b[0]=='Bandra')
		{
			print '<h1 align="center">Creche Center: Bandra</h1>';
			$query = 'select * from emp2@slink order by eid';
		}
		if($b[0]=='Chembur')
		{
			print '<h1 align="center">Creche Center: Chembur</h1>';
			$query = 'select * from emp5@hlink order by eid';
		}
		if($b[0]=='Display')
		{
			header("Location:all.php");
		}
		break;
		case 3:
		if($c[0]=='Vikhroli')
		{
			print '<h1 align="center">Creche Center: Vikhroli</h1>';
			$query = 'select * from emp3@slink order by eid';
		}
		else
		{
			if($c[0]=='Dadar')
			{
				print '<h1 align="center">Creche Center: Dadar</h1>';
				$query = 'select * from emp6@hlink order by eid';
			}
			else
			{
				header("Location:del.php");
			}
		}
		break;
	}
	
	$stid = oci_parse($conn, $query);
	$r = oci_execute($stid);

	print '<table align="center">';
	print '<th>ID</th>';
	print '<th>Name</th>';
	print '<th>Designation</th>';
	print '<th>Center</th>';
	print '<th>Salary</th>';

	while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
		print '<tr>';
		foreach ($row as $item) {
			print '<td>'.($item?htmlentities($item):' ').'</td>';
		}
		print '</tr>';
	}
	print '</table>';
	oci_close($conn);

?>
</body>
</html>