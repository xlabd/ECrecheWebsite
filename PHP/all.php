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
}	
	
</style>
</head>

<body>


<?php

$conn = oci_connect("labhesh", "lab", "localhost/XE");

$query = 'select * from cre';
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);

print '<table align="center">';
print '<th>Center ID</th>';
print '<th>Center Name</th>';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
      print '<td>'.($item?htmlentities($item):' ').'</td>';
   }
   print '</tr>';
}
print '</table>';
print '<br>';
print '<br>';

$query = 'select * from emp order by cid';
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