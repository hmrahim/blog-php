<?php include("inc/header.php"); ?>
<?php  include("inc/sidebar.php"); ?>
<?php 
                if (session::get("userRole")!=="1") {
                  //  header("location:index.php");
             echo" <script>window.location='index.php';</script>";
                }
                
                ?>

        
        <div class="grid_10">
      	
            <div class="box round first grid">
                <h2>Add New Category</h2>

               <div class="block copyblock"> 

  <?php 
  

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    if(empty($username) || empty($password) || empty($role) || empty($name) || empty($email)){
        echo'<span class="error">Field not must be empty!</span>';
    }else{
        $userquery =  "SELECT * FROM tbl_user where usename='$username'  limit 1";
        $checkuser= $db->select( $userquery);
        if ( $checkuser!=false) {
            echo'<span class="error">Username already exist!</span>';
        } else{
            $mailquery =  "SELECT * FROM tbl_user where email='$email'  limit 1";
            $checkmail= $db->select( $mailquery);
            if ($checkmail!=false) {
                echo'<span class="error">Email already exist!</span>';
            }else{
                $rolequery =  "SELECT * FROM tbl_user where role='$role '  limit 1";
                $checrole= $db->select( $rolequery);
                if ($checrole!=false) {
                    echo'<span class="error">User role  already exist!</span>';
                }else{
                    $query = "INSERT INTO  tbl_user(name,usename, password,email,role) VALUES('$name','$username','$password','$email','$role')";
                    $userquery = $db->insert($query);
                    if ($userquery) {
                        echo'<span class="succes">User data inserted succesfully!!</span>';
                    }else{ 
                        echo'<span class="error">User data not inserted!</span>';
                    }

                }





               
            }





           
        }
    }
    
    
    
    
    
    
   
    # code...
}
?>


                 <form action="" method="post">
                    <table class="form">	
                    <tr>
                        <td>
                        <label for="name">Name</label>
                        </td>

                            <td>
                                <input type="text" name="name" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>				
                        <tr>
                        <td>
                        <label for="category">Username</label>
                        </td>

                            <td>
                                <input type="text" name="username" placeholder="Enter Username..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                        <td>
                        <label for="category">Email Addres</label>
                        </td>

                            <td>
                                <input type="text" name="email" placeholder="Enter Your Email Addres..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                        <td>
                        <label for="password">User password</label>
                        </td>

                            <td>
                                <input type="text" name="password" placeholder="Enter User Password" class="medium" />
                            </td>
                        </tr>


                        <tr>
                        <td>
                        <label for="role">User Role</label>
                        </td>

                            <td>
                                <select style='width:55%' name="role" >
                                    <option value="">Select User Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Author</option>
                                    <option value="3">Editor</option>
                                </select>
                            </td>
                        </tr>



						<tr> 
                        <td></td>

                        
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php  include("inc/footer.php"); ?>