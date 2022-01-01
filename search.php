
<?php include("inc/header.php")?>


<?php 
	if (!isset($_POST["search"]) || $_POST["search"]==NULL) {

		header("location: 404.php");
	}else{
		$search = $_POST["search"];
	}
?>


<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		
		
			<?php 

				$query= "SELECT * FROM tbl_post WHERE title like '%$search%' or body like '%$search%' ";
				$post = $db->select($query);
				if($post){
					while($result=$post->fetch_assoc()){

			?>


			<div class="samepost clear">
				<h2><a href="post.php?id= <?php echo $result["id"];?>"><?php echo $result['title'] ?></a></h2>
				<h4><?php echo $fm->formateDate($result['date']) ?> <a href="#"><?php echo $result['author'] ?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image']?>" alt="post image"/></a>
				<p><?php echo $fm->readmore($result['body']) ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id= <?php echo $result["id"];?>">Read More</a>
				</div>
			</div>
					<?php } }else{echo "post not found";}?>
			
			

		</div>
		<?php include("inc/sidebar.php")?>
	</div>


<?php include("inc/footer.php")?>