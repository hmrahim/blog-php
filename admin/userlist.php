<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
   
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				<?php 
				if (!isset($_GET['deleteid']) || $_GET['deleteid']==NULL) {
					echo 'Something is wrong';
				}else{
					$delid =$_GET['deleteid'];
					$delquery="DELETE FROM tbl_user where id='$delid' ";
					$delete= $db->delete($delquery);
					if ($delete) {
						echo "User deleted Succesfully";
					}else{
						echo "User not deleted";
					}

				}
				
				?>

		    			
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Username</th>
							<th>User Role</th>
							<th>User Email</th>
							<th>Details</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
					
					<?php 
						$query = "SELECT * FROM  tbl_user";
						 $userdata =  $db->select($query);
						 if ( $userdata) {
							 $i=0;
							while ($result=$userdata->fetch_assoc() ) {
								$i++;
						
					?>
					
						<tr class="odd gradeX">
							<td> <?php echo $i ?> </td>
							<td><?php echo $result["name"] ?></td>
							<td><?php echo $result["usename"] ?></td>
							<td><?php

							if ($result["role"]=="1") {
								echo "Admin";
							}elseif ($result["role"]=="2") {
								echo "Author";
							}elseif ($result["role"]=="3") {
								echo "Editor";
							}
							
							?></td>
							<td><?php echo $result["email"]?> </td>
							<td><?php echo $fm->readmore ($result["details"],30)?> </td>
							<td><a href="">View</a> ||<a href="">Edit</a> 
							<?php 
							  if (session::get("userRole")=="1") {
								
							  
							  ?>
							
							|| <a onclick='return confirm("Are you sure to delete user!")' href="?deleteid=<?php echo $result["id"] ?>">Delete</a>
							<?php }?>
							</td>
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


