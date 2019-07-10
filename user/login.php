<?php session_start();
if(isset($_SESSION['user_username']))
{
  header('location:user/index.php');
}
else
{
 ?>
<!DOCTYPE html>
<HTML lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="This is stock photography website, Photographers or designers can sell their creations, images, shots, pictures, designs, art works, online in this website and even you can buy, you will be having some amount of money as a reward">
<meta name="author" content="Sharath Raj">
<link rel="shortcut icon" href="style/images/favicon.ico">
<title>Pic-O-Stica a Stock photography Website | Login</title>
<!-- Bootstrap core CSS -->
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/plugins.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="style/css/color/forest.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="style/type/icons.css" rel="stylesheet">
<style type="text/css">
#passwordTest {
  width: 400px;
  margin-left: auto;
  margin-right: auto;
  background: #F0F0F0;
  padding: 20px;
  border: 1px solid #DDD;
  border-radius: 4px;
}
#passwordTest input[type="password"]{
  width: 97.5%;
  height: 25px;
  margin-bottom: 5px;
  border: 1px solid #DDD;
  border-radius: 4px;
  line-height: 25px;
  padding-left: 5px;
  font-size: 25px;
  color: #829CBD;
}
#pass-info{
  width: 97.5%;
  height: 25px;
  border: 1px solid #DDD;
  border-radius: 4px;
  color: #829CBD;
  text-align: center;
  font: 12px/25px Arial, Helvetica, sans-serif;
}
#pass-info.weakpass{
  border: 1px solid #FF9191;
  background: #FFC7C7;
  color: #94546E;
  text-shadow: 1px 1px 1px #FFF;
}
#pass-info.stillweakpass {
  border: 1px solid #FBB;
  background: #FDD;
  color: #945870;
  text-shadow: 1px 1px 1px #FFF;
}
#pass-info.goodpass {
  border: 1px solid #C4EEC8;
  background: #E4FFE4;
  color: #51926E;
  text-shadow: 1px 1px 1px #FFF;
}
#pass-info.strongpass {
  border: 1px solid #6ED66E;
  background: #79F079;
  color: #348F34;
  text-shadow: 1px 1px 1px #FFF;
}
#pass-info.vrystrongpass {
  border: 1px solid #379137;
  background: #48B448;
  color: #CDFFCD;
  text-shadow: 1px 1px 1px #296429;
}
</style>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  var password1     = $('#password'); //id of first password field
  var password2   = $('#confirm_password'); //id of second password field
  var passwordsInfo   = $('#pass-info'); //id of indicator element
  
  passwordStrengthCheck(password1,password2,passwordsInfo); //call password check function
  
});

function passwordStrengthCheck(password1, password2, passwordsInfo)
{
  //Must contain 5 characters or more
  var WeakPass = /(?=.{5,}).*/; 
  //Must contain lower case letters and at least one digit.
  var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
  //Must contain at least one upper case letter, one lower case letter and one digit.
  var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
  //Must contain at least one upper case letter, one lower case letter and one digit.
  var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/; 
  
  $(password1).on('keyup', function(e) {
    if(VryStrongPass.test(password1.val()))
    {
      passwordsInfo.removeClass().addClass('vrystrongpass').html("Very Strong! (Awesome, please don't forget your pass now!)");
    } 
    else if(StrongPass.test(password1.val()))
    {
      passwordsInfo.removeClass().addClass('strongpass').html("Strong! (Enter special chars to make even stronger");
    } 
    else if(MediumPass.test(password1.val()))
    {
      passwordsInfo.removeClass().addClass('goodpass').html("Good! (Enter uppercase letter to make strong)");
    }
    else if(WeakPass.test(password1.val()))
      {
      passwordsInfo.removeClass().addClass('stillweakpass').html("Still Weak! (Enter digits to make good password)");
      }
    else if(password1.val()=='')
    {
      passwordsInfo.removeClass().addClass('stillweakpass').html("Password Cannot be empty!!");
    }
    else
    {
      passwordsInfo.removeClass().addClass('weakpass').html("Very Weak! (Must be 5 or more chars)");
    }
  });
  
  $(password2).on('keyup', function(e) {
    
    if(password1.val() !== password2.val())
    {
      passwordsInfo.removeClass().addClass('weakpass').html("Passwords do not match!"); 
    }
    else if(password2.val()=='')
    {
      passwordsInfo.removeClass().addClass('stillweakpass').html("Confirm Password Cannot be Empty!");
    }
    else{
      passwordsInfo.removeClass().addClass('goodpass').html("Passwords match!");  
    }
      
  });
}
</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="style/css/loginstyle.css">
<link rel="stylesheet" type="text/css" href="style/sweetalert-master/dist/sweetalert.css">
<script src="style/sweetalert-master/dist/sweetalert.min.js"></script>
<style type="text/css">
body
{
font-family:Tahoma, Geneva, sans-serif;
}
#status
{
font-size:11px;
margin-left:10px;
}
.green
{
background-color:#CEFFCE;
}
.red
{
background-color:#FFD9D9;
}
input
{
font-size:16px;
width:200px;
height:25px;
border:solid 1px #333333;
padding:4px;
}
h2 { font:Tahoma, Geneva, sans-serif; font-size:18px; color:#396693;}
h2 > .names { font:Tahoma, Geneva, sans-serif; font-size:18px; color:#C69;}
</style>
<SCRIPT type="text/javascript">
$(document).ready(function()
{
  $('#username').keyup(function(){ 
var username = $(this).val();//Get username textbox using $(this)
var msgbox = $('#status');//Get ID of the status DIV where we display the results
if(username.length > 4)
{//If greater than 2(minimum 3)
msgbox.html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
var dataPass= 'action=availabilty&username='+username;
$.ajax({ //Send value to username val to available.php  
    type: 'POST',  
    url: 'available.php',  
    data: dataPass,  
    success: function(responseText){//Get the result 
  if(responseText == 0)
  { 
        msgbox.html('<img src="available.png" align="absmiddle">');
  }  
  else if(responseText>0) 
  {  
    msgbox.html('Not Available!!');
  } 
  else
  {
    alert('Problem with sql Query');
  }
   }
   });
}else{
  msgbox.html('Enter atleast 3 Characters!!!');
}
if(username.length == 0)
{
  msgbox.html('');
}
});   
}); 
</SCRIPT>
<!--Script for Form Validation -->
</head>
<body style="margin:0 auto;">
<div id="preloader"><div class="textload">Loading</div><div id="status"><div class="spinner"></div></div></div>
<main class="body-wrapper">
  <div class="navbar" style="background-color: rgba(23,23,31,1);">
    <div class="navbar-header">
      <div class="basic-wrapper"> 
        <div class="navbar-brand"> <a href="index.php"><img src="#" srcset="style/images/logo.png 1x, style/images/logo@2x.png 2x" class="logo-light" alt="" /><img src="#" srcset="style/images/logo-dark.png 1x, style/images/logo-dark@2x.png 2x" class="logo-dark" alt="" /></a> </div>
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
	<div class="login-page">
  <div class="form">
    <form class="register-form" name="Register-Form" id="Register-Form" action="user/components/registration-process.php" method="Post">
      <!--Register form Controls-->
      <input type="text" placeholder="First Name" name="firstname" id="firstname" required pattern="[a-zA-Z]+" maxlength="15" title="Only letter are allowed. Eg:John" />

      <input type="text" placeholder="Last Name" name="lastname" id="lastname" required pattern="[a-zA-Z]+" maxlength="15" title="Only Letters are Allowed. Eg:Doe" />

      <input type="password" placeholder="Password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password" maxlength="16" title="Must contain 1 Uppercase letter, any number of Lowercase Letters,digits. Eg:Johndoe332" />

      <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="confirm_password" title="Must contain 1 Uppercase letter, any number of Lowercase Letters,digits. Eg:Johndoe332" maxlength="16" />
      <br>
      <div id="pass-info"></div>
      <br>
      <input type="text" placeholder="Username" id="username" name="username" required  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,15}$" maxlength="15" />

      <input type="text" placeholder="Mobile Number" name="mobileno" id="mobileno"
      pattern="[\+]\d{2}\d{2}\d{4}\d{4}" maxlength="15" required />

      <input type="email" placeholder="Email Address" name="email" id="email" required/>

      <button name="signup-button" id="signup-button">create account</button>
      <p class="message">Already registered? <a>Sign In</a></p>
      <span class="message" id="err" name="err" style="color:red;"></span>
    </form>
<!--Login Section-->
    <form class="login-form" method="Post" action="/user/components/login-process.php" name="login" role="form">
      <input type="text" placeholder="Username" name="username" id="uname" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,15}$" title="Username can contain only letter and numbers.Minimum 5 Characters and maximum 15.Eg:johndoe155" maxlength="15" />
 
      <input type="password" placeholder="Password" name="password"
      id="password1" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain 1 Uppercase letter, any number of Lowercase Letters,digits. Eg:Johndoe332" maxlength="16" />
      <p><a href="user/mailsms/userpassrecover.php">Forgot Password? </a></p>
      <button name="login_button">login</button>
      <p class="message">Not registered? <a>Create an account</a></p>
    </form>
  </div>
</div>
    <script src="style/js/login.js"></script>
    </main>
<!--/.body-wrapper --> 
<script src="style/js/bootstrap.min.js"></script> 
<script src="style/js/plugins.js"></script> 
<script src="style/js/classie.js"></script> 
<script src="style/js/jquery.themepunch.tools.min.js"></script> 
<script src="style/js/scripts.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#signup-button').click(function(){
      var fname=document.getElementById('firstname').val();
      var lname=document.getElementById('lastname').val();
      var mail=document.getElementById('email').val();
      var uname=document.getElementById('username').val();
      var pass=document.getElementById('password').val();
      var pass1=document.getElementById('confirm_password').val();
      var contact=document.getElementById('mobileno').val();
      var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if(fname=='')
      {
        $('#err').html('Enter Your Firstname!');
        return false;
      }
      if(lname=='')
      {
        $('#err').html('Enter Your Lastname!');
        return false;
      }
      if(uname=='')
      {
        $('#err').html('Enter Your Username!');
        return false;
      }
      if(pass=='')
      {
        $('#err').html('Enter Password!');
        return false;
      }
      if(pass1=='')
      {
        $('#err').html('Enter Your Confirmation Password!');
        return false;
      }
      if(contact='')
      {
        $('#err').html('Enter Your Mobile No.!');
        return false;
      }
      if(pass!=pass1)
      {
        $('#err').html('password and Confirm Password does not match!');
        return false;
      }
      if(mail=='')
      {
        $('#err').html('Enter Your EmailID!');
        return false;
      }
      if(!chk.test(mail))
      {
        $('#err').html('Enter valid Email ID!');
        return false;
      }
    });
  });
</script>
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=30813178"></script>
</body>
</HTML>
<?php } ?>