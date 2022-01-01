<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>

               <div class="block copyblock"> 
<?php 

     if (!isset($_GET['catid']) || $_GET['catid']== NULL) {
         header("location:catlist.php");
        
     }else{
           $catid =$_GET['catid'];
     }
?>

  <?php 

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $category = $_POST['category'];

    if (empty($category)) {
      echo'<span class="error">field not must be empty</span>';
}else{
      $query = "UPDATE tbl_cat SET name= '$category' WHERE id= $catid ";
     $updated = $db->update($query);
     if ($updated) {
          echo'<span class="succes">Category Updated!!</span>';
     }
}
  
}
?>

<?php 
      $query = "SELECT * FROM  tbl_cat WHERE id='$catid' order by id desc ";
      $selectquery =$db->select($query);
     
            while ($result = $selectquery->fetch_assoc()) {
            

?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="category" value="<?php echo $result['name'] ;?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value=" Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php }?>

                </div>
            </div>
        </div>
        <?php  include("inc/footer.php"); ?>