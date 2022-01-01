<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
      
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Messege</h2>
                <div class="block">  
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=="POST") {
                       $tomail= $_POST['tomail'];
                       $sentmail= $_POST['sentmail'];
                       $subject= $_POST['subject'];
                       $messege= $_POST['messege'];
                       $sent = mail( $tomail,$subject, $messege);
                       if ($sent) {
                           echo "Messege senr!";
                        
                       }else{
                           echo "Something went wrong";
                       }
                       
                    }
                ?>   
                <?php 
                
                    if (isset($_GET['replyid'])) {
                        $id=$_GET['replyid'];
                        $query = "SELECT * FROM tbl_contact where id='$id' ";
                        $selectquery =$db->select($query);
                        if ( $selectquery) {
                            while($result= $selectquery->fetch_assoc()){

                            
                        
                    
                ?>
                     
                 <form action="" method="post"">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input readonly type="text" name="tomail" value="<?php echo $result['email'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="sentmail" placeholder="Enter Your Email Addres"" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            
                                <label>Subject</label>
                            </td>
                            <td>
                                <input  type="text" name="subject" placeholder="Enter Your Subject" class="medium" />
                            </td>
                        </tr>
                       
                     
                   
                    
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Messege</label>
                            </td>
                            <td>
                                <textarea  class="tinymce" name="messege">
                               
                                </textarea>
                            </td>
                        </tr>
                       

                       

                        
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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


