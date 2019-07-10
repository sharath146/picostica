<?php include 'dbconnection.php' ?>
<?php 
	if(!isset($_REQUEST['id']))
	{
		echo "<center><h1>Access Denied!!!</h1></center>";
	}
	else
	{
	$img_id=$_REQUEST['id'];
	mysqli_query($con,"UPDATE image_less SET views=views + 1 WHERE image_id='$img_id'")or die(mysqli_error($con));
	$sql2="SELECT * FROM files WHERE image_id='$img_id'";
	$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
	$trws2=mysqli_fetch_array($result2);
	$sql1="SELECT * FROM image_less WHERE image_id='$img_id'";
	$result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
	$trws1=mysqli_fetch_array($result1);
	$views=$trws1['views'];
	$resolution=$trws1['img_width'].' X '.$trws1['img_height'];
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pic-O-Stica a Stock Photography Website| Single</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="This is stock photography website, Photographers or designers can sell their creations, images, shots, pictures, designs, art works, online in this website and even you can buy, you will be having some amount of money as a reward" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="style/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="style/css/single.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="style/js/jquery.min.js"></script>
<script src="js/menu_jquery.js"></script> 
<script type="text/javascript">
$(document).ready(function () {
	//Disable cut copy paste
	$('body').bind('cut copy paste', function (e) {
		e.preventDefault();
	});
	
	//Disable mouse right click
	$("body").on("contextmenu",function(e){
		return false;
	});
});
</script>
</head>
<body style="margin:0 auto;" alink="white" vlink="white" link="white" ondragstart="return false;" ondrop="return false;">
<div style="background-color: rgba(23,23,31,1);color: white;width: 100%;height: 100px; text-align: center;font-weight: bold; padding: 10px;font-size: 2em;">
	<a href="index.php" style="
	text-decoration: none; color:white;">Home</a>
</div>
	<div class="single">
		<div class="container">
		   <div class="  single_box1">
			 <div class="col-sm-5 single_left">
				<img src="user/<?php echo $trws2['image_path']; ?>" class="img-responsive" alt=""/>
			 </div>
			 <div class="col-sm-7 col_6">
				<ul class="size">
					<li>Price: &#8377;16</li>
				</ul>
				<ul class="size">
					<li>Views: <?php echo $views; ?></li>
				</ul>
				<ul class="size">
					<li>Resolution: <?php echo $resolution; ?></li>
				</ul>
				<a class="btn_3" href="pricing.php">Download this Photo</a>
				<p class="movie_option"><strong>Photo ID : </strong>#<?php echo $trws1['image_id']; ?></p>
				<p class="movie_option"><strong>Upload Date : </strong><?php echo $trws1['upload_date']; ?></p>
			</div>
			<div class="clearfix"> </div>
		  </div>
		   <h4 class="tag_head">Keywords</h4>
	         <ul class="tags_links">
				<li><a href="user/components/search?s=people">People</a></li>
				<li><a href="user/components/search?s=City">City</a></li>
				<li><a href="user/components/search?s=Walking">Walking</a></li>
				<li><a href="user/components/search?s=Modern">Modern</a></li>
				<li><a href="user/components/search?s=Computer">Computer</a></li>
				<li><a href="user/components/search?s=Business">Business</a></li>
				<li><a href="user/components/search?s=Tree">Tree</a></li>
				<li><a href="user/components/search?s=Motion">Motion</a></li>
				<li><a href="user/components/search?s=Gym">Gym</a></li>
				<li><a href="user/components/search?s=Men">Men</a></li>
				<li><a href="user/components/search?s=Fashion">Fashion</a></li>
				<li><a href="user/components/search?s=Industrial">Industrial</a></li>
				<li><a href="user/components/search?s=Interior">Interior</a></li>
				<li><a href="user/components/search?s=Real Estate">Real Estate</a></li>
				<li><a href="user/components/search?s=food">Food</a></li>
		        <li><a href="user/components/search?s=Restaurants">Restaurants</a></li>
				<li><a href="user/components/search?s=Society">Society</a></li>
				<li><a href="user/components/search?s=Traveller">Traveller</a></li>
				<li><a href="user/components/search?s=Mountain">Mountain</a></li>
				<li><a href="user/components/search?s=Sitting">Sitting</a></li>
				<li><a href="user/components/search?s=Discovery">Discovery</a></li>
				<li><a href="user/components/search?s=Activity">Activity</a></li>
				<li><a href="user/components/search?s=Resting">Resting</a></li>
				<li><a href="user/components/search?s=Blue">Blue</a></li>
				<li><a href="user/components/search?s=France">France</a></li>
				<li><a href="user/components/search?s=Architecture">Architecture</a></li>
				<li><a href="user/components/search?s=Europe">Europe</a></li>
				<li><a href="user/components/search?s=Building">Building</a></li>
			 </ul>
	    </div>
	</div>
	</body>
	</html
<?php } ?>