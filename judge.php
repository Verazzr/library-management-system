<?php
	$u=$_POST['u'];
	$p=$_POST['p'];
	$user=$_POST['user'];
	//echo $u,$p,$user;
	if($user==1){
		$user='systemadmin';
	}
	if($user==2){
		$user='bookadmin';
	}
	if($user==3){
		$user='reader';
	}
	$db=mysqli_connect("localhost","root","123","library");
	mysqli_set_charset ($db, "utf8" );
	$query="select*from ".$user." where id='".$u."' and password='".$p."'";
	$result = mysqli_query($db,$query);
	$rownum=mysqli_num_rows($result);
	if($rownum){
		echo $user;
	}else{
		echo 1;
	}
?>