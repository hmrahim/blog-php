<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
     
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%" >No</th>
							<th width="15%" >Post Title</th>
							<th  width="20%">Description</th>
							<th width="10%" >Category</th>
							<th width="10%" >Image</th>
							<th width="5%" >Author</th>
							<th width="10%" >Tegs</th>
							<th width="10%" >Date</th>
							<th width="15%" >Action</th>
						</tr>
					</thead>
					<tbody>

					<?php 
						if (isset($_GET['deleteid'])) {
							$deleteid=$_GET['deleteid'];
							# code...
						
						$deleteQuery ="DELETE FROM tbl_post WHERE id='$deleteid' ";
						$deletepost = $db->delete($deleteQuery);
						if($deletepost){
							echo "data deleted succesfully";
						}
					}

					?>





					<?php 
						$query= "SELECT tbl_post.*,tbl_cat.name FROM tbl_post INNER JOIN tbl_cat ON tbl_post.cat_id = tbl_cat.id ORDER BY tbl_post.title DESC";
						//$query = "SELECT * FROM tbl_post";
						//$query ="SELECT title,body,image,author,tags,date,name FROM `tbl_post` inner join tbl_cat on tbl_post.cat_id = tbl_cat.id";
						// $query ="SELECT title,body,image,author,tags,date,name FROM `tbl_post` inner join tbl_cat on tbl_post.cat_id = tbl_cat.id";

						

						
						$post = $db->select($query);
						if ($post) {
							$i=0;
							while($result= $post->fetch_assoc()){
								$i++;
							
							
					?>
					
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td width=""> <?php echo$fm->readmore( $result['title'],50);?> </td>
							<td> <?php echo $fm->readmore($result['body'],50);?> </td>

							<td> <?php echo $result['name'];?></td>
							
							<td> <img src="<?php echo $result['image'];?>" alt="" width="80px" height="50px"> </td>
							<td> <?php echo $result['author'];?> </td>
							<td> <?php echo $result['tags'];?> </td>
							<td class="center"> <?php echo $fm->formatedate( $result['date']);?></td>
							<td><a href="view.php?<?php echo $result['id'];?>">View</a>
							<?php 
							if (session::get('userId')==$result['userid'] || session::get('userRole')=='1' ) {
								# code...
							
							?>
							 ||<a href="editpost.php?updateid=<?php echo $result['id'];?>">Edit</a> || <a href="?deleteid=<?php echo $result['id'];?>" onclick="return confirm('are you sure to delete data')">Delete</a>
						<?php }?>
							 
							 </td>
						</tr>
							<?php }}?>
						
					</tbody>
				</table>
	
               </div>
            </div>
	  </div>
	          
<script type="text/javascript">

$(document).ready(function () {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();


});
</script>
        <?php  include("inc/footer.php"); ?>
        