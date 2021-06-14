<?php 
include "db.php";

$f_name=$_POST["f_name"];
$l_name=$_POST["l_name"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$repass=$_POST["repass"];
$mob=$_POST["mob"];
$addr1=$_POST["addr1"];
$addr2=$_POST["addr2"];
$name="/^[A-Z][a-zA-Z]+$/";
$emailregexp="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number="/^[0-9]+$/";

if(empty($f_name) || empty($l_name) || empty($email) || empty($pass) || empty($repass) || empty($mob) || empty($addr1) || empty($addr2)){
	echo "
	<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please filled all the fields...</b>
	</div>";
	exit();
}
else{
	if(!preg_match($name,$f_name)){
		echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b> This $f_name is not valid..!</b>
	</div>";
	exit();
}
if(!preg_match($name,$l_name)){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b> This $l_name is not valid..!</b>
	</div>";
	 exit();
}
if(!preg_match($emailregexp,$email)){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b> This $email address is not valid..!</b>
	</div>";
	exit();
}
if(strlen($pass)<6){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Password is weak..!</b>
	</div>";
	exit();
}
if(strlen($repass)<6){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Password is weak..!</b>
	</div>";
	exit();
}
if($pass != $repass){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Password is not same..!</b>
	</div>";
	exit();
}
if(!preg_match($number, $mob)){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Mobile Number $mob is not valid..!</b>
	</div>";
	exit();
}
$sql="select user_id from user_info where email='$email' LIMIT 1";
$check_query=mysqli_query($con,$sql);
$count_email=mysqli_num_rows($check_query);
if($count_email >0){
	echo "<div class='alert alert-danger'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Email address is already available.Try Another email address...!</b>
	</div>";
	exit();
}
else{
	$pass=md5($pass);
	$sql="INSERT INTO `shopping`.`user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES (NULL, '$f_name', '$l_name', '$email', '$pass', '$mob', '$addr1', '$addr2')";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		echo "<div class='alert alert-success'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>You are registered Successfully...!</b>
	</div>";
	}
}

}


?>