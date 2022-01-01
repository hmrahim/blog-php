<?php include("inc/header.php"); ?>

<?php 
	if ($_SERVER["REQUEST_METHOD"]=='POST') {
		$fname= $_POST['firstname'];
		$lname= $_POST['lastname'];
		$email= $_POST['email'];
		$messege=$_POST['messege'];
		$error;
		$succes;
		if (empty($fname)) {
			$error='<span style="color:red">First name not must be empty!</span>';
		}elseif (empty($lname)) {
			$error='<span style="color:red">Last name not must be empty!</span>';
		}elseif (empty($email)) {
			$error='<span style="color:red">Email addres not must be empty!</span>';
		}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error='<span style="color:red">Email addres not valid!</span>';
		}else{
			$query = "INSERT INTO tbl_contact(fname,lname,email,messege) VALUES('$fname','$lname','$email','$messege') ";
			$insertquery = $db->insert($query);
			if ($insertquery) {
				$succes='<span style="color:green">Message sent!</span>';
			}else{
				$error='<span style="color:red">Messege not sent!</span>';
			}

			

		}

	}
?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
				if (isset($error)) {
					echo $error;
				}
				?>
				<?php 
				if (isset($succes)) {
					echo $succes;
				}
				?>
				
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="messege"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

 
	</div>
	<?php  include("inc/sidebar.php"); ?>
	<?php  include("inc/footer.php"); ?>