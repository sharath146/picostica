<?php 
	session_start();
	if(!isset($_SESSION['user_username']))
	{
		echo "<center><h1>Access Denied!!!</h1></center>";
   		header('refresh:1,url=../index.php'); 
	}
	else
	{
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="This is stock photography website, Photographers or designers can sell their creations, images, shots, pictures, designs, art works, online in this website and even you can buy, you will be having some amount of money as a reward">
<meta name="author" content="Sharath Raj">
<link rel="shortcut icon" href="../style/images/favicon.ico">
<title>Pic-O-Stica a Stock photography Website | Pricing</title>
<!-- Bootstrap core CSS -->
<link href="../style/css/bootstrap.min.css" rel="stylesheet">
<link href="../style/css/plugins.css" rel="stylesheet">
<link href="../style.css" rel="stylesheet">
<link href="../style/css/color/forest.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="../style/type/icons.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader"><div class="textload">Loading</div><div id="status"><div class="spinner"></div></div></div>
<main class="body-wrapper">
  <div class="navbar solid dark">
    <div class="navbar-header">
      <div class="basic-wrapper"> 
        <div class="navbar-brand"> <a href="../index.html"><img src="#" srcset="../style/images/logo.png 1x, ../style/images/logo@2x.png 2x" class="logo-light" alt="" /><img src="#" srcset="../style/images/logo-dark.png 1x, ../style/images/logo-dark@2x.png 2x" class="logo-dark" alt="" /></a> </div>
        <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
      </div>
      <!-- /.basic-wrapper -->  
    </div>
    <!-- /.navbar-header -->
         <nav class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="current dropdown"><a href="index.php">Home</a>
        </li>
        <li class="dropdown"><a href="stock.php">Gallery</a>
        </li>
        <li class="dropdown"><a href="pricing.php">Package</a>
        </li>
        <li class="dropdown"><a href="contact.php">Contact</a>
        </li>
        <li class="dropdown"><a href="about.php">About</a>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle js-activated">My Account<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="profile.php">View Profile</a></li>
          <li><a href="form/updateprofile-form.php">Update Profile</a></li>
          <li><a href="contributer.php">Sell Image</a></li>
          <li><a href="components/myimages.php">My Images</a></li>
          <li><a href="components/usernotify.php">My Inbox</a></li>
          <li><a href="components/commission.php">Commission</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="components/logout.php">Logout</a></li>
          
        </ul>
        </li>
      </ul>
      <!-- /.navbar-nav --> 
    </nav>
    <!-- /.navbar-collapse -->
    <div class="social-wrapper">
      <ul class="social naked">
        <li><a href="https://www.facebook.com/picostica"><i class="icon-s-facebook"></i></a></li>
        <li><a href="https://twitter.com/PicosticaPico"><i class="icon-s-twitter"></i></a></li>
        <li><a href="#"><i class="icon-s-flickr"></i></a></li>
        <li><a href="https://instagram.com/picostica/"><i class="icon-s-instagram"></i></a></li>
      </ul>
      <!-- /.social --> 
    </div>
    <!-- /.social-wrapper --> 
  </div>
  <!-- /.navbar -->
  
  <div class="offset"></div>
  <div class="light-wrapper">
    <div class="container inner">
      <h3 class="section-title text-center">Our Friendly Plans</h3>
      <div class="row">
        <div class="col-sm-4">
          <div class="pricing panel">
            <div class="panel-heading">
              <h3 class="panel-title">Bronze</h3>
              <div class="price"><span class="price-currency">&#8377;</span> <span class="price-value">1600</span> </div>
            </div>
            <!--/.panel-heading -->
            <div class="panel-body">
              <table class="table">
                <tr>
                  <td><strong>100</strong> Images </td>
                </tr>
                <tr>
                  <td><strong>1</strong> Month </td>
                </tr>
                <tr>
                <td><strong>&#8377;16</strong> Per Image </td>
                </tr>
                <tr>
               <td><strong>No</strong> Daily Download Limit </td>
                </tr>
              </table>
            </div>
            <!--/.panel-body -->
            <div class="panel-footer"> <a href="components/subscribe.php?type=purchase1" class="btn" role="button" name="purchase1">Subscribe</a></div>
          </div>
          <!--/.pricing --> 
        </div>
        <!--/column -->
        <div class="col-sm-4">
          <div class="pricing panel">
            <div class="panel-heading">
              <h3 class="panel-title">Silver</h3>
              <div class="price"> <span class="price-currency">&#8377;</span> <span class="price-value">2400</span> </div>
            </div>
            <!--/.panel-heading -->
            <div class="panel-body">
              <table class="table">
                <tr>
                  <td><strong>150</strong> Images </td>
                </tr>
                <tr>
                  <td><strong>1</strong> Month </td>
                </tr>
                <td><strong>&#8377;16</strong> Per Image </td>
                </tr>
                <td><strong>No</strong> Daily Download Limit </td>
                </tr>
              </table>
            </div>
            <!--/.panel-body -->
            <div class="panel-footer"> <a href="components/subscribe.php?type=purchase2" class="btn" role="button" name="purchase2">Subscribe</a></div>
          </div>
          <!--/.pricing --> 
        </div>
        <!--/column -->
        <div class="col-sm-4">
          <div class="pricing panel">
            <div class="panel-heading">
              <h3 class="panel-title">Gold</h3>
              <div class="price"> <span class="price-currency">&#8377;</span> <span class="price-value">3200</span> </div>
            </div>
            <!--/.panel-heading -->
            <div class="panel-body">
              <table class="table">
                <tr>
                  <td><strong>200</strong> Images </td>
                </tr>
                <tr>
                  <td><strong>1</strong> Month </td>
                </tr>
                <td><strong>&#8377;16</strong> Per Image </td>
                </tr>
                <td><strong>No</strong> Daily Download Limit </td>
                </tr>
              </table>
            </div>
            <!--/.panel-body -->
            <div class="panel-footer"> <a href="components/subscribe.php?type=purchase3" class="btn" role="button" name="purchase3">Subscribe</a></div>
          </div>
          <!--/.pricing --> 
        </div>
        <!--/column --> 
      </div>
      <!--/.row --> 
      
    </div>
    <!--/.container --> 
  </div>
  <!-- /.light-wrapper -->
  
  <div class="dark-wrapper">
    <div class="container inner">
     
      </div>
      <!--/.row --> 
    </div>
    <!--/.container --> 
  </div>
  <!-- /.dark-wrapper -->
  <footer class="footer inverse-wrapper">
    <div class="container inner">
      <div class="row">
        <!-- /column -->
        
        <div class="col-sm-6">
          <div class="widget">
            <h4 class="widget-title">Tags</h4>
            <ul class="tag-list">
               <li><a href="components/search.php?s=web" class="btn">Web</a></li>
              <li><a href="components/search.php?s=photography" class="btn">Photography</a></li>
              <li><a href="components/search.php?s=Illustration" class="btn">Illustation</a></li>
              <li><a href="components/search.php?s=fun" class="btn">Fun</a></li>
              <li><a href="components/search.php?s=blog" class="btn">Blog</a></li>
              <li><a href="components/search.php?s=commercial" class="btn">Commercial</a></li>
              <li><a href="components/search.php?s=journal" class="btn">Journal</a></li>
              <li><a href="components/search.php?s=Nature" class="btn">Nature</a></li>
              <li><a href="components/search.php?s=still life" class="btn">Still Life</a></li>
            </ul>
          </div>
          <!-- /.widget -->
          
          <div class="widget">
            <h4 class="widget-title">Elsewhere</h4>
            <ul class="social">
              <li><a href="https://www.twitter.com/PicosticaPico"><i class="icon-s-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/picostica"><i class="icon-s-facebook"></i></a></li>
              <li><a href="https://in.pinterest.com/picostica/"><i class="icon-s-pinterest"></i></a></li>
            </ul>
            <!-- .social --> 
            
          </div>
        </div>
        <!-- /column -->
        
        <div class="col-sm-6">
          <div class="widget">
            <h4 class="widget-title">Search</h4>
            <form class="searchform" method="get" action="components/search.php">
              <input type="text" id="s2" name="s">
              <button type="submit" class="btn btn-default">Find</button>
            </form>
          </div>
          <!-- /.widget -->
          <div class="widget">
            <h4 class="widget-title">Get In Touch</h4>
            <p>Please free to contact us.</p>
            <div class="contact-info"> <i class="icon-location"></i>Kankanady, Mangalore-575006<br />
              <i class="icon-phone"></i>+919611092567 <br />
              <i class="icon-mail"></i> <a href="mailto:picostica@gmail.com">picostica@gmail.com</a> </div>
          </div>
          <!-- /.widget --> 
          
        </div>
        <!-- /column --> 
        
      </div>
      <!-- /.row --> 
    </div>
    <!-- .container -->
    
    <div class="sub-footer">
      <div class="container inner">
        <p class="text-center">© 2017 Pic-O-Stica. All rights reserved.</p>
      </div>
      <!-- .container --> 
    </div>
    <!-- .sub-footer --> 
  </footer>
  <!-- /footer --> 
  
</main>
<!--/.body-wrapper --> 
<script src="../style/js/jquery.min.js"></script> 
<script src="../style/js/bootstrap.min.js"></script> 
<script src="../style/js/plugins.js"></script> 
<script src="../style/js/classie.js"></script> 
<script src="../style/js/jquery.themepunch.tools.min.js"></script> 
<script src="../style/js/scripts.js"></script>
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=30813178"></script>
</body>
</html>
<?php 
} ?>