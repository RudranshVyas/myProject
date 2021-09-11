<?php
	include "page_connect.php";
	include "page_heading.php";
	
	$s="select actno from account order by actno desc";
	$rs=mysqli_query($con,$s);
	$actno=0;
		while($r=mysqli_fetch_array($rs))
		{
			$actno=$r[0];
			break;
		}

	if($actno==0)
		$actno="9673452678";
	else
		$actno=$r[0]+1;

	$s="select pin from account order by pin desc";
	$rs=mysqli_query($con,$s);
	$pin=0;
		while($r=mysqli_fetch_array($rs))
		{
			$pin=$r[0];
			break;
		}


	if($pin==0)
		$pin="1001";
	else
		$pin=$r[0]+1;
 
	if(isset($_POST['btn']))
	{
		$firstn=$_POST["t2"];
		$lastn=$_POST["t3"];
		$gender=$_POST["t4"];
		$dob=$_POST["t5"];
		$city=$_POST["t6"];
		$aadhar=$_POST["t7"];
		$email=$_POST["t8"];
		$phone=$_POST["t9"];
		$address=$_POST["t10"];
		$pincode=$_POST["t11"];
		$userid=$_POST["t12"];
		$userpass=$_POST["t13"];
		
		$source=$_FILES["fp"]["tmp_name"];
		$dest=$_FILES["fp"]["name"];
		
		$source1=$_FILES["fp1"]["tmp_name"];
		$dest1=$_FILES["fp1"]["name"];
		
		if(move_uploaded_file($source,$dest) && move_uploaded_file($source1,$dest1))
		{
			$s="insert into account(actno,firstn,lastn,gender,dob,city,state,aadhar,email,phone,address,pincode,pic,signpic,userid,userpass,pin,balance) values('$actno','$firstn','$lastn','$gender','$dob','$city','Rajasthan','$aadhar','$email','$phone','$address','$pincode','$dest','$dest1','$userid','$userpass','$pin','2000')";
			mysqli_query($con,$s);
			
		}
		header("location:page_new_account.php");
		
		
	}
?>

		<form method="POST" enctype="multipart/form-data" action="page_new_account.php">
			<table border=1 cellpadding=10>
					<tr>
						<td>ACCOUNT NUMBER
						<td><input type="text" name="t1" value="<?php echo $actno ?>" disabled>
					
					<tr>
						<td>ENTER FIRST NAME
						<td><input type="text" name="t2">
						
					<tr>
						<td>ENTER LAST NAME
						<td><input type="text" name="t3">
						
					<tr>
						<td>ENTER GENDER
						<td><input type="radio" name="t4" value="Male">Male	
							<input type="radio" name="t4" value="Female">Female	
					
					<tr>
						<td>ENTER DATE OF BIRTH 
						<td><input type="date" name="t5">
						
					<tr>
						<td>ENTER CITY
						<td><select name="t6">
							<option>Udaipur
							<option>Jaipur
							<option>Jodhpur
							<option>Kota
							<option>Alwar
							<option>Bikaner
							<option>Jaisalmer
							</select>
							
					<tr>
						<td>ENTER AADHAR NUMBER
						<td><input type="text" name="t7">
					
					<tr>
						<td>ENTER EMAIL ADDRESS
						<td><input type="text" name="t8">
						
					<tr>
						<td>ENTER CONTACT NUMBER
						<td><input type="text" name="t9">
						
					<tr>
						<td>ENTER ADDRESS
						<td><input type="text" name="t10">
						
					<tr>
						<td>ENTER PINCODE
						<td><input type="text" name="t11">
					
					<tr>
						<td>SUBMIT PICTURE 
						<td><input type="file" name="fp">
						
					<tr>
						<td>SUBMIT SIGN PICTURE	
						<td><input type="file" name="fp1">
						
					<tr>
						<td>ENTER USER ID
						<td><input type="text" name="t12">	
					
					<tr>
						<td>ENTER PASSWORD
						<td><input type="text" name="t13">
						
					<tr>
						<td colspan=2 align=center>
						<input type="submit" value="CREATE ACCOUNT" name="btn">
				</table>
			</form>
			