<?php 
    session_start();
    if(!isset($_SESSION['user_username']))
    {
        echo "<center><h1>Access Denied!!</h1><h3>Redirecting...</h3></center>";
        header('refresh:1,url=../login.php');
    }
    else
    {
        $stat='';
 ?>
 <?php  
        require 'database/dbconnection.php';
        $user=$_SESSION['user_username'];
        $sql9="SELECT * FROM user WHERE uname='$user'";
        $result9=mysqli_query($con,$sql9) or die(mysqli_error($con));
        $rws=mysqli_fetch_array($result9);
        if($rws['status']=='ACTIVE')
        {
            $stat="<p style=color:green;>".$rws['status']."</p>";
        }
        if($rws['status']=='INACTIVE')
        {
           $stat="<p style=color:red;>".$rws['status']."</p>";
        }
?>
<head>
<title>Profile Page|Pic-O-Stica</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap/bootstrap.css" rel="stylesheet">
      
    <!-- Jasny Bootstrap CSS -->
    <link href="assets/css/jasny-bootstrap/jasny-bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Form Helpers CSS -->
    <link href="assets/css/bootstrap-form-helpers/bootstrap-formhelpers.css" rel="stylesheet">  

    <!-- Animate CSS -->
    <link href="assets/css/animate/animate.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome/font-awesome.css">

    <!-- PACE CSS -->
    <link rel="stylesheet" href="../assets/css/pace/pace.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/base/main.css" rel="stylesheet">
    <!-- Base JavaScript -->
    <script src="assets/js/base/jquery.min.js"></script>
    <script src="assets/js/base/smoothscroll.js"></script>
    <script src="assets/js/base/jquery.form.js"></script>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap/bootstrap.js"></script>

    <!-- JQuery UI Tabs JavaScript -->
    <script src="assets/js/base/jquery-ui.js"></script>
    
    <!-- Bootstrap Form Helpers -->
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers.js"></script>
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers-colorpicker.js"></script>    
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers-datepicker.js"></script>

    <!-- Base JavaScript -->
    <script src="assets/js/base/offcanvas.js"></script>
    <script src="assets/js/base/scripts.js"></script>

    <!-- PACE JavaScript -->
    <script src="assets/js/pace/pace.min.js"></script>

    <!-- InstaClick JavaScript -->
    <script src="assets/js/instantclick/instantclick.min.js" data-no-instant></script>

    <!-- InstaClick Initialization-->
    <script data-no-instant>
        InstantClick.init();
    </script>

    <!-- WOW JavaScript -->
    <script src="assets/js/wow/wow.js"></script>

    <!-- WOW Initialization-->
    <script>
        new WOW().init();
    </script>
</head>
<body style="background-color: rgba(200,200,200,1);">
    <a href="index.php" style="text-decoration: none;background-color: grey;padding: 10px; font-weight: bold;font-family: 'Century Gothic',serif;font-size: 2em;">Home</a>
</div>
<div class="profile">
	<div class="row clearfix">
		<!-- <div class="col-md-12 column"> -->
            <div>
                <center>
                    <img src="userfiles/avatars/<?php echo $rws['user_avatar'];?>" class="img-responsive profile-avatar">
                </center>
                <h1 class="text-center profile-text profile-name"><?php echo $rws['fname'];?> <?php echo $rws['lname'];?></h1>
                <h2 class="text-center profile-text profile-profession"><?php echo $rws['profession'];?></h2>
                <br>
                <div class="panel-group white" id="panel-profile">
                    <div class="panel panel-default white">
                        <div class="panel-heading white">
                            <center>
                                <a class="panel-title" data-toggle="collapse" data-parent="#panel-profile" href="#panel-element-info">Details</a>
                            </center>
                        </div>
                        <div id="panel-element-info" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="col-md-4 column">
                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Basic</p>
                                    <hr>
<?php
    if ($rws['user_bio']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Bio</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['user_bio'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['address']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Location</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['address'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['email']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-envelope"></i> Email</p>
                                    </div>
                                    <div class="col-md-8">                                    
                                        <p><?php echo $rws['email'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['country']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Country</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['country'];?></p>
                                    </div>
<?php } ?>
                                </div>
                                <div class="col-md-4 column">
                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Personal</p>
                                    <hr>
<?php
    if ($rws['gender']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-user"></i> Gender</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['gender'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['dob']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-calendar"></i> Date of Birth</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['dob'];?></p>
                                    </div>
<?php } ?>
                                </div>
                                <div class="col-md-4 column">
                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Account Details</p>
                                    <hr>
                                    <?php
    if ($rws['status']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-status"></i> Account Status</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['status'];?></p>
                                    </div>
<?php }
else
{ ?>
<div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-error"></i> Account Status</p>
                                    </div>
                                    <div class="col-md-8">
                                        <?php echo $stat; ?>
                                    </div> 
    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<!-- </div> -->
	</div>
</div>
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=30813178"></script>
</body>
<?php } ?>