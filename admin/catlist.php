<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
   
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

		    			<?php 
						if (isset($_GET['deletecat'])) {
							$dltid = $_GET['deletecat'];
							$query = "DELETE FROM  tbl_cat WHERE id= '$dltid'";
							$deletecat = $db->delete($query);
							if ($deletecat) {
								echo "category deleted succesfully";
								# code...
							}
							# code...
						}
					?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
					
					<?php 
						$query = "SELECT * FROM  tbl_cat";
						 $catdata =  $db->select($query);
						 if ( $catdata) {
							 $i=0;
							while ($result=$catdata->fetch_assoc() ) {
								$i++;
						
					?>
					
						<tr class="odd gradeX">
							<td> <?php echo $i ?> </td>
							<td><?php echo $result["name"] ?></td>
							<td><a href="editcat.php?catid= <?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are You sure to delete data')" href="?deletecat= <?php echo $result['id'] ?>">Delete</a></td>
						</tr>
						<?php }
						 }?>
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


