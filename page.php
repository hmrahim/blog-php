<?php include("inc/header.php"); ?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php 
	if (!isset($_GET['pageid']) || $_GET['pageid']==NULL ) {
		header("location:404.php");
	}else{
		$id=$_GET['pageid'];
	}
	?>
		
			<div class="about">
			<?php
		$query = "SELECT * FROM tbl_pages WHERE id='$id' ";
		$pagequery= $db->select($query);
		if ($pagequery) {
			while ($result= $pagequery->fetch_assoc()) {
				# code...
			
		

	?>

				<h2><?php echo $result['name']?></h2>
	
				<p><?php echo $result['content']?></p>
			<?php }}?>

	</div>

		</div>
		<?php  include("inc/sidebar.php"); ?>
	</div>

	<?php  include("inc/footer.php"); ?>