<?php	
	include "page_connect.php";
	include "page_heading.php";
	//include "profile_pic.php";
	
	$s="select actno from account where userid='$uid'";
	$rs=mysqli_query($con,$s);
	$r=mysqli_fetch_array($rs);
	$actno=$r[0];
	$s="select *from trans where actno='$actno'";
	$rs=mysqli_query($con,$s);		
	echo "<tr><td><table border=1 cellpadding=10>";
	echo "<tr><td>Account Number<td>Withdraw<td>Deposit<td>Date";
	while($r=mysqli_fetch_array($rs))
		{	
		echo "<tr>";	
		echo "<td>".$r[1];
		echo "<td>".$r[2];
		echo "<td>".$r[3];
		echo "<td>".$r[4];
		}		
		echo "</table>";
?>