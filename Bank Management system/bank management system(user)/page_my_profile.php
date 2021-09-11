<?php
	include "page_heading.php";
	include "page_connect.php";
	
	//session_start();
	//$uid=$_SESSION["userid"];
	
	$s="select * from account where userid='$uid'";
	$rs=mysqli_query($con,$s);
		$r=mysqli_fetch_array($rs);
		echo "<table border=1 cellpadding=10>"; 
		echo "<tr>";
		echo "<tr><td colspan=2 align=center><img src=$r[13] width=100 height=100 style='border-radius:50%'>";
		echo "<tr><td>Account Number<td>".$r[1];
		echo "<tr><td>Firstn<td>".$r[2];
		echo "<tr><td>Lastn<td>".$r[3];
		echo "<tr><td>Gender<td>".$r[4];
		echo "<tr><td>Date OF Birth<td>".$r[5];
		echo "<tr><td>City<td>".$r[6];
		echo "<tr><td>State<td>".$r[7];
		echo "<tr><td>Aadhar Number<td>".$r[8];
		echo "<tr><td>Email Address<td>".$r[9];
		echo "<tr><td>Contact Number<td>".$r[10];
		echo "<tr><td>House Address<td>".$r[11];
		echo "<tr><td>Pincode<td>".$r[12];	
		echo "<tr><td>Pin<td>".$r[17];	
		echo "<tr><td>Balance<td>".$r[18];	
	
?>
