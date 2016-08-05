<a href="add.php">添加文章</a>
<?php 
	if($_COOKIE['id']){
		$id=$_COOKIE['id'];
		echo "<a href='admin/admin.php'>"."<span>".$_COOKIE['name']." 已登录"."</span>"."</a>";
		echo "<a href='logout.php?id=$id'>".'退出'."</a>";
	}else{
		echo "<a href='login.php'>".'游客'."</a>";
	}
?>

<?php
	include "conn.php";
		//拼写查询语句
		$sql="select * from blog where 1 order by blogid desc";
		$query=mysqli_query($link,$sql);
		//转换出一行数组
		// for($i=0;Si<6;$i++){
			while($rs=mysqli_fetch_array($query)){
		 
?>
<h2><a href="view.php?id=<?php echo $rs['blogid']?>">标题:<?php echo $rs['title']?></a> | <a href="edit.php?id=<?php echo $rs['blogid']?>">编辑</a> |<a href="del.php?id=<?php echo $rs['blogid'] ?>">删除 </a></h2>
<li><?php echo $rs['time']?></li>
<p><?php echo iconv_substr($rs['content'],0,4);?>....</p>

<hr />
<?php
			}

?>
// <?php
			// }
// 
// ?>