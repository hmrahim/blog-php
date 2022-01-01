<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>

<?php 
$userid =session::get("userId");
$userrole =session::get("userRole");

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name= $_POST['name'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $details= $_POST['details'];
    $error='';
    $succes='';

    if (empty($name) || empty($username) || empty($email) || empty($details)) {
        $error="Field not must be empty";
        
    }else{
        $upquery="UPDATE tbl_user
        SET 
        name='$name',
        usename='$username',
        email='$email',
        details='$details'
         WHERE id='$userid' AND role='$userrole' ";
         $updaterow = $db->update($upquery);
         if ($updaterow ) {
             $succes="Profile Updated succesfully";
         }else{
             $error="Profile not updated";
         }

    }



   
}






?>   


      
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>User Profile</h2>

                <?php 
                    if (isset($succes)) {
                        echo $succes;
                    }
                    if (isset($error)) {
                        echo $error;
                    }
                
                ?>
                <div class="block">

                <?php 
                    $query="SELECT * FROM tbl_user WHERE id='$userid' AND role='$userrole' ";
                    $getuser=$db->select($query);
                    if ($getuser) {
                        while($getresult=$getuser->fetch_assoc()){

                        
                        

                ?>     
              
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $getresult['name'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $getresult['usename'] ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $getresult['email'] ?>" class="medium" />
                            </td>
                        </tr>
                     
                   
                    
                       
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details">
                                <?php echo $getresult['details'] ?>
                                </textarea>
                            </td>
                        </tr>
                       

                        
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Publish" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                                


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


