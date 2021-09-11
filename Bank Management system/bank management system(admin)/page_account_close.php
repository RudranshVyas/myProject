<?php

include "page_connect.php";
include "page_heading.php";

$uid=$_GET['uid'];
$s="delete from account where uid=$uid";
mysqli_query($con,$s);
header("location:page_close_account.php");

?>