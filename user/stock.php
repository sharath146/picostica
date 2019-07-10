<?php 
session_start();
if(!isset($_SESSION['user_username']))
{
	echo "<CENTER><H1>ACESS DENIED!!!</h1><h3>Redirecting....</h3></center>";
	header('refresh:1,url=../../login.php');
}
else
{
  //include 'components/cacheheader.php';
  include "database/dbconnection.php";
  include "components/pagination.php";
  if(isset($_GET['page']))
    $page=(int)$_GET['page'];
  else
    $page=1;
  $setLimit=10;
  $pageLimit=($page*$setLimit)-$setLimit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="This is stock photography website, Photographers or designers can sell their creations, images, shots, pictures, designs, art works, online in this website and even you can buy, you will be having some amount of money as a reward">
<meta name="author" content="Sharath Raj">
<link rel="shortcut icon" href="../style/images/favicon.ico">
<title>Pic-O-Stica a Stock photography Website | Gallery</title>
<!-- Bootstrap core CSS -->
<link href="../style/css/bootstrap.min.css" rel="stylesheet">
<link href="../style/css/plugins.css" rel="stylesheet">
<link href="../style.css" rel="stylesheet">
<link href="../style/css/color/forest.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="../style/type/icons.css" rel="stylesheet">
<script src="../style/js/jquery.min.js"></script> 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="../style/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="../style/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<style type="text/css">
  img
  {
    margin:5px;
    border: 1px solid #ccc;
    float:left;
    display: inline-block;
  }
  .navi {
  width: 500px;
  margin: 5px;
  padding:2px 5px;
  border:1px solid #eee;
  }

  .show {
  color: blue;
  margin: 5px 0;
  padding: 3px 5px;
  cursor: pointer;
  font: 15px/19px Arial,Helvetica,sans-serif;
  }
  .show a {
  text-decoration: none;
  }
  .show:hover {
  text-decoration: underline;
  }


  ul.setPaginate li.setPage{
  padding:15px 10px;
  font-size:14px;
  }

  ul.setPaginate{
  margin:0px;
  padding:0px;
  height:100%;
  overflow:hidden;
  font:12px 'Tahoma';
  list-style-type:none; 
  }  

  ul.setPaginate li.dot{padding: 3px 0;}

  ul.setPaginate li{
  float:left;
  margin:0px;
  padding:0px;
  margin-left:5px;
  }



  ul.setPaginate li a
  {
  background: none repeat scroll 0 0 #ffffff;
  border: 1px solid #cccccc;
  color: #999999;
  display: inline-block;
  font: 15px/25px Arial,Helvetica,sans-serif;
  margin: 5px 3px 0 0;
  padding: 0 5px;
  text-align: center;
  text-decoration: none;
  } 

  ul.setPaginate li a:hover,
  ul.setPaginate li a.current_page
  {
  background: none repeat scroll 0 0 #0d92e1;
  border: 1px solid #000000;
  color: #ffffff;
  text-decoration: none;
  }

  ul.setPaginate li a{
  color:black;
  display:block;
  text-decoration:none;
  padding:5px 8px;
  text-decoration: none;
  }
</style>
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
<body style="background-color: rgba(23,23,31,1);">
<!--<div id="preloader"><div class="textload">Loading</div><div id="status"><div class="spinner"></div></div></div> -->
<main class="body-wrapper">
  <div class="navbar">
    <div class="navbar-header">
      <div class="basic-wrapper"> 
        <div class="navbar-brand"> <a href="index.php"><img src="#" srcset="../style/images/logo.png 1x, ../style/images/logo@2x.png 2x" class="logo-light" alt="" /><img src="#" srcset="../style/images/logo-dark.png 1x, ../style/images/logo-dark@2x.png 2x" class="logo-dark" alt="" /></a> </div>
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
        <li><a href="https://instagram.com/picostica/"><i class="icon-s-instagram"></i></a></li>
      </ul>
      <!-- /.social --> 
    </div>
    <!-- /.social-wrapper --> 
  </div>
  <!-- /.navbar -->

  <div class="post-parallax parallax inverse-wrapper parallax2" style="background-image: url(../style/images/art/parallax2.jpg);">
    <div class="container inner text-center">
      <div class="headline text-center">
        <h2>hello! It's Pic-O-Stica a Stock Photography Website.</h2>
        <p class="lead">We are providing different categories of stock images at an affordable price.</p>
      </div>
      <!-- /.headline --> 
    </div>
  </div>
  <!-- /filter -->
  
  <section id="conceptual" class="light-wrapper">
    <div class="container inner">
    <div class="row">
          <?php 
          $sql1="SELECT * FROM image_less WHERE approval='APPROVED' LIMIT $pageLimit,$setLimit";
          $result=mysqli_query($con,$sql1);
          while($rws=mysqli_fetch_array($result))
          {
            echo "<div class=col-md-4>";
            echo "<div><a href=single.php?id=".$rws['image_id']."><img src=thumbs/".$rws['thumb_path']." style=width:100%></a></div>
            ";
            echo "<a target=_blank href=cart.php?imgid=$rws[image_id]&price=16&title=$rws[img_title] class='btn btn-success'>Add to Cart</a><a href=single.php?id=".$rws['image_id']." class='btn btn-info'>View Full Size</a></div>";
          }
          ?>
    </div>
    </div>
    <?php
    //Call the Pagination Function to load Pagination.
    echo displayPaginationBelow($setLimit,$page);
    ?>
    <!-- /.container --> 
  </section>
  <!-- /#conceptual -->

  <footer class="footer inverse-wrapper">
    <div class="container inner">
      <div class="row">

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
            <form class="searchform" method="get" action="components/search.php">
              <input type="text" id="s2" name="s">
              <button type="submit" class="btn btn-success">Find</button>
            </form>
          </div>
          <!-- /.widget -->
          <!-- /.widget -->
          <div class="widget">
            <h4 class="widget-title">Get In Touch</h4>
            <div class="contact-info"> <i class="icon-location"></i>Karnataka, India <br />
              <i class="icon-phone"></i>+91 9008824980<br />
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
//include 'components/cachefooter.php';
} ?>