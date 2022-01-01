<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Set Theme </h2>

               <div class="block copyblock"> 

  <?php 

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $themes = $_POST['theme'];
    if (empty( $themes)) {
        echo'<span class="error">Please select a theme!</span>';
    }else{
        $query = "UPDATE tbl_theme SET name='$themes' where id='1' ";
        $upquery = $db->update($query);
        if ($upquery) {
            echo'<span class="succes">Theme Change succesfully!!</span>';
        }else{
            echo'<span class="Theme not changed</span>';

        }
    }
  
}


 
$selectquery ="SELECT * FROM tbl_theme where id=1";
$theme = $db->select($selectquery);
if ($theme) {
   while ($result=$theme->fetch_assoc()) {
       
       # code...
   

?>


                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input <?php if ($result['name']=='default') {
                                    echo "checked";
                                }?> type="radio" name="theme" value="default" /> Default
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['name']=='green') {
                                    echo "checked";
                                }?> type="radio" name="theme" value="green" /> Green
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['name']=='red') {
                                    echo "checked";
                                }?> type="radio" name="theme" value="red" /> Red
                            </td>
                            
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                    </form>
                            <?php }}else{
                                echo "not checked";
                                }?>
                </div>
            </div>
        </div>
        <?php  include("inc/footer.php"); ?>