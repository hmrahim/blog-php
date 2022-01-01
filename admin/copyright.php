<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
     
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>

                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $copyright = $_POST["copyright"];
                        
      
                       if ( $copyright== '') {

                            echo "Field must not be empty";
                       }else{
                       
                        $query="UPDATE tbl_copyright SET 
                        copytext='$copyright'
                        WHERE id='1'
                        
                        ";
                        $update_query = $db->update($query);
                        if( $update_query){
                            
                            echo "data updated succesfully";
                        }else{
                            echo "data not updated";
                        }

                       }
                    }

                ?> 
                <div class="block copyblock"> 
                <?php 
                    $query = "SELECT * FROM tbl_copyright where id='1' ";
                    $slctquer= $db->select( $query);
                    if ($slctquer) {
                        while ($result=$slctquer->fetch_assoc()) {
                            # code...
                       
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value='<?php echo $result['copytext'] ?>' name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php  }
                    }?>
                </div>
            </div>
        </div>
       
        <?php  include("inc/footer.php"); ?>
        