
<?php 
include("../lib/session.php");
session::init();

?>
<?php include("../config/config.php")?>
<?php include("../lib/database.php")?>
<?php include("../helpers/formate.php")?>


<?php

$db = new database();
$fm = new formate();

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	<?php 
		if ($_SERVER["REQUEST_METHOD"]=="POST") {
			$username = $fm->validation( $_POST["username"]);
			$email = $fm->validation( $_POST["email"]);
			$password = $fm->validation(md5($_POST["password"]));
			$username = mysqli_real_escape_string($db->link,$username);
			$email = mysqli_real_escape_string($db->link,$email);
			$password = mysqli_real_escape_string($db->link,$password);

			$query = "SELECT * FROM tbl_user WHERE usename='$username ' AND password= '$password' ";
			$result = $db->select($query);
			if($result !=false){
				//$value= mysqli_fetch_array($result);
				$value= $result->fetch_assoc();
			
					session::set("login",true);
					session::set("username",$value["usename"]);
					session::set("userId",$value["id"]);
					session::set("userRole",$value["role"]);
					header("location:index.php");

			

			}else{$error= "<span style='color:red; font-size:15px;margin-bottom:10px;'>username or password not match!!</span>"; }
		}
	

	?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username"  name="username"/>
				<input type="hidden" placeholder="Username"  name="email"/>

			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<?php
			if (isset($error)) {
				echo $error;
				# code...
			}
		?>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>