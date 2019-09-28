<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=integer], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 20%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	position: absolute;
	left: 28%;
	top: 10%;
}
body {
	background-color: purple
}
</style>
<body>

<div style="width:40%;">
  <form action="add.php" method="post">
    <label for="fname">ID</label>
    <input type="text" id="fname" name="e_id" placeholder="Employee ID">
	<label for="fname">Name</label>
    <input type="text" id="fname" name="fir" placeholder="Employee name">
	<label for="fname">Designation</label>
    <input type="text" id="fname" name="des" placeholder="Employee Designation">
    <label for="country">Center</label>
    <select id="country" name="cen">
      <option value="1">Thane</option>
      <option value="2">Bandra</option>
      <option value="3">Vikhroli</option>
	  <option value="4">Kurla</option>
      <option value="5">Chembur</option>
      <option value="6">Dadar</option>
    </select>
      <label for="fname">Salary</label>
    <input type="integer" id="fname" name="sal" placeholder="Employee Salary">
    <input type="submit" value="Submit">
  </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$a=$_POST['e_id'];
$b=$_POST['fir'];
$c=$_POST['des'];
$d=$_POST['cen'];
$e=$_POST['sal'];

$conn = oci_connect('labhesh', 'lab', 'localhost/XE');
if (!$conn) {
    $m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}
	
$stid = oci_parse($conn,"INSERT INTO emp VALUES(:id_e, :nm_e, :des_e, :cen_e, :sal_e)");

oci_bind_by_name($stid, ":id_e", $a);
oci_bind_by_name($stid, ":nm_e", $b);
oci_bind_by_name($stid, ":des_e", $c);
oci_bind_by_name($stid, ":cen_e", $d);
oci_bind_by_name($stid, ":sal_e", $e);
oci_execute($stid);

$stid = oci_parse($conn,"commit");
oci_execute($stid);

header("Location:crce.php");
}
?>

</body>
</html>
