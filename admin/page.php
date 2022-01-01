<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
      
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                
                <?php 
                    if (!isset($_GET['pageid']) || $_GET['pageid']==NULL ) {
                        header("location:index.php");
                    }else{
                        $id= $_GET['pageid'];
                    }
                ?>
                <div class="block">     
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $title = $_POST["title"];
                        $content = $_POST["body"];
                        if ($title=="" || $content=="") {
                            echo 'Field not must be empty';
                        }else{
                            $query= " UPDATE tbl_pages SET name='$title', content='$content' where id='$id' ";
                            $updatetquery =$db->update($query);
                            if ($updatetquery ) {
                                echo "Page Updated Succesfully ";
                            }else{
                                echo "Page Not Updated";
                            }

                        }
                       

                       
                      



                        
                        
                    }
                ?>         
                <?php 
                    $query = "SELECT * FROM tbl_pages WHERE id='$id'";
                    $selectquery = $db->select($query);
                    if ($selectquery) {
                        while ($result=$selectquery->fetch_assoc()) {
                            # code...
                        
                    
                ?> 
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $result['name'] ?>" class="medium" />
                            </td>
                        </tr>
                     
                       
                   
                    
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                <?php echo $result['content'] ?>
                                </textarea>
                            </td>
                        </tr>
                       

                        <style>
                        .dltbtn{
                            border: 1px solid #ddd;
                            color: #444;
                            cursor: pointer;
                            font-size: 20px;
                            padding: 3px 10px;
                            font-weight:normal;
                            background:#EFEFEF;

                        }
                        </style>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update Page" />
                                <span><a onclick="return confirm('Are You Sure to Delete Page?')" class="dltbtn" href="delete.php?deleteid= <?php echo $result['id'] ?>">Delete Page </a></span>
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


