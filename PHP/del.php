<?php
?>

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
  <form action="del.php" method="post">
    <label for="fname">ID</label>
    <input type="text" id="fname" name="e_id" placeholder="Employee ID">
	<input type="submit" value="Submit">
  </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$a=$_POST['e_id'];

$conn = oci_connect('labhesh', 'lab', 'localhost/XE');
if (!$conn) {
    $m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}
	
$stid = oci_parse($conn,"delete from emp where eid='$a'");
oci_execute($stid);

$stid = oci_parse($conn,"commit");
oci_execute($stid);

header("Location:crce.php");

}
?>

</body>
</html>
