<?php

include "page_connect.php";
include "page_heading.php";
//include "page_profile_pic.php";
	
	if(isset($_GET['btn']))
		{
			$actno=$r[1];
			$ractno=$_GET["t2"];
			$amount=$_GET["t3"];
			$date=$_GET["t4"];
			
			$s="select balance from account where actno='$actno'";
			$rs=mysqli_query($con,$s);
			$cnt=mysqli_num_rows($rs);
			
			if($cnt!=0)
				{	
					$r=mysqli_fetch_array($rs);
					$balance=$r[0];
					
					$s="select balance from account where actno='$ractno'";
					$rs=mysqli_query($con,$s);
					
					$cnt=mysqli_num_rows($rs);
					
					if($cnt!=0)
						{
							$r=mysqli_fetch_array($rs);
							$rbalance=$r[0];
								if($balance>=$amount)
								{
									$rbalance=$rbalance+$amount;
									$s="update account set balance='$rbalance' where actno='$ractno'";
									mysqli_query($con,$s);
									$balance=$balance-$amount;
									$s="update account set balance='$balance' where actno='$actno'";
									mysqli_query($con,$s);
									$s="insert into trans(actno,withdraw,deposit,date) values('$actno','$amount','No Transection','$date')";
									mysqli_query($con,$s);
									$s="insert into trans(actno,withdraw,deposit,date) values('$ractno','No Transection','$amount','$date')";
									mysqli_query($con,$s);
							
									echo "<script>alert('Amount Transfered Successfully')</script>";	
								}	
							else
								echo "<script>alert('Insufficient Amount')</script>";	
						}	
					else	
						echo "<script>alert('Recievers Account Number Is Incorrect')</script>";
				}	
			else
				echo "<script>alert('Account Number Is Incorrect')</script>";
	
		}
?>

<form method="get" action="page_transfer.php">

	<table border=1 Cellpadding=10>
		<tr>
			<td>Enter Recievers Account Number
			<td><input type="text" name="t2">
		
		<tr>
			<td>Enter Amount
			<td><input type="text" name="t3">
			
		<tr>
			<td>Enter Date
			<td><input type="date" name="t4">
			
		<tr>	
			<td colspan=2 align="center"><input type="submit" value="Transfer Money" name="btn">	
			
	</table>

</form>