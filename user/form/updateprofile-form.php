<?php
//Form to display the user details and he/she can update the details
 session_start();
$user_username=$_SESSION['user_username'];
?>
<head>
<link rel="shortcut icon" href="../../style/images/favicon.ico">
<title>Picostica | Update Profile</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap/bootstrap.css" rel="stylesheet">
      
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome/font-awesome.css">

    <!-- PACE CSS -->
    <link rel="stylesheet" href="../assets/css/pace/pace.css">

    <style type="text/css">
        a:link{
            text-decoration: none;
        }
        a:visited{
            text-decoration: none;
            color:white;
        }
        a:focus{
            text-decoration: none;
            color:white;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body style="margin: 0 0;padding:0">
<div style="width: 100%;height: 100px;background-color: rgba(23,23,31,1);color: white;"><br>
    <a href="../index.php" style="text-align: center;font-weight: bold;font-family: century gothic,'serif';font-size: 40px;padding: 100px;">Pic-O-Stica</a>
</div>
<form action="../components/updateprofileaftrreg.php" method="post" enctype="multipart/form-data" autocomplete="off">
<?php

require '../database/dbconnection.php';
	//$username=mysqli_real_escape_string($con,$_REQUEST['user_username']);
	$sql="SELECT * FROM user WHERE uname='$user_username'";
	$result=mysqli_query($con,$sql);
	$rws=mysqli_fetch_array($result);
    if($rws['gender']=='male')
    {
        $male_status='checked';
    }
    else
    {
        $male_status='unchecked';
    }
    if($rws['gender']=='female')
    {
        $female_status='checked';
    }
    else
    {
        $female_status='unchecked';
    } 
    $avatar='default.jpg';
    $avatar=$rws['user_avatar'];
    $img_dir='../userfiles/avatars/'.$avatar;
        ?>
        <br>
    <center><h2>----Update Profile----</h2></center>
	<div class="col-md-5">
        <div class="form-group">
            <label for="">First Name</label>
            <input type="text" class="form-control" placeholder="<?php echo $rws['fname'];?>" name="firstname" value="<?php echo $rws['fname'];?>" required pattern="[a-zA-Z]+" title="Only letters allowed. Eg:John" size="15">
        </div>
        <div class="form-group float-label-control">
            <label for="">Last Name</label>
            <input type="text" class="form-control"  placeholder="<?php echo $rws['lname'];?>" name="lastname" value="<?php echo $rws['lname'];?>" required pattern="[a-zA-Z]+" title="Only letter are allowed. Eg:Doe" size="15">
        </div>
        <div class="form-group float-label-control">
        <center><img src="<?php echo $img_dir; ?>" class="img-circle" width="200" height="200"></center><br><br>
            <label for="">Avatar</label>
            <center><input name="ImageFile"  class="btn btn-primary ladda-button" data-style="zoom-in"  type="file" accept="image/jpg,image/png,image/gif,image/jpeg" /></center>
        </div>           
        <label for="">Username</label>
        <div class="form-group float-label-control">
            <a href="http://<?php echo 'www.picostica.com';?>/<?php echo $rws['uname'];?>">        
                <div class="input-group">
                    <span class="input-group-addon">http://<?php echo "picostica.com";?>/</span>
                    <fieldset disabled=""> 
                        <input type="text" class="form-control" placeholder="<?php echo $rws['uname'];?>" name="username" value="<?php echo $rws['uname'];?>" id="disabledTextInput" autocomplete="off" required>
                    </fieldset>
                </div>
            </a>
        </div>
        <div class="form-group float-label-control">
            <label for="">Password</label>
            <input type="password" class="form-control" placeholder="<?php echo $rws['password'];?>" name="password" value="<?php echo $rws['password'];?>" required>
        </div>
        <div class="form-group float-label-control">
            <label for="">Email</label>
            <input type="text" class="form-control" placeholder="<?php echo $rws['email'];?>" name="email" value="<?php echo $rws['email'];?>" required>
        </div>
        </div>
        <div class="col-md-1">
            
        </div>
        <div class="col-md-5">
        <div class="form-group float-label-control">
            <label for="">Mobile No.</label>
            <input type="text" class="form-control" placeholder="<?php echo $rws['mobile_no'];?>" name="contactno" value="<?php echo $rws['mobile_no'];?>" required>
        </div>
        <div class="form-group float-label-control">
            <label for="">Bio</label>
            <textarea class="form-control" placeholder="<?php echo $rws['user_bio'];?>" rows="5" placeholder="<?php echo $rws['user_bio'];?>" name="bio" value="<?php echo $rws['user_bio'];?>"><?php echo $rws['user_bio'];?></textarea>
        </div>
        <div class="form-group float-label-control">
            <label for="">Date of Birth</label>
            <input type="date" class="form-control" placeholder="<?php echo $rws['dob'];?>" name="dob" value="<?php echo $rws['dob'];?>" required min="1979-01-01" max="2000-12-31">
        </div>
        <div class="form-group float-label-control">
            <label for="">Profession</label>
            <input type="text" class="form-control" placeholder="<?php echo $rws['profession'];?>" name="profession" value="<?php echo $rws['profession'];?>" required>
        </div>
        <div class="form-group float-label-control">
            <label for="">Gender</label><br>&nbsp;&nbsp;&nbsp;&nbsp;
             <label for="">Male<input type="radio" name="gender" class="form-control" <?php echo $male_status; ?> value="male"></label>&nbsp;&nbsp;&nbsp;&nbsp;
             <label for="">Female<input type="radio" name="gender" class="form-control" <?php echo $female_status; ?> value="female"></label>
        </div>
        <div class="form-group float-label-control">
            <label for="">Address</label>
            <input type="text" class="form-control" placeholder="<?php echo $rws['address'];?>" name="address" value="<?php echo $rws['address'];?>" required>
        </div>
        <div class="form-group float-label-control">
            <label for="">Country</label>
            <input type="text" class="form-control" placeholder="<?php echo $rws['country'];?>" name="country" value="<?php echo $rws['country'];?>" required>
        </div>                             
    <div class="submit">           
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" name="Update-Button" value="Upload" />Update Your Profile</button>
        </center>
    </div>
    </div>
</form>
</body>
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=30813178"></script>