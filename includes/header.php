<?php
	//        require("includes/functions.php");
	$connect = connect();
	$sql = 'SELECT * FROM users WHERE email = "'.$_SESSION["user"].'" ';
	$res = mysqli_query($connect,$sql);
	$row  = mysqli_fetch_assoc($res);
	$fname = $row["firstName"];
	$lname = $row["lastName"];
	$Fullname = $fname." ".$lname."";
	if(isset($_SESSION["user"])){
		$wel =  "Welcome ".$Fullname."" ;
	}else{
		header("location:register.php");
	}
	
?>