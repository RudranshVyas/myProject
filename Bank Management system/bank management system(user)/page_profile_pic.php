<?php
	session_start();
	$uid=$_SESSION["userid"];
	
	$s="select * from account where userid='$uid'";
	$rs=mysqli_query($con,$s);
	$r=mysqli_fetch_array($rs);
	echo "<a href='page_my_profile.php'><img src=$r[13] width=60 height=60 align=right style='border-radius:50%'></a>";
?>	