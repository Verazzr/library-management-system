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
			if($user=="book"){
				echo "<tr>
				<td width='20px'><input type='checkbox' name='checkbox' value=".$row['bookNum']."></td>
				<td width='250px'>".$row['bookNum']."</td><td width='250px'>".$row['bookname']."</td>
				<td width='250px'>".$row['author']."</td>
				</tr>";
			}
			/*if($user=="borrow"){
				echo "<tr>
				<td width='20px'><input type='checkbox' name='checkbox' value=".$row['bookNum']."></td>
				<td width='250px'>".$row['readerID']."</td><td width='250px'>".$row['bookNum']."</td>
				<td width='250px'>".$row['date']."</td>
				</tr>";
			}*/
			if($user=="borrow"){
				$q_1="select*from book where bookNum='".$row['bookNum']."'";
				$r = mysqli_query($db,$q_1);
				$row_1=mysqli_fetch_assoc($r);		
				echo "<tr>
				<td width='20px'><input type='checkbox' name='checkbox' value=".$row['bookNum']."></td>
				<td width='200px'>".$row['readerID']."</td><td width='200px'>".$row['bookNum']."</td>
				<td width='200px'>".$row_1['bookname']."</td>
				<td width='200px'>".$row_1['author']."</td>
				<td width='200px'>".$row['date']."</td>
				</tr>";
			}			
		}
	}
	if($num=="b"){
		$u=$_POST['u'];
		$p=$_POST['p'];
		$a=$_POST['a'];	
		$query="insert into book(bookNum,bookname,author)values($u,'$p','$a')";
		if(mysqli_query($db,$query)){
			echo "sussce!";
		}else{
			echo "输入信息有误，无法添加";
		}
	}

	/*if($num=="c"){
		$u=$_POST['u'];
		$p=$_POST['p'];
		$a=$_POST['a'];
		$query="insert into borrow(readerID,bookNum,date)values('$u',$p,'$a')";
		mysqli_query($db,$query);
		echo "sussce!";
	}*/

	if($num=="c"){
		$u=$_POST['u'];
		$p=$_POST['p'];
		$a=$_POST['a'];
		$query_1="select*from book where bookNum='".$p."'";//先查图书表，看时候存在这个这本书
		$r = mysqli_query($db,$query_1);
		$rnum=mysqli_num_rows($r);
		if($rnum){//如果存在这本书，就添加借阅表
			$query_2="insert into borrow(readerID,bookNum,date)values('$u',$p,'$a')";
			if(mysqli_query($db,$query_2)){
				echo "sussce!";
			}else{
				echo "输入信息错误，无法借阅";
			}
		}else{
			echo "暂无此书信息，无法借阅";
		}
	}

	/*if($num=="d"){
		$id=$_POST['id'];//id即要删除的bookNum
		$arr=explode(',',$id);
		// echo count($arr);
		for($i=0;$i<count($arr)-1;$i++)
		{
			$q_1="delete from book where bookNum='".$arr[$i]."'";
			mysqli_query($db,$q_1);
			$q_2="delete from borrow where readerID='".$arr[$i]."'";
			mysqli_query($db,$q_2);
			echo "sussce!";
		}
	}*/
	if($num=="d"){
		$id=$_POST['id'];//id即要删除的bookNum
		$tag=$_POST['tag'];
		$arr=explode(',',$id);
		// echo count($arr);
		for($i=0;$i<count($arr)-1;$i++)//对于每一个书号，应该先去查询是否存在借阅表
		{
			if($tag==1){ //删除图书信息，将图书信息和借阅信息全部删除
				$q_1="delete from book where bookNum='".$arr[$i]."'";
				mysqli_query($db,$q_1);
				$q_2="delete from borrow where bookNum='".$arr[$i]."'";
				mysqli_query($db,$q_2);
				echo "成功删除图书信息";
			}
			if($tag==2){ //删除借阅信息
				$q_3="delete from borrow where bookNum='".$arr[$i]."'";
				mysqli_query($db,$q_3);
				echo "成功删除借阅信息";
			}
			/*if($rnum){  //若在借阅表，即既在图书表也在借阅表，就删除借阅信息和图书信息
				$q_1="delete from book where bookNum='".$arr[$i]."'";
				mysqli_query($db,$q_1);
				$q_2="delete from borrow where bookNum='".$arr[$i]."'";
				mysqli_query($db,$q_2);			
			}else{     //若不在借阅表，即只在图书表，就删除图书信息
				$q_3="delete from borrow where bookNum='".$arr[$i]."'";
				mysqli_query($db,$q_3);	
			}*/
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
					<td width='20px'><input type='checkbox' name='checkbox' value=".$row['bookNum']."></td>
					<td width='250px'>".$row['bookNum']."</td><td width='250px'>".$row['bookname']."</td>
					<td width='250px'>".$row['author']."</td><td width='250px'>已借出</td>
					</tr>";
				}else{
					echo "<tr>
					<td width='20px'>N</td>
					<td width='250px'>".$row['bookNum']."</td><td width='250px'>".$row['bookname']."</td>
					<td width='250px'>".$row['author']."</td><td width='250px'>可借阅</td>
					</tr>";					
				}
			}
		}else{
			echo "暂无此书信息";
		}
	}
?>