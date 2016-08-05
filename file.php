<?php
	if(isset($_POST['sub'])){
		$sfile=$_FILES['sfile'];
		$str=$sfile['tmp_name'];
		$hou=$sfile['name'];
		$arr=explode('.',$hou);
		$c=count($arr)-1;
		$arrhou=$arr[$c];
		//echo $arrhou;
		$s="jskdfjksd";
		$num=rand(0,5);
		$na=substr($s,$num,2);
		$name=date(d).$na;
		
		//echo $name;
		//$name='lao'.rand()
		//echo $str;
		$newstr="./upload/".$name.".".$arrhou;
		
		$tt=move_uploaded_file($str,$newstr);
		if($tt){
			echo 123;
		}else{
			echo 234;
		}
		
		
	}
?>


<meta charset='UTF-8'>
<form action="file.php" method="post" enctype="multipart/form-data">
	<input type='file' name='sfile'>
	<input type="submit" name="sub" value="上传">
</form>