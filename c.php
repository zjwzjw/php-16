<?php
	include "conn.php";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$d=date('d');
		$pass=$d.'www.laoshan.com';
		$pass1=base64_encode($pass);
		$sql="update usser set pass=$pass1 where userid='$id'";
		$query=mysqli_query($link,$sql);
		if($query){
			header('location:login.php');
		}else{
			echo "修改失败";
		}
		
	}




?>
<a href="c.php?id=1"></a>