<?php
include "page_heading.php";
include "page_connect.php";
//include "page_profile_pic.php";
?>
<form method="get" action="page_balance.php">

	Enter The Pin
	<input type="text" name="t1">
	<input type="submit" name="btn" value="check balance">
</form>
<?php
$pin=$r[17];
$balance=$r[18];
if(isset($_GET['btn']))
	{
		$t1=$_GET['t1'];
		
		if($pin==$t1)
			{
				echo "Your Account Balance Is ".$balance;
			}
		else
			echo "<script>alert('Pin Is Incorrect')</script>";	
	}
?>

