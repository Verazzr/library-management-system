<?php
	$num=$_POST['num'];
	$db=mysqli_connect("localhost","root","123","library");
	mysqli_set_charset ($db, "utf8" );

	if($num=="a"){
		$user=$_POST['user'];
		$query="select*from ".$user."";
		$result = mysqli_query($db,$query);
		$rownum=mysqli_num_rows($result);
		for($i=0;$i<$rownum;$i++)
		{
			$row=mysqli_fetch_assoc($result);
			echo "
			<tr>
			<td width='20px'><input type='checkbox' name='checkbox' value=".$row['id']."></td>
			<td width='250px'>".$row['id']."</td><td width='250px'>".$row['password']."</td>
			</tr>";
		}
	}
	if($num=="b"){
		$u=$_POST['u'];
		$p=$_POST['p'];		
		$query="insert into bookadmin(id,password)values('$u','$p')";
		if(mysqli_query($db,$query)){
			echo "sussce!";
		}else{
			echo "id已被占用";
		}
	}

	if($num=="c"){
		$u=$_POST['u'];
		$p=$_POST['p'];
		$query="insert into reader(id,password)values('$u','$p')";
		if(mysqli_query($db,$query)){
			echo "sussce!";
		}else{
			echo "id已被占用";
		}
	}

	if($num=="d"){
		$id=$_POST['id'];
		$arr=explode(',',$id);
		// echo count($arr);
		for($i=0;$i<count($arr)-1;$i++)
		{
			$q_1="delete from reader where id='".$arr[$i]."'";
			mysqli_query($db,$q_1);
			$q_2="delete from bookadmin where id='".$arr[$i]."'";
			mysqli_query($db,$q_2);
			echo "sussce!";
		}
	}

	if($num=="e"){
		$u=$_POST['u'];
		$query="select*from reader where id='".$u."'";
		$result = mysqli_query($db,$query);
		$row=mysqli_fetch_assoc($result);
		echo "
		<tr>
		<td width='20px'><input type='checkbox' name='checkbox' value=".$row['id']."></td>
		<td width='250px'>".$row['id']."</td><td width='250px'>".$row['password']."</td>
		</tr>";
	}
?>