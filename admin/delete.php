<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
      
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php 
                    if (!isset($_GET['deleteid']) || $_GET['deleteid']==NULL ) {
                        header('location:index.php');
                       
                        
                    }else{
                        $deleteid = $_GET['deleteid'];
                        
                            $query= " DELETE FROM tbl_pages where id='$deleteid' ";
                            $deletequery =$db->delete($query);
                            if ($deletequery ) {
                                
                                echo "Page Deleted Succesfully ";
                                
                              
                                
                            }else{
                                echo "Page Not Deleted";
                            }

                        }
                    
                ?>
               
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


