<?php

include "page_connect.php";
include "page_heading.php";

$uid=$_GET['uid'];
$s="select * from account where uid=$uid";
$rs=mysqli_query($con,$s);
echo "<table border=1 cellpadding=10>";
	while($r=mysqli_fetch_array($rs))
	{
		echo "<tr>";
		echo "<tr><td colspan=2 align='center' ><img src=$r[13] width=100 height=100  style='border-radius:50%'>";
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
		echo "<tr><td colspan=2 align=center><a href='page_display_all.php'>Back</a>";	
	}     
	
	
?>