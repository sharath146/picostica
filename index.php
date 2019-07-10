<?php session_start();
if(isset($_SESSION['user_username']))
{
  header('location:user/index');
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
<link rel="shortcut icon" href="style/images/favicon.ico">
<title>Pic-O-Stica a Stock photography Website | Home</title>
<!-- Bootstrap core CSS -->
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/plugins.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="style/css/color/forest.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="style/type/icons.css" rel="stylesheet">
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
  <div class="navbar">
    <div class="navbar-header">
      <div class="basic-wrapper"> 
        <div class="navbar-brand"> <a href="index"><img src="#" srcset="style/images/logo.png 1x, style/images/logo@2x.png 2x" class="logo-light" alt="" /><img src="#" srcset="style/images/logo-dark.png 1x, style/images/logo-dark@2x.png 2x" class="logo-dark" alt="" /></a> </div>
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
        <li class="dropdown"><a href="login.php">Login | Register</a>
        </li>
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
  <div class="tp-fullscreen-container revolution">
  <div style="position:absolute; height: 200px;z-index: 200;top: 70%; left: 35%;" class="col-md-4">
  <form class="searchform" method="get" action="user/components/search.php">
              <input type="text" id="s" name="s" placeholder="Search from over 30 million images..." style="background-color: grey;color: white;border:2px white solid;">
              <button type="submit" class="btn btn-default">Find</button>
            </form>
  </div>
    <div class="tp-fullscreen">
      <ul>
        <li data-transition="fade"> <img src="style/images/art/slider-bg1.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
          <h1 class="tp-caption large sfr" data-x="30" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">hello! this is Pic-O-Stica</h1>
          <div class="tp-caption medium sfr" data-x="30" data-y="348" data-speed="900" data-start="1500" data-easing="Sine.easeOut">most complete collection of<br />
             Stock Photography & designs</div>
        </li>
        <li data-transition="fade"> <img src="style/images/art/slider-bg2.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
          <div class="tp-caption large text-center sfl" data-x="center" data-y="283" data-speed="900" data-start="800" data-easing="Sine.easeOut">Website for creatives to showcase</div>
          <div class="tp-caption large text-center sfr" data-x="center" data-y="363" data-speed="900" data-start="1500" data-easing="Sine.easeOut">their talent beautifully</div>
        </li>
        <li data-transition="fade"> <img src="style/images/art/slider-bg3.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
          <div class="tp-caption large text-center sfb" data-x="center" data-y="293" data-speed="900" data-start="800" data-easing="Sine.easeOut">Images at the lowest cost</div>
          <div class="tp-caption medium text-center sfb" data-x="center" data-y="387" data-speed="900" data-start="1500" data-easing="Sine.easeOut">you will have access to all images</div>
        </li>
        <li data-transition="fade"> <img src="style/images/art/parallax1.jpg" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />
          <div class="tp-caption large text-center sfb" data-x="center" data-y="293" data-speed="900" data-start="800" data-endspeed="100" data-easing="Sine.easeOut" style="z-index: 2;">Royalty Free Images</div>
          <div class="tp-caption medium text-center sfb" data-x="center" data-y="387" data-speed="900" data-start="1500" data-endspeed="100" data-easing="Sine.easeOut" style="z-index: 2;">at lowest prices</div>
        </li>
      </ul>

      <div class="tp-bannertimer tp-bottom"></div>
    </div>
    <!-- /.tp-fullscreen-container --> 
  </div>
  <!-- /.revolution -->
  
  <div class="light-wrapper">
    <div class="container inner">
      <div class="thin">
        <h3 class="section-title text-center">Browse Our Most Popular Royalty-Free Stock Photo Categories</h3>
        <p class="text-center">Find the perfect image from Pic-O-Stica's awesome collection</p>
      </div>
      <!-- /.thin -->
      <div class="divide10"></div>
      <div class="row">
        <div class="col-sm-4">
          <div class="caption-overlay">
            <figure><a href="user/components/search.php?s=fashion"><img src="style/image2/fashion.jpg" alt="" /> </a></figure>
            <div class="caption bottom-right">
              <div class="title">
                <h3 class="main-title layer">Fashion Photography</h3>
              </div>
              <!--/.title --> 
            </div>
            <!--/.caption --> 
          </div>
        </div>
        <!-- /column -->
        <div class="col-sm-4">
          <div class="caption-overlay">
            <figure><a href="user/components/search.php?s=food"><img src="style/image2/food.jpg" alt="" /> </a></figure>
            <div class="caption bottom-right">
              <div class="title">
                <h3 class="main-title layer">Food & Drink Photography</h3>
              </div>
              <!--/.title --> 
            </div>
            <!--/.caption --> 
          </div>
        </div>
        <!-- /column -->
        <div class="col-sm-4">
          <div class="caption-overlay">
            <figure><a href="user/components/search.php?s=wedding"><img src="style/image2/wedding.jpg" alt="" /> </a></figure>
            <div class="caption bottom-right">
              <div class="title">
                <h3 class="main-title layer">Wedding Photography</h3>
              </div>
              <!--/.title --> 
            </div>
            <!--/.caption --> 
          </div>
        </div>
        <!-- /column --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.light-wrapper -->
  
  <!-- /.light-wrapper -->
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
              <li><a href="user/components/search.php?s=blog" class="btn">Blog</a></li>
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
              <input type="text" id="s2" name="s" placeholder ="Search something">
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
        <a href="http://www.dmca.com/Protection/Status.aspx?ID=73c1287a-3d00-42a8-8fe6-63f2e052f3df" title="DMCA.com Protection Status" class="dmca-badge"> <img src="//images.dmca.com/Badges/dmca_protected_sml_120l.png?ID=73c1287a-3d00-42a8-8fe6-63f2e052f3df" alt="DMCA.com Protection Status"></a> 
        <p class="text-center">© <?php echo date('Y'); ?> Pic-O-Stica. All rights reserved.</p>
      </div>
      <!-- .container --> 
    </div>
    <!-- .sub-footer --> 
  </footer>
  <!-- /footer -->  
</main>
<!--/.body-wrapper --> 
<script src="style/js/jquery.min.js"></script> 
<script src="style/js/bootstrap.min.js"></script> 
<script src="style/js/plugins.js"></script> 
<script src="style/js/classie.js"></script> 
<script src="style/js/jquery.themepunch.tools.min.js"></script> 
<script src="style/js/scripts.js"></script>
<!-- begin SnapEngage code
<script type="text/javascript">
  (function() {
    var se = document.createElement('script'); se.type = 'text/javascript'; se.async = true;
    se.src = '//storage.googleapis.com/code.snapengage.com/js/bc887d46-d54b-4584-83f0-5dd980b2c3ba.js';
    var done = false;
    se.onload = se.onreadystatechange = function() {
      if (!done&&(!this.readyState||this.readyState==='loaded'||this.readyState==='complete')) {
        done = true;
        /* Place your SnapEngage JS API code below */
        /* SnapEngage.allowChatSound(true); Example JS API: Enable sounds for Visitors. */
      }
    };
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(se, s);
  })();
</script>
 end SnapEngage code -->
 
 <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid"></script>
</body>
</html>
<?php 
} ?>
