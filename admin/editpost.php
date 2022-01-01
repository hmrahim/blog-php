<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>

<?php 
    if (!isset($_GET['updateid']) || $_GET['updateid']==NULL) {
        header('location:404.php');
        # code...
    }else{
        $updateId =  $_GET['updateid'];
    }

?>
      
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

                       if ( $title== ''|| $cat== ''|| $body== ''||  $author== '') {

                            echo "Fiend must not be empty";
                       }else{
                       if (!empty($file_name)) {
                           # code...
                       
                       
                       if(in_array($file_ext,$permited)===false){
                        echo "you can upload only jpg,jpeg,png,gif";
                    }else{
                        move_uploaded_file($file_tmp, $file_upload);
                        $query="UPDATE tbl_post SET 
                        cat_id='$cat',
                        title='$title',
                        body='$body',
                        image='$file_upload',
                        author='$author',
                        tags='$tags',
                        userid='$userId'
                        WHERE id='$updateId '
                        
                        ";
                        $update_query = $db->update($query);
                        if( $update_query){
                            
                            echo "data updated succesfully";
                        }else{
                            echo "data not updated";
                        }

                       }

                        
                    }else{
                        $query="UPDATE tbl_post SET 
                        cat_id='$cat',
                        title='$title',
                        body='$body',
                        author='$author',
                        tags='$tags',
                        userid='$userId'
                        WHERE id='$updateId '
                        
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

                <?php 
                    $query = "SELECT * FROM tbl_post WHERE id = '$updateId' ";
                    $getpost= $db->select($query);
                    if ($getpost) {
                        while ($getresult=$getpost->fetch_assoc()) {

                            # code...
                        
                    
                
                ?>       
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $getresult['title'] ?>" class="medium" />
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
                                    <option 
                                        <?php 
                                            if ($getresult['cat_id']==$result['id']) {
                                                ?>
                                               selected="selected"
                                          <?php  }
                                        ?>
                                    value="<?php echo $result['id']?>"><?php echo $result['name']?> </option>
                                   
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
                                <img src="<?php echo $getresult['image'] ?>" alt="post image" width="200px" height="100px"> <br>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                <?php echo $getresult['body'] ?>
                                </textarea>
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
                                <input type="text" name="tag" value="<?php echo $getresult['tags'] ?>" class="medium" />
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
                                    <?php }}?>
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


