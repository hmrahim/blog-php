<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
				<ul>
				<?php 
					$query = "SELECT * FROM tbl_cat ";
					$cat= $db->select($query);
					if ($cat) {
						while ($catresult =  $cat->fetch_assoc()) {
							# code...
					
				?>
					
						<li><a href="posts.php?category= <?php echo $catresult["id"] ?>"><?php echo $catresult["name"] ?></a></li>
												
					
				<?php }}?>
				</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<div class="popular clear">
					<?php 
				$queryp = "SELECT * FROM tbl_post ORDER BY date desc limit 4";
				$post= $db->select($queryp);
				if ($post) {
					while ($result= $post->fetch_assoc()) {
						# code...
					
				
			?>
						<h3><a href="post.php?id=<?php echo $result["id"] ?>"><?php echo $result["title"] ?></a></h3>
						<a href="#"><img src="admin/<?php echo $result["image"] ?>" alt="post image"/></a>
						<p><?php echo $fm->readmore($result["body"],100 )?></p>	
					<?php }}?>
					</div>
					
					
			</div>
			
		</div>