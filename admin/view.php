<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
      
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Messege</h2>
                <div class="block">     
                <?php 
                    if (isset($_GET['viewid'])) {
                        $id=$_GET['viewid'];
                        $query = "SELECT * FROM tbl_contact where id='$id' ";
                        $selectquery =$db->select($query);
                        if ( $selectquery) {
                            while($result= $selectquery->fetch_assoc()){

                            
                        
                    
                ?>
                     
                 <form action="inbox.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input readonly type="text" name="title" value="<?php echo $result['email'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            
                                <label>Name</label>
                            </td>
                            <td>
                                <input readonly type="text" name="title" value="<?php echo $result['fname']." ". $result['lname'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input readonly type="text" name="title" value="<?php echo $fm->formateDate($result['date']) ?>" class="medium" />
                            </td>
                        </tr>
                     
                   
                    
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Messege</label>
                            </td>
                            <td>
                                <textarea  class="tinymce" name="body">
                                <?php echo $result['messege'] ?>
                                </textarea>
                            </td>
                        </tr>
                       

                       

                        
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }}}?>
                </div>
            </div>
        </div>
         <!-- Load TinyMCE -->
 <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <?php  include("inc/footer.php"); ?>


