<?php 
//this page contains script that retrieves images based on particular text
session_start();
error_reporting(0);
include '../database/dbconnection.php';
$status='';
?>
<!DOCTYPE html>
<html>
<head>
<title>Pic-O-Stica | Search</title>
<style>
a:hover{
    color:white;
    text-decoration: none;
}
a:active{
    color:white;
    text-decoration: none;
}
a:visited{
    color:white;
    text-decoration: none;
}
a:focus{
    color:white;
    text-decoration: none;
}
a:link
{
    color:white;
    text-decoration: none;
}
div.img {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 250px;
}
div.img:hover {
    border: 1px solid #777;
}

div.img img {
    width: 100%;
    height: auto;
}

div.desc {
    background-color: gold;
    font-family: century gothic,'serif';
    font-weight: bold;
    padding: 15px;
    text-align: center;
}
</style>
<script type="text/javascript" src="../../style/js/jquery.min.js"></script>
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
<body style="margin: 0 auto;">
<div style="background-color: rgba(23,23,31,1);width: 100%;height: 100px;"><br><br>
<a href="../../index.php" style="font-weight: bold;text-align: center;font-size: 30px;padding: 50px;">Pic-O-Stica</a>
</div>
<div>
    <center><h2><?php if(!isset($_GET['s'])) 
    //If $_GET['s'] is not set
        {echo "0 Results returned!!!";}
            ?>
        </h2></center>
</div>
<?php
if($_GET['s']=='')
{
    $status="Search Returned 0 Results!!!";
}
else
{
//Search option for users who are not registered
if(!isset($_SESSION['user_username'])&& isset($_GET['s']))
{
    $clientIP=$_SERVER['REMOTE_ADDR'];//Get the IP ADDRESS of the USer
        $searchtext=mysqli_real_escape_string($con,$_GET['s']);
        stripslashes($searchtext);//remove slash characters
        trim($searchtext);//Remove spaces
        //Query to retrieve image details based on searchtext
         $sql1="SELECT * FROM image_less WHERE img_desc LIKE '%$searchtext%' or img_title='%$searchtext%' ORDER BY image_id";
         //Query to insert searchtext and IP in queries
        $sql0="INSERT INTO queries(topic,ipaddr) VALUES('$searchtext','$clientIP')";
        mysqli_query($con,$sql0) or   die(mysqli_error($con));
        $result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
        //If search is successfull display images
        if(mysqli_num_rows($result1))
        {
            echo '<div id=thumb><ul>';
            while($rws1=mysqli_fetch_array($result1))
            {
                $image_id=$rws1['image_id'];
                $path="../upload/".$rws1['img_path'];
                echo "<div class=img>";
                echo "<a target=_blank href=../../single.php?id=".$image_id.">";
                echo "<img src=../thumbs/".$rws1['thumb_path']." alt=".$rws1['img_title']." width=400 height=300></a>";
                echo "<div class=desc>".$rws1['img_title']."</div>";
    echo "<a target=_blank href=../../single.php?id=$image_id><button type=submit>View Full Size</button></a>
    </div>";
                echo "</div>";
            }
            echo "</div></ul>";
        }
        //Else display err message
        else
        {
            $status= "Search returned 0 Results!!!";
        }

}
//Search for the users who are registered
if(isset($_SESSION['user_username'])&& isset($_GET['s']))
{
    $current_user=$_SESSION['user_username'];
    //Query to retrieve user_id form user table
    $sql00="SELECT user_id FROM user WHERE uname='$current_user'";
    $result0=mysqli_query($con,$sql00) or die(mysqli_error($con));
    $rws0=mysqli_fetch_array($result0);
    $userid=$rws0['user_id'];
    $searchtext=mysqli_real_escape_string($con,$_GET['s']);
        stripslashes($searchtext);
        trim($searchtext);
        $sql1="SELECT * FROM image_less WHERE img_desc LIKE '%$searchtext%' or img_title='%$searchtext%' ORDER BY image_id";
        //Insert seacrhtext and userid in queries table
        $sql0="INSERT INTO queries(topic,user_id) VALUES('$searchtext',$userid)";
        mysqli_query($con,$sql0) or die(mysqli_error($con));
        $result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
        if(mysqli_num_rows($result1))
        {
            echo '<div id=thumb><ul>';
            while($rws1=mysqli_fetch_array($result1))
            {
                $image_id=$rws1['image_id'];
                $path="../upload/".$rws1['img_path'];
                echo "<div class=img>";
                echo "<a target=_blank href=../single.php?id=".$image_id.">";
                echo "<img src=../thumbs/".$rws1['thumb_path']." alt= width=400 height=300></a>";
                echo "<div class=desc>".$rws1['img_title']."</div>";
echo "<div style=background-color:green;text-align:center;padding-top:5px;padding-bottom:5px;><a target=_blank href=../cart.php?imgid=$image_id&price=16&title=$rws1[img_title]><button type=submit  style=background-color: #eb9e4f;border: 0;padding: 3px 10px;color: #ffffff;margin-left: 2px;border-radius: 2px;/>AddtoCart</button></a>
    <a target=_blank href=../single.php?id=$image_id><button type=submit>View Full Size</button></a>
    </div>";
                echo "</div>";
            }
        }
        else
        {
            $status= "Search returned 0 Results!!!";
        }
}
}
echo "<center><h2>".$status."</h2></center>";
?>

</body>
</html>