<?php
	include "conn.php";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql="update blog set hits=hits+1 where blogid='$id'";
		$query=mysqli_query($link,$sql);
		if($query){
			$sql="select * from blog where blogid='$id'";
			$query=mysqli_query($link,$sql);
			$rs=mysqli_fetch_array($query);			
		}
			}
?>

<h2><?php echo $rs['title']?></h2>
<li><?php echo $rs['time']?></li><br />
<span>访问量:<?php echo $rs['hits']?></span>
<p><?php echo $rs['content']?></p>
<hr /> 

<form action='view.php' method="post">
	<input type="hidden" name="bid" value="<?php echo $rs['blogid']?>">
	<textarea rows=5 cols=15 name='pl'></textarea><br />
	<input type="submit" name="sub" value="评论">
</form>
<?php
	if(isset($_POST['sub'])){
		$bid=$_POST['bid'];
		$puid=$_COOKIE['id'];
		$pcon=$_POST['pl'];
		$sql="insert into pl(plid,pbid,puid,pcon,ptime) values(null,'$bid','$puid','$pcon',now())";
		$query=mysqli_query($link,$sql);
		if($query){
			echo "<script>location='view.php?id=".$bid."'</script>";
		}else{
			echo "评论失败";
		}
		
	}

?>

<?php 
	
	$sql="select * from pl,user where pl.puid=user.userid and pbid='$id'";
	$query=mysqli_query($link,$sql);
	while($rs=mysqli_fetch_array($query)){
		
		
?>

<p><?php echo $rs['pcon']?></p>
<li><?php echo $rs['ptime']?></li>
<span>评论者:<?php echo $rs['name']?></span>

<?php
	}

