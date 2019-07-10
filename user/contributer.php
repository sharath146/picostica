<?php session_start();
	if(!isset($_SESSION['user_username']))
	{
		echo "<center><h1>Access Denied!!!</h1><h3>Redirecting...</h3></center>";
		header('refresh:1,url=../login.php');
	}
	else
	{
		$user_name=$_SESSION['user_username'];
			require 'database/dbconnection.php';
			$result9=mysqli_query($con,"SELECT type from user where uname='$user_name'") or die(mysqli_error($con));
			$trws=mysqli_fetch_array($result9);
			if($trws['type']=='SALE')
			{
				header('location:upload/index.php');
			}
			else
			{
			if(isset($_REQUEST['Agree-Button']))
			{
				$type='SALE';
				$sql8="UPDATE user SET type='$type' WHERE uname='$user_name'";
				$result8=mysqli_query($con,$sql8);
				header('location:upload/index.php');
			}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contibutor Agreement|Picostica</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body style="margin: 0 auto;">
<div style="color:white;background-color: rgba(23,23,31,0.7);width: 100%;height: 80px; font-family: 'Century Gothic',serif;font-weight: bold;padding-top: 25px;font-size: 2em;padding-left: 10px; display: block;float: left;">
	<a href="index.php" style="text-decoration: none;float: left;">Home</a>
		<h1 style="color:white; text-align: center;">Pic-O-Stica Contributer Agreement</h1>
</div>
<br>
<br>
<div style="margin-left: 10px;margin-right: 10px;">
<center><h1>Contributor Agreement</h1></center>
<p>Welcome to Pic-O-Stica! This agreement will let you know on how to be a contibutor. We encourage our contibutors to be as imaginative as possible and submit their most creative work. We have very specific requirements to maintain the quality of our collection. </p>
<h1>What We Need From You</h1>
<p>Pic-O-Stica is in the business of selling images to customers who need them. The more marketable your images are, the more money you will make.</p>
We are looking for images with the following qualities:
<ul>
	<li>Appropriate, interesting and creative <b>subject matter</b></li>
	<li>Strong <b>technical quality.</b></li>
	<li>Compliance with our <b>legal requirements,</b>including copyrights and model releases.</li>
	<li>Appropriate <b>keywords</b> to help customers find your images.</li>
</ul>
<h3>Subject Matter</h3>
<h4>Choose Appropriate Subjects</h4>
<p>
	You will have the greatest success at Bigstock if you submit images that are eye-catching, creative and have broad usage appeal. Think about what a designer would need for an online or publishing project.
	<br>
	The best images often focus on a single, interesting subject, concepts or places that are hard to shoot. Avoid submitting shots with parts of the subject cut off. Customers sometimes prefer images with space for text.
	<br>
	Do not submit lifeless, mundane, snapshot-quality images. Stay away from images with no particular subject, or that feature subjects of low interest.
	<br>
	Please spend some time browsing our collection and studying the shots that achieve the most downloads. At the same time, avoid submitting work that other Pic-O-Stica contributors have already covered thoroughly. Generally speaking, we don't need more images of flowers, cats, mountains and other common, easy-to-shoot subjects.
	<h4>Partial Nudity Only</h4>
	Pic-O-Stica will generally allow partial nudity in submitted photographs. We will reject images containing fully exposed buttocks, genitals, fully exposed female breasts or female nipples.
</p>
<h3>Technical Quality</h3>
<p>
	The stock photography marketplace demands increasingly better-looking, higher-quality images. Your images should be appealing to the eye and professionally composed, properly exposed, and colorful.
	<br>
	Making adjustments in Adobe Photoshop to boost color and adjust light levels is appropriate, but try not to over-do it.
	<br>
	During the image approval process, you will get feedback if your images are not what we are looking for. Please don't be discouraged or offended. We are trying to give you pointed feedback to help you understand what will make your images a better fit for our collection.
	<br>
	Some common reasons for rejection include underexposed images, images with hard flash shadows, and badly focused, blurry or overly grainy images. 
</p>
<h3>Legal Requirements</h3>
<p>
	Read this section carefully. Photographers who repeatedly upload images that violate our legal requirements will have their accounts closed and may forfeit any balance they have accumulated.
	<h4>Copyright</h4>
	<h3>1. You must be the photographer of the photo or the artist who created the artwork.</h3>
	No exceptions. If you are NOT the photographer, chances are you cannot legally upload the photo or resell it. The sole exception would be an old family photo, where the estate of the original photographer passed it to you as the legal heir.
	<br>
	Photographers or artists who upload photos that are not their own will have their accounts closed and will lose any account balance.
	<h3>2. You cannot upload a retouched version of an image someone else created.</h3>
	Consider this an extension of rule 1. Under no circumstances can you upload an image that was obtained from any other source, even if you've altered it heavily.
	<h3>3. Except for Editorial Use Images, your pictures may not contain logos, characters, advertisements, images, or graphics that are copyrighted or trademarked.</h3>
	Please look closely at your photos for logos, graphics or other possibly copyrighted work before uploading them. We cannot accept any photo with a recognizable logo. You may digitally obscure a logo to make it unreadable as long as the photo still looks good.
	<br>
	Photos from places that contain recognizable characters (such as Mickey Mouse at a Disney theme park) also not acceptable.
	<br>
	Works of art created after 1923, including sculptures, are likely to be copyrighted. Do not submit photographs that include modern works of art.
	<br>
	An exception to this rule is Editorial Use Images (explained below), which may contain trademarked material.
</p>
<form method="post" action="">
<div class="form-container">
	<div class="form-group">
	<label for="">(By clicking on the submit button you agree with the contibutor terms & conditions)</label>
	</div>
	<div class="submit">
		<center>
			<button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit" id="SubmitButton" name="Agree-Button"> Agree & Proceed
			</button>
		</center>
	</div>
</div>
</form>
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=30813178"></script>
</body>
</html>
<?php 
}}
?>