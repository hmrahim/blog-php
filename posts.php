
<?php include("inc/header.php")?>




<div class="contentsection contemplete clear">
		<div class="maincontent clear">

					
			<?php
			
				if (!isset($_GET["category"]) || $_GET["category"]==NULL) {

					header("location: 404.php");
				}else{
					
					 $id = $_GET["category"];
					
				
			

				$query= "SELECT * FROM tbl_post WHERE cat_id= $id ";
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
					<?php } } }?>
			
			

		</div>
		<?php include("inc/sidebar.php")?>
	</div>


<?php include("inc/footer.php")?>