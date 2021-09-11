<?php
include "page_heading.php";
?>
	<form method="get" action="page_search.php">
		<table border=1 cellpadding=10>
		<tr>
			<td colspan=4 align=center>Choose A Option	
			<td><input type="radio" name="t1" value="City">City
			<td><input type="radio" name="t1" value="Name">Name
			<td><input type="radio" name="t1" value="Account">Account
		</table>
			<input type="text" name="t2">
			<input type="submit" value="search" name="btn">
	</form>	
	
<?php
	include "page_connect.php";
	
	if(isset($_GET["btn"]))
	{
	$choice=$_GET["t1"];	
	$value=$_GET["t2"];
			
	if($choice=='Account')
	{	
		$s="select * from account where actno='$value'";
		$rs=mysqli_query($con,$s);
		$c=mysqli_num_rows($rs);
		if($c==0)
			echo "<script>alert('RECORD NOT FOUND')</script>";
		else
		{	
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
		}
		echo "</table>";
		}
	}
	else if($choice=='Name')
		{
		$s="select * from  account where firstn like '%$value%'";
		$rs=mysqli_query($con,$s);
		$c=mysqli_num_rows($rs);
		if($c==0)
			echo "<script>alert('RECORD NOT FOUND')</script>";
		else
		{	
		echo "<table border=1 cellpadding=5>";
		echo "<tr><td>Firstn<td>Lastn<td>Account Number<td>Gender<td>Date OF Birth<td>City<td>State<td>Aadhar Number<td>Email Address<td>Contact Number<td>House Address<td>Pincode<td>Picture<td>Pin<td>Balance";	
		
		while($r=mysqli_fetch_array($rs))
		{
			
		echo "<tr>";	
		echo "<td>".$r[1];
		echo "<td>".$r[2];
		echo "<td>".$r[3];
		echo "<td>".$r[4];
		echo "<td>".$r[5];
		echo "<td>".$r[6];
		echo "<td>".$r[7];
		echo "<td>".$r[8];
		echo "<td>".$r[9];
		echo "<td>".$r[10];
		echo "<td>".$r[11];
		echo "<td>".$r[12];
		echo "<td>".$r[17];
		echo "<td>".$r[18];
        echo "<td colspan=2 align='center' ><img src=$r[13] width=100 height=100 style='border-radius:50%'>";		
		}
			echo "</table>";
		}
		}
	else
	    {
		$s="select * from  account where city like '%$value%'";
		$rs=mysqli_query($con,$s);
		$c=mysqli_num_rows($rs);
		if($c==0)
			echo "<script>alert('RECORD NOT FOUND')</script>";
		else
		{	
		echo "<table border=1 cellpadding=5>";
		echo "<tr><td>Firstn<td>Lastn<td>Account Number<td>Gender<td>Date OF Birth<td>City<td>State<td>Aadhar Number<td>Email Address<td>Contact Number<td>House Address<td>Pincode<td>Picture<td>Pin<td>Balance";	
		
		while($r=mysqli_fetch_array($rs))
		{
			
		echo "<tr>";	
		echo "<td>".$r[1];
		echo "<td>".$r[2];
		echo "<td>".$r[3];
		echo "<td>".$r[4];
		echo "<td>".$r[5];
		echo "<td>".$r[6];
		echo "<td>".$r[7];
		echo "<td>".$r[8];
		echo "<td>".$r[9];
		echo "<td>".$r[10];
		echo "<td>".$r[11];
		echo "<td>".$r[12];
		echo "<td>".$r[17];
		echo "<td>".$r[18];
        echo "<td colspan=2 align='center' ><img src=$r[13] width=100 height=100 style='border-radius:50%'>";		
		}
			echo "</table>";
		}
		}
			
	}	
?>	