


<?php include("lib/database.php")?>
<?php include("helpers/formate.php")?>
<?php include("config/config.php")?>

<?php

$db = new database();
$fm = new formate();

?>
<?php 
	$pagetitle = "SELECT * FROM tbl_header";
	$pagetitlequery = $db->select($pagetitle);
	if ($pagetitlequery) {
		while ($pagetitleresult = $pagetitlequery->fetch_assoc()) {
			 
			# code...
		
?>


<!DOCTYPE html>
<html>
<head>
<?php 
if (isset($_GET['pageid'])) {
	$titleid=$_GET['pageid'];
	$titlequery="SELECT * FROM tbl_pages where id='$titleid' ";
	$title=$db->select($titlequery);
	if ($title) {
		while ($titleresult=$title->fetch_assoc()) {
			
		
	

	?>
	<title> <?php echo $titleresult['name']?> - <?php echo $pagetitleresult['title']?> </title>
	<?php 
	}}}elseif(isset($_GET['id'])) {
		$post =$_GET['id'];
		$titlequery="SELECT * FROM tbl_post where id='$post' ";
		$title=$db->select($titlequery);
		if ($title) {
			while ($titleresult=$title->fetch_assoc()) {
				
			
		
	
		?>
		<title> <?php echo $titleresult['title']?> - <?php echo $pagetitleresult['title']?> </title>
		<?php 
		}}}
	
	else{
		?>
		<title> <?php echo $fm->title(); ?> - <?php echo $pagetitleresult['title']?> </title>
		<?php

	}
	?>
	<?php }
	}?>





	

		
	

	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<?php 

		$themequery ="SELECT * FROM tbl_theme where id=1 ";
		$theme =$db->select($themequery);
		if ($theme ) {
			while($result =$theme ->fetch_assoc()){
				if ($result['name']=='default') {

					?>
					<link rel="stylesheet" href="script/default.css">
					<?php 
				}elseif ($result['name']=='green') {
					?>
					<link rel="stylesheet" href="script/green.css">
					<?php 
					# code...
				}
			}
			}
			
	
	?>
	
	<!-- <?php include("script/css.php")?> -->
	

	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>

	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
			<?php 
$query = "SELECT * FROM tbl_header WHERE id='1' ";
$data = $db->select($query);
if ($data) {
	while ($result= $data->fetch_assoc()) {
		
	

?>
				<img src="admin/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p><?php echo $result['slogan'];?></p>
			</div>
			<?php }
}?>
		</a>
		<div class="social clear">
			<div class="icon clear">
			<?php 
				$query = "SELECT * FROM tbl_social where id='1' ";
				$selectquery =  $db->select($query);
				if ($selectquery) {
					while ($sociallink =$selectquery->fetch_assoc() ) {
				
			?>	
				<a href="<?php echo $sociallink['fb'] ?> " target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $sociallink['tw'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $sociallink['ln'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $sociallink['gp'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php 
						
					}
				}
				?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="POST">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
<?php 
	$path= $_SERVER["SCRIPT_FILENAME"];
	$correntpage= basename($path,".php");
?>
	<ul>
		<li><a 
		<?php if ($correntpage=="index") {
			echo 'id="active"';
		}?>
		 href="index.php">Home</a></li>
		<?php 
	$query = "SELECT * FROM tbl_pages";
	$page = $db->select($query);
	if ($page ) {
		while ($pageresult = $page->fetch_assoc()) {
			# code...
		
	
?>

		<li><a
			<?php 
				if (isset($_GET['pageid']) && $_GET['pageid']==$pageresult['id']) {
					echo 'id="active"';
				}
			?>
		 href="page.php? pageid=<?php echo $pageresult['id']?>"> <?php echo $pageresult['name']?> </a></li>	
<?php }}?>
		<li><a <?php if ($correntpage=="contact") {
			echo 'id="active"';
		}?> href="contact.php">Contact</a></li>
	</ul>
</div>