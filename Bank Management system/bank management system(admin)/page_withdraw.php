<?php

include "page_connect.php";
include "page_heading.php";

	if(isset($_GET['btn']))
		{
			$actno=$_GET["t1"];
			$pin=$_GET["t2"];
			$withdraw=$_GET["t3"];
			$date=$_GET["t4"];
			
			
			$s="select balance,pin from account where actno='$actno'";
			$rs=mysqli_query($con,$s);
			$cnt=mysqli_num_rows($rs);
			
			if($cnt!=0)
				{	
					$r=mysqli_fetch_array($rs);
					$balance=$r[0];
					$atmpin=$r[1];
					if($atmpin==$pin)
						{
							if($balance>$withdraw)
								{	
									$balance=$balance-$withdraw;
									$s="insert into trans(actno,withdraw,deposit,date) values('$actno','$withdraw','No Transection','$date')";
									mysqli_query($con,$s);
									$s="update account set balance='$balance' where actno=$actno";
									mysqli_query($con,$s);
									echo "<script>alert('amount Withdraw Successfully')</script>";	
								}
							else
							    echo "<script>alert('You Dont Have Enough Amount To Withdraw')</script>";	
						}
					else 
						echo "<script>alert('Pin Is Incorrect')</script>";	
													
				}
			else
				echo "<script>alert('Account Number Is Incorrect')</script>";
	
		}
?>

<form method="get" action="page_withdraw.php">

	<table border=1 Cellpadding=10>

		<tr>
			<td>Enter Your Account Number
			<td><input type="text" name="t1">
		
		<tr>
			<td>Enter Your Pin
			<td><input type="text" name="t2">
		
		<tr>
			<td>Enter Amount
			<td><input type="text" name="t3">
		
		<tr>
			<td>Enter Date
			<td><input type="date" name="t4">
		
		<tr>	
			<td colspan=2 align="center"><input type="submit" value="Withdraw Money" name="btn">	
			
	</table>

</form>