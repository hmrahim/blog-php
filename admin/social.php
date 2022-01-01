<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
  
        <div class="grid_10">

         
                
		
            <div class="box round first grid">
           
                <h2>Update Social Media</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $fb = $_POST["fb"];
                        $tw = $_POST["tw"];
                        $ln = $_POST["ln"];
                        $gp = $_POST["gp"];
      
                       if ( $fb== ''|| $tw== '' || $ln== '' || $gp== '') {

                            echo "Field must not be empty";
                       }else{
                       
                        $query="UPDATE tbl_social SET 
                        fb='$fb',
                        tw='$tw',
                        ln='$ln',
                        gp='$gp'
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
                <div class="block">    
                <?php   
                    $query = "SELECT * FROM tbl_social where id = '1' ";
                    $socialquery = $db->select($query);
                    if ($socialquery) {
                        while ($result= $socialquery->fetch_assoc()) {
                            # code...
                      
                
                ?>           
                 <form action='' method='post'>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value=" <?php echo $result['fb'] ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value=" <?php echo $result['tw'] ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value=" <?php echo $result['ln'] ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value=" <?php echo $result['gp'] ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                      }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php  include("inc/footer.php"); ?>
        