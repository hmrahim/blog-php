<?php include("inc/header.php")?>
<?php 
	if (!isset($_GET["id"]) || $_GET["id"]==NULL) {

		header("location: 404.php");
	}else{
		$id = $_GET["id"];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php 
				$query = "SELECT * FROM tbl_post WHERE id=$id ";
				$post= $db->select($query);
				if ($post) {
					while ($result= $post->fetch_assoc()) {
						# code...
					
				
			?>
				<h2> <?php echo $result["title"]; ?> </h2>
				<h4><?php echo $fm->formateDate($result['date']) ?></h4>
				<img src="admin/<?php echo $result["image"]; ?>" alt="MyImage"/>
				<p><?php echo $result["body"]; ?></p>
				
				
			<?php } } else{header("location:404.php");} ?>
				
				<div class="relatedpost clear">
				
					<h2>Related articles</h2>
					<?php 
					
					$relatedpost= "SELECT * FROM tbl_post  limit 6 ";
					$relatedquery =$db->select($relatedpost);
					while ($rresult=  $relatedquery->fetch_assoc()) {
						# code...
					
				?>
					
					<a href="post.php?id= <?php echo $rresult["id"]; ?>"><img src="admin/<?php echo $rresult["image"]; ?>" alt="post image"/></a>
					
				<?php  }?>
				</div>
	</div>

		</div>
		<?php include("inc/sidebar.php")?>
	</div>

	<?php include("inc/footer.php")?>