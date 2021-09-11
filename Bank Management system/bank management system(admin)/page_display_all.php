<?php	
	include "page_connect.php";
	include "page_heading.php";
	
	$s="select * from account";
	$rs=mysqli_query($con,$s);
	echo "<table border=1 cellpadding=10>";
	echo "<tr><td>Account Number<td>Firstn<td>City<td>Email Address<td>Contact Number<td>Picture";
	while($r=mysqli_fetch_array($rs))
	{	
	echo "<tr>";	
		echo "<td>".$r[1];
		echo "<td>".$r[2];
		//echo "<td>".$r[3];
		//echo "<td>".$r[4];
		//echo "<td>".$r[5];
		echo "<td>".$r[6];
		//echo "<td>".$r[7];
		//echo "<td>".$r[8];
		echo "<td>".$r[9];
		echo "<td>".$r[10];
		//echo "<td>".$r[11];
		//echo "<td>".$r[12];
        echo "<td colspan=2 align='center' ><img src=$r[13] width=100 height=100 style='border-radius:50%'>";		
		echo "<td><a href='page_account_delete.php?uid=$r[0]'><img src='delete.png' width=20 height=20></a>";
		echo "<td><a href='page_account_info.php?uid=$r[0]'><img src='show.png' width=20 height=20></a><br>";
	}
?>