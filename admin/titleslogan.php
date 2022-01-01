<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>


   
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $title = $_POST["title"];
                        $slogan = $_POST["slogan"];
                       
                        $permited = array("jpg","jpeg","png","gif");
                       $file_name = $_FILES['logo'] ['name'];
                       $file_size = $_FILES['logo'] ['size'];
                       $file_tmp  = $_FILES['logo'] ['tmp_name'];
                       $file_folder= "upload/";

                       $div = explode(".",$file_name);
                       $file_ext = strtolower(end($div));
                       $unic_name = substr(md5(time()),1,10).'.'. $file_ext;
                       $file_upload = "upload/".$unic_name;

                       if ( $title== ''|| $slogan== '') {

                            echo "Field must not be empty";
                       }else{
                       if (!empty($file_name)) {
                           # code...
                       
                       
                       if(in_array($file_ext,$permited)===false){
                        echo "you can upload only jpg,jpeg,png,gif";
                    }else{
                        move_uploaded_file($file_tmp, $file_upload);
                        $query="UPDATE tbl_header SET 
                        title='$title',
                        slogan='$slogan',
                        logo='$file_upload'
                        WHERE id='1 '
                        
                        ";
                        $update_query = $db->update($query);
                        if( $update_query){
                            
                            echo "data updated succesfully";
                        }else{
                            echo "data not updated";
                        }

                       }

                        
                    }else{
                        $query="UPDATE tbl_header SET 
                        title='$title',
                        slogan='$slogan'
                        
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





                }
                ?>   
                
      
                <div class="block sloginblock">  
                

                <?php 
                    $slctquery = "SELECT * FROM tbl_header WHERE id='1' ";
                    $update = $db->select($slctquery);
                    if ($update) {
                        while ($data=$update->fetch_assoc()) {
                            # code...
                   

                ?>            
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $data['title']?>"  name="title" class="medium" />
                            </td>
                        </tr>
                            <tr>
                                <td>
                                    <label>Website Slogan</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['slogan']?>" name="slogan" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   
                                </td>
                                <td>
                                <img src="<?php echo $data['logo']?>" alt="logo" style=" width:150px; height:100px;  "> 
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Logo</label>
                                </td>
                                <td>
                                    <input type="file"  name="logo" class="medium" />
                                </td>
                            </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php      }
                    }?>
                     
                </div>
               
            </div>
        </div>
        <?php  include("inc/footer.php"); ?>
        