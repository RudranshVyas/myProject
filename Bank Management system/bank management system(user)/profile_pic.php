<?php
	session_start();
	$uid=$_SESSION["userid"];
	
	$s="select * from account where userid='$uid'";
	$rs=mysqli_query($con,$s);
	$r=mysqli_fetch_array($rs);
	echo "<img src=$r[13] width=50 height=50 align=right style='border-radius:50%'>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
?>	