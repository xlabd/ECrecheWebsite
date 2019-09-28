<!DOCTYPE html>
<html>
<head>
<title>Creche Center</title>
<style>
body {
    background-color: Purple;
    color: black;
    font-size: 80;
    font-family: Roboto;
}

.header {
	font-size: 40;
}

h1 {
    font-size: 90px;
}
h3 {
    font-size: 75px;
}

#serviceBox
{
    width:100%;
    margin: 0 auto;
    margin-top:50px;
    height:300px;
}
.serviceBoxm {
    float:left;
    width:33%;
}


.box{
	transition: background-color 0.5s ease;
    height: 300px;
    background-color: yellow;
    border:0.5px solid #000000;
    border-radius: 25px;
    margin: 5%
}

.box:hover{
	background-color: #BDB76B;
}

.text{
    position: relative;
    top: 25px;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #008CBA;}
</style>
</head>


<body>
<h1 align="center"> Creche Centres in Mumbai</h1>
<br>
<div id="serviceBox"> 
	
	<a href="abc.php?var=1" method="post">
    <div class="serviceBoxm">
        <div class="box">
			<div class="text">
				<h3 align="center">
				<?php
					$conn = oci_connect("hitesh", "hit", "localhost/XE");
					$query = "select address from flag where pivot='0'";
					$stid = oci_parse($conn, $query);
					$r = oci_execute($stid);
					$row = oci_fetch_array($stid, OCI_BOTH);
					echo $row[0];
				?>
				</h3>
			</div>
		</div>
    </div>
	</a>
	
	<a href="abc.php?var=2" method="post">
    <div class="serviceBoxm">
		<div class="box">
			<div class="text">
				<h3 align="center">
				<?php 
					$conn = oci_connect("hitesh", "hit", "localhost/XE");
					$query = "select address from flag where pivot='1'";
					$stid = oci_parse($conn, $query);
					$r = oci_execute($stid);
					$row = oci_fetch_array($stid, OCI_BOTH);
					echo $row[0];
				?>
				</h3>
			</div>
		</div>
	</div>
	</a>
	
	<a href="abc.php?var=3" method="post">
    <div class="serviceBoxm">
        <div class="box">
			<div class="text">
				<h3 align="center">
				<?php 
					$conn = oci_connect("hitesh", "hit", "localhost/XE");
					$query = "select address from flag where pivot='2'";
					$stid = oci_parse($conn, $query);
					$r = oci_execute($stid);
					$row = oci_fetch_array($stid, OCI_BOTH);
					echo $row[0];
				?>
				</h3>
			</div>
		</div>
    </div>
	</a>
</div>
<br><br>

<form action="connec.php">
<div>
	<button class="button button2">click here to logout</button></a>
</div>
</form>

</body>
</html>