<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
      
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">     
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $title = $_POST["title"];
                        $cat = $_POST["cat"];
                        $body = $_POST["body"];
                        $author = $_POST["author"];
                        $tags = $_POST["tag"];
                        $userId = $_POST["userId"];
                        $permited = array("jpg","jpeg","png","gif");
                       $file_name = $_FILES['image'] ['name'];
                       $file_size = $_FILES['image'] ['size'];
                       $file_tmp  = $_FILES['image'] ['tmp_name'];
                       $file_folder= "upload/";

                       $div = explode(".",$file_name);
                       $file_ext = strtolower(end($div));
                       $unic_name = substr(md5(time()),1,10).'.'. $file_ext;
                       $file_upload = "upload/".$unic_name;

                       if ( $title== ''|| $cat== ''|| $body== ''|| $file_name== ''|| $author== '') {

                            echo "Fiend must not be empty";
                       }elseif(in_array($file_ext,$permited)===false){
                           echo "you can upload only jpg,jpeg,png,gif";
                       }
                           
                       
                       
                       else{
                        move_uploaded_file($file_tmp, $file_upload);
                        $query ="INSERT INTO tbl_post(cat_id,title,body,image,author,tags,userid)  VALUES('$cat','$title','$body','$file_upload','$author','$tags','$userId) ";
                        $select_query = $db->insert($query);
                        if( $select_query){
                            
                            echo "data inserted succesfully";
                        }else{
                            echo "data not inserted";
                        }

                       }

                      



                        
                        
                    }
                ?>          
                 <form action="addpost.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option value="1">Select Category</option>
                                    <?php 
                                        $query = "SELECT * FROM  tbl_cat";
                                        $catQuery = $db->select($query );
                                        if ( $catQuery) {
                                            while ($result= $catQuery->fetch_assoc()) {
                                      
                                    ?>
                                    <option value="<?php echo $result['id']?>"><?php echo $result['name']?> </option>
                                   
                                    <?php }
                                           
                                        }?>
                                </select>
                            </td>
                        </tr>
                   
                    
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo session::get('username')?>" class="medium" />
                                <input type="text" name="userId" value="<?php echo session::get('userId')?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Tag</label>
                            </td>
                            <td>
                                <input type="text" name="tag" placeholder="Tags" class="medium" />
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


