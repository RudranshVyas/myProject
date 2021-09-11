<?php

include "page_connect.php";
include "page_heading.php";
//include "profile_pic.php";
	
	if(isset($_POST['btn']))
		{
			$actno=$_POST["t1"];
			$opass=$_POST["t2"];
			$npass=$_POST["t3"];
			$cpass=$_POST["t4"];
			
			
			$s="select userpass from account where actno='$actno'";
			$rs=mysqli_query($con,$s);
			$cnt=mysqli_num_rows($rs);
			
			if($cnt!=0)
				{	
					$r=mysqli_fetch_array($rs);
					$userpass=$r[0];
					if($userpass==$opass)
						{
							if($npass==$cpass)
								{
									$s="update account set userpass='$npass' where actno='$actno'";
									mysqli_query($con,$s);
									echo "<script>alert('Password changed Successfully')</script>";	
								}
							else
							    echo "<script>alert('new password and confirm password are different')</script>";	
						}
					else 
						echo "<script>alert('old Password Is Incorrect')</script>";	
													
				}
			else
				echo "<script>alert('Account Number Is Incorrect')</script>";
	
		}

?>

<form method="post" action="page_change_password.php">

	<table border=1 Cellpadding=10>

		<tr>
			<td>Enter Your Account Number
			<td><input type="text" name="t1">
		
		<tr>
			<td>Enter Old Password
			<td><input type="text" name="t2">
		
		<tr>
			<td>Enter New Password
			<td><input type="text" name="t3">
		
		<tr>
			<td>COnfirm New Password
			<td><input type="text" name="t4">
		
		<tr>	
			<td colspan=2 align="center"><input type="submit" value="Change Password" name="btn">	
			
	</table>

</form>