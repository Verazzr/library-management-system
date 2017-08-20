<?php
	$num=$_POST['num'];
	$db=mysqli_connect("localhost","root","123","library");
	mysqli_set_charset ($db, "utf8" );
	if($num=="z"){
		$user = $_POST['u'];
		$query="select*from borrow where readerID='".$user."'";
		$result = mysqli_query($db,$query);
		$rownum=mysqli_num_rows($result);
		if($rownum){
			for($i=0;$i<$rownum;$i++){
				$row=mysqli_fetch_assoc($result);
				$query_1="select*from book where bookNum='".$row['bookNum']."'";//查图书表，获取此书号对应书籍信息
				$r = mysqli_query($db,$query_1);
				$row_1=mysqli_fetch_assoc($r);
				echo "<tr>
				<td width='200px'>".$row_1['bookNum']."</td><td width='200px'>".$row_1['bookname']."</td>
				<td width='200px'>".$row_1['author']."</td><td width='200px'>".$row['date']."</td>
				</tr>";
			}
		}else{
			echo "暂无借阅书籍信息";
		}

	}

	if($num=="e"){
		$u=$_POST['u'];
		$query="select*from book where bookname='".$u."'";
		$result = mysqli_query($db,$query);
		$rownum=mysqli_num_rows($result);
		if($rownum){  //如果有这本书，就输出图书信息，并检查是否被借阅
			for($i=0;$i<$rownum;$i++)
			{

				$row=mysqli_fetch_assoc($result);
				$query="select*from borrow where bookNum='".$row['bookNum']."'";
				$r = mysqli_query($db,$query);
				$rnum=mysqli_num_rows($r);
				if($rnum){//如果借阅表有信息，就显示这本书被借
					echo "<tr>
					<td width='250px'>".$row['bookNum']."</td><td width='250px'>".$row['bookname']."</td>
					<td width='250px'>".$row['author']."</td><td width='250px'>已借出</td>
					</tr>";
				}else{
					echo "<tr>
					<td width='250px'>".$row['bookNum']."</td><td width='250px'>".$row['bookname']."</td>
					<td width='250px'>".$row['author']."</td><td width='250px'>可借阅</td>
					</tr>";					
				}
			}
		}else{
			echo "暂无此书信息";
		}
	}

	if($num=="a"){
		$u=$_POST['user'];
		$query="select*from ".$u."";
		$result = mysqli_query($db,$query);
		$rownum=mysqli_num_rows($result);
		for($i=0;$i<$rownum;$i++)
		{
			$row=mysqli_fetch_assoc($result);
			if($u=="book"){
				echo "<tr>
				<td width='250px'>".$row['bookNum']."</td><td width='280px'>".$row['bookname']."</td>
				<td width='280px'>".$row['author']."</td>
				</tr>";
			}
		}
	}	
?>