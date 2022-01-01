<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
      
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">     
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $title = $_POST["title"];
                        $content = $_POST["body"];
                        if ($title=="" || $content=="") {
                            echo 'Field not must be empty';
                        }else{
                            $query= "INSERT INTO tbl_pages(name,content) VALUES('$title','$content') ";
                            $inertquery =$db->insert($query);
                            if ($inertquery ) {
                                echo "Page Created ";
                            }else{
                                echo "Page Not Creaed";
                            }

                        }
                       

                       
                      



                        
                        
                    }
                ?>          
                 <form action="" method="post">
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
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


