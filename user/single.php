<?php session_start(); 
error_reporting(false);
if(!isset($_SESSION['user_username']))
{
	echo "<center><h1>Access Denied!!!</h1></center>";
}
else
{
?>
<?php 
	//file containing Connection String
	include 'database/dbconnection.php';
	//Query to Retrieve USER ID
	$sql4=mysqli_query($con,"SELECT user_id FROM user WHERE uname='$_SESSION[user_username]'") or die(mysqli_error($con));
	$rws3=mysqli_fetch_array($sql4);
	$img_id=$_REQUEST['id'];
	//Count the Number of Image Views
	mysqli_query($con,"UPDATE image_less SET views=views + 1 WHERE image_id='$img_id'")or die(mysqli_error($con));
	//Query to get the image path to Watermarked Images
	$sql2="SELECT * FROM files WHERE image_id='$img_id'";
	$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
	$rws2=mysqli_num_rows($result2);
	if($rws2>0)
	{
	$trws2=mysqli_fetch_array($result2);
	//Query to get the descriptions of the Image
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
<link href="../style/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="../style/css/single.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../style/js/jquery.min.js"></script>
<script src="../js/menu_jquery.js"></script> 
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
<body alink="white" vlink="white" link="white" ondragstart="return false;" ondrop="return false;">
<div style="background-color: rgba(23,23,31,1);color:white;width: 100%;height:100px;"><br>
<a href="index.php" style="text-align: center;text-decoration-color: none;font-family: Century Gothic,'serif';font-weight: bolder;font-size: 30px;">Pic-O-Stica</a>
</div>
	<div class="single">
		<div class="container">
		   <div class="  single_box1">
			 <div class="col-sm-5 single_left">
				<img src="<?php echo $trws2['image_path']; ?>" class="img-responsive" alt=""/>
			 </div>
			 <div class="col-sm-7 col_6">
				<ul class="size">
					<li>Price: &#8377;16</li>
				</ul>
				<ul class="size">
					<li>Views:<?php echo $views; ?></li>
				</ul>
				<ul class="size">
					<li>Resolution: <?php echo $resolution; ?></li>
				</ul>
				<?php 
				//Query to check the user is Subscribed or not
				$sql3="SELECT * from subscription WHERE user_id='$rws3[user_id]'";
				$result3=mysqli_query($con,$sql3) or die(mysqli_error($con));
				$rws5=mysqli_fetch_array($result3);
				//Returns a new DateTime object representing the date and time
				$date1=date_create("$rws5[date_of_sub]");
				$date2=date_create("$rws5[date_of_end]");
				//get the difference between two dates
				$diff=date_diff($date1,$date2);
				$diff2=$diff->format("%a");
				//Check whether the user has subscribed or has less than Rs.16 in his account or subscription plan has ended or not
				if(!mysqli_num_rows($result3) || $rws5['amount']<16 || $diff2<1)
				{
					echo "<a class=btn_3 href=pricing.php>Download this Photo</a><br><a class='btn btn-info btn-large' href=cart.php?imgid=$trws1[image_id]&price=16&title=$trws1[img_title]>Add to Cart</a>";
				}
				//if user exists and he has Rs. 16 or above in his account
				if(mysqli_num_rows($result3)&& $rws5['amount']>=16)
				{
					echo "<a class=btn_3 href=components/download.php?id=".$img_id.">Download this Photo </a><br><a class='btn btn-info btn-large' href=cart.php?imgid=$trws1[image_id]&price=16&title=$trws1[img_title]> Add to Cart</a>";
				}
				?>
				<p class="movie_option"><strong>Photo ID : </strong>#<?php echo $trws1['image_id']; ?></p>
				<p class="movie_option"><strong>Upload Date : </strong><?php echo $trws1['upload_date']; ?></p>
			</div>
			<div class="clearfix"> </div>
		  </div>
		   <h4 class="tag_head">Keywords</h4>
	          <ul class="tags_links">
				<li><a href="components/search?s=people">People</a></li>
				<li><a href="components/search?s=City">City</a></li>
				<li><a href="components/search?s=Walking">Walking</a></li>
				<li><a href="components/search?s=Modern">Modern</a></li>
				<li><a href="components/search?s=Computer">Computer</a></li>
				<li><a href="components/search?s=Business">Business</a></li>
				<li><a href="components/search?s=Tree">Tree</a></li>
				<li><a href="components/search?s=Motion">Motion</a></li>
				<li><a href="components/search?s=Gym">Gym</a></li>
				<li><a href="components/search?s=Men">Men</a></li>
				<li><a href="components/search?s=Fashion">Fashion</a></li>
				<li><a href="components/search?s=Industrial">Industrial</a></li>
				<li><a href="components/search?s=Interior">Interior</a></li>
				<li><a href="components/search?s=Real Estate">Real Estate</a></li>
				<li><a href="components/search?s=food">Food</a></li>
		        <li><a href="components/search?s=Restaurants">Restaurants</a></li>
				<li><a href="components/search?s=Society">Society</a></li>
				<li><a href="components/search?s=Traveller">Traveller</a></li>
				<li><a href="components/search?s=Mountain">Mountain</a></li>
				<li><a href="components/search?s=Sitting">Sitting</a>
				</li>
				<li><a href="components/search?s=Discovery">Discovery</a></li>
				<li><a href="components/search?s=Activity">Activity</a></li>
				<li><a href="components/search?s=Resting">Resting</a></li>
				<li><a href="components/search?s=Blue">Blue</a></li>
				<li><a href="components/search?s=France">France</a></li>
				<li><a href="components/search?s=Architecture">Architecture</a></li>
				<li><a href="components/search?s=Europe">Europe</a></li>
				<li><a href="components/search?s=Building">Building</a></li>
			 </ul>
	    </div>
	</div>
	</body>
	</html>
<?php 
}
	else
	{
		header('refresh:1;url=stock.php');
		echo "<center><h1>wrong image id!!!</h1></center>";
	}
}
?>