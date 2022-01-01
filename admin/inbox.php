<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
   
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">  
				<?php 
					
                    if (isset($_GET['seenid'])) {
						$seenid =$_GET['seenid'];
						$upquery = "UPDATE  tbl_contact SET status='1' where id='$seenid'";
						$seen = $db->update($upquery);
						if ($seen) {
							echo "Messege moved to seen box";
						}
					}

					if (isset($_GET['delid'])) {
						$delid =$_GET['delid'];
						$msg;
						$delquery = "DELETE FROM tbl_contact  where id='$delid'";
						$delete = $db->delete($delquery);
						if ($delete) {
							$msg="Messege deleted succesfuly";
						}else{
							$msg ="Messege not deleted ";
						}
					}
				?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Status</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_contact where status=0  order by date desc";
						$slctqury = $db->select($query);
						if ($slctqury) {
							$i=0;
							while($result= $slctqury->fetch_assoc()){
								$i++;

							
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['fname']." " .$result['lname'] ?></td>
							<td><?php echo $result['email'] ?></td>
							<td><?php echo $fm->readmore ( $result['messege'],50) ?></td>
							<td><?php echo $fm->formateDate($result['date']) ?></td>
							<td><?php echo $result['status'] ?></td>
							<td><a href="view.php?viewid=<?php echo $result['id'] ?>">View</a> || <a href="reply.php?replyid=<?php echo $result['id'] ?>">Reply</a> || <a onclick="return confirm('Are you sure to move this messege to seen box!')" href="?seenid=<?php echo $result['id'] ?>">Seen</a></td>
						</tr>
					<?php }}?>
						
						
					</tbody>
				</table>
               </div>
            </div>









			<div class="box round first grid">
                <h2>Seen Messege </h2></h2>
				<?php 
					if (isset($msg)) {
						echo $msg;
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Status</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_contact where status=1 order by date desc";
						$slctqury = $db->select($query);
						if ($slctqury) {
							$i=0;
							while($result= $slctqury->fetch_assoc()){
								$i++;

							
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['fname']." " .$result['lname'] ?></td>
							<td><?php echo $result['email'] ?></td>
							<td><?php echo $fm->readmore ( $result['messege'],50) ?></td>
							<td><?php echo $fm->formateDate($result['date']) ?></td>
							<td><?php echo $result['status'] ?></td>
							<td><a onclick="return confirm('Are you sure to delete this messege!')" href="?delid=<?php echo $result['id'] ?>">Delete</a></td>
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
        