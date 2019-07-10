<?php session_start();
if(!isset($_SESSION['user_username']))
{
  echo "<center><h1>Access Denied!!!</h1></center>";
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
<title>Pic-O-Stica a Stock photography Website | Home</title>
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
  <div class="navbar" style="background-color: rgba(23,23,31,1);">
    <div class="navbar-header">
      <div class="basic-wrapper"> 
        <div class="navbar-brand"> <a href="index.php"><img src="#" srcset="../style/images/logo.png 1x, style/images/logo@2x.png 2x" class="logo-light" alt="" /><img src="#" srcset="style/images/logo-dark.png 1x, ../style/images/logo-dark@2x.png 2x" class="logo-dark" alt="" /></a> </div>
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
      </ul>
      <!-- /.navbar-nav --> 
    </nav>
    <!-- /.navbar-collapse -->
    
    <div class="social-wrapper">
     <ul class="social naked">
        <li><a href="https://www.facebook.com/picostica"><i class="icon-s-facebook"></i></a></li>
        <li><a href="https://twitter.com/PicosticaPico"><i class="icon-s-twitter"></i></a></li>
        <li><a href="https://instagram.com/picostica/"><i class="icon-s-instagram"></i></a></li>
      </ul>
      <!-- /.social --> 
    </div>
    <!-- /.social-wrapper -->
  </div>
  <!-- /.navbar -->
  <div class="offset"></div>
  <div id="map"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1xdEVYy8IZdBKJGQp_QpDWaNQT7ZHGhY&amp;sensor=false&amp;extension=.js"></script> 
  <script> google.maps.event.addDomListener(window, 'load', init);
	var map;
	function init() {
	    var mapOptions = {
	        center: new google.maps.LatLng(12.835213, 75.387986),
	        zoom: 15,
	        zoomControl: true,
	        zoomControlOptions: {
	            style: google.maps.ZoomControlStyle.DEFAULT,
	        },
	        disableDoubleClickZoom: false,
	        mapTypeControl: true,
	        mapTypeControlOptions: {
	            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
	        },
	        scaleControl: true,
	        scrollwheel: false,
	        streetViewControl: true,
	        draggable : true,
	        overviewMapControl: false,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: [{stylers:[{saturation:-100},{gamma:1}]},{elementType:"labels.text.stroke",stylers:[{visibility:"off"}]},{featureType:"poi.business",elementType:"labels.text",stylers:[{visibility:"off"}]},{featureType:"poi.business",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"poi.place_of_worship",elementType:"labels.text",stylers:[{visibility:"off"}]},{featureType:"poi.place_of_worship",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"geometry",stylers:[{visibility:"simplified"}]},{featureType:"water",stylers:[{visibility:"on"},{saturation:50},{gamma:0},{hue:"#50a5d1"}]},{featureType:"administrative.neighborhood",elementType:"labels.text.fill",stylers:[{color:"#333333"}]},{featureType:"road.local",elementType:"labels.text",stylers:[{weight:0.5},{color:"#333333"}]},{featureType:"transit.station",elementType:"labels.icon",stylers:[{gamma:1},{saturation:50}]}]
			}
	
	    var mapElement = document.getElementById('map');
	    var map = new google.maps.Map(mapElement, mapOptions);
	    var locations = [
	        ['Picostica Inc.', 12.835213, 75.387986]
	    ];
	    for (i = 0; i < locations.length; i++) {
	        marker = new google.maps.Marker({
	            icon: 'style/images/map-pin.png',
	            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
	            map: map
	        });
	    }
	}
  </script>
  <div class="light-wrapper">
    <div class="container inner">
      <div class="row">
        <div class="col-sm-8">
          <h2 class="section-title">Get in Touch</h2>
          <p>Contact us about anything related to our company or services.
          We'll do our best to get back to you as soon as possible.</p>
          <div class="divide10"></div>
          <div class="form-container">
            <form action="mailsms/contactmail.php" method="post">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-field">
                    <label>
                      <input type="text" name="name" placeholder="Your name" required="required">
                    </label>
                  </div>
                  <!--/.form-field --> 
                </div>
                <!--/column -->
                <div class="col-sm-6">
                  <div class="form-field">
                    <label>
                      <input type="email" name="email" placeholder="Your e-mail" required="required">
                    </label>
                  </div>
                  <!--/.form-field --> 
                </div>
                <!--/column -->
                <div class="col-sm-6">
                  <div class="form-field">
                    <label>
                      <input type="tel" name="tel" placeholder="Phone">
                    </label>
                  </div>
                  <!--/.form-field --> 
                </div>
                <!--/column -->
                <div class="col-sm-6">
                  <div class="form-field">
                    <label class="custom-select">
                      <select name="department" required="required">
                        <option value="">Select Department</option>
                        <option value="Sales">Sales</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Support">Customer Support</option>
                        <option value="Other">Other</option>
                      </select>
                      <span><!-- fake select handler --></span> </label>
                  </div>
                  <!--/.form-field --> 
                </div>
                <!--/column --> 
              </div>
              <!--/.row -->
              <textarea name="message" placeholder="Type your message here..." required="required"></textarea>
              
              <input type="submit" class="btn" value="Send" name="contact-submit">
              <footer class="notification-box"></footer>
            </form>
            <!--/.vanilla-form --> 
          </div>
          <!--/.form-container --> 
          
        </div>
        <!--/column -->
        
        <aside class="col-sm-4">
          <div class="sidebox widget">
            <h3 class="widget-title">Address</h3>
            <p>Kankanady, Mangalore</p>
            <address>
            <strong>Picostica, Inc.</strong><br>
            Mangalore, Karnataka <br>
            PIN- 575006<br>
            <abbr title="Phone">P:</abbr>+919611092567 <br>
            <abbr title="Email">E:</abbr> <a href="mailto:#">picostica@gmail.com</a>
            </address>
          </div>
          <!-- /.widget --> 
          
        </aside>
        <!--/column --> 
        
      </div>
      <!--/.row --> 
      
    </div>
    <!--/.container --> 
  </div>
  <!--/.light-wrapper -->
  
  <footer class="footer inverse-wrapper">
    <div class="container inner">
      <div class="row">
        <div class="col-sm-6">
          <div class="widget">
            <h4 class="widget-title">Tags</h4>
            <ul class="tag-list">
              <li><a href="user/components/search.php?s=web" class="btn">Web</a></li>
              <li><a href="user/components/search.php?s=photography" class="btn">Photography</a></li>
              <li><a href="user/components/search.php?s=Illustration" class="btn">Illustation</a></li>
              <li><a href="user/components/search.php?s=fun" class="btn">Fun</a></li>
              <li><a href="#=user/components/search.php?s=blog" class="btn">Blog</a></li>
              <li><a href="user/components/search.php?s=commercial" class="btn">Commercial</a></li>
              <li><a href="user/components/search.php?s=journal" class="btn">Journal</a></li>
              <li><a href="user/components/search.php?s=Nature" class="btn">Nature</a></li>
              <li><a href="user/components/search.php?s=still life" class="btn">Still Life</a></li>
            </ul>
          </div>
          <!-- /.widget -->
          
          <div class="widget">
            <h4 class="widget-title">Elsewhere</h4>
            <ul class="social">
              <li><a href="https://twitter.com/PicosticaPico"><i class="icon-s-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/picostica"><i class="icon-s-facebook"></i></a></li>
              <li><a href="https://in.pinterest.com/picostica/"><i class="icon-s-pinterest"></i></a></li>
              <li><a href="https://www.linkedin.com/in/picostica"><i class="icon-s-linkedin"></i></a></li>
            </ul>
            <!-- .social --> 
            
          </div>
        </div>
        <!-- /column -->
        
        <div class="col-sm-6">
          <div class="widget">
            <h4 class="widget-title">Search</h4>
            <form class="searchform" method="get" action="user/components/search.php">
              <input type="text" id="s2" name="s" value="Search something" onfocus="this.value=''" onblur="this.value='Search something'">
              <button type="submit" class="btn btn-default">Find</button>
            </form>
          </div>
          <!-- /.widget -->
          <div class="widget">
            <h4 class="widget-title">Get In Touch</h4>
            <div class="contact-info"> <i class="icon-location"></i>Karnataka, India <br />
              <i class="icon-phone"></i>+91 9611092567<br />
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
        <p class="text-center">© 2017 Pic-O-Stica. All rights reserved.</a>.</p>
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
<?php } ?>