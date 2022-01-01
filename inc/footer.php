
	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <?php 
		  $query = "SELECT * FROM tbl_copyright where id = '1' ";
		  $copyright = $db->select( $query );
		  if ($copyright) {
			 while ($result= $copyright->fetch_assoc()) {
				 
				 # code...
			
	  ?>
	  <p> &copy; Copyright <?php echo $result['copytext'] ?> All Rights Reserved.</p>
	  <?php 
	   }
	}
	  ?>
	</div>