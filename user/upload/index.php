<?php 
session_start();
if(!isset($_SESSION['user_username']))
{
  echo "<center><h1>Access Denied!!!</h1><h4>Redirecting....</h4></center>";
  header('refresh:1,url=../../login.php');
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pic-O-Stica Image Uploader</title>
 
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
 
  <body>
 
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" style="color:white;background-color: rgba(23,23,31,1);font-weight: bold; height: 100px;padding-top: 20px;">
      <div class="container">
        <div class="navbar-header">
          <center><a class="navbar-brand" href="../index.php" style="color:white;font-weight: bold;font-family: 'Century Gothic',serif;font-size: 30px;">Pic-O-Stica</a></center>
        </div>
      </div>
    </div>
 
 
    <div class="container bg-info" style="padding: 15px;">
          <div class="row">
            <div class="col-lg-12">
               <form action="upload-check.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="file">Select a file to Upload</label>
                    <input type="file" name="ImageFile" required accept="image/jpeg,image/png,image/jpg" class="form-control btn btn-info col-md-4">
                    <p class="help-block">Only jpg,jpeg,png file with maximum size of 8 MB is allowed.</p>
                  </div>
                  <div> 
                    <label for="img_title">Title</label>
                    <input type="text" name="img_title" class="form-control" maxlength="250" required>
                  </div>
                  <br>
                  <div> 
                    <label for="img_desc">Description</label>
                    <input type="text" name="img_desc" class="form-control" maxlength="250" required>
                  </div>
                  <br>
                <div class="dropdown text-info"><label for="cat">Select Category</label>
                  <select name="cat" class="form-control" id="cat" required>
                    <option value="Abstract">Abstract</option>
                    <option value="Animals">Animals</option>
                    <option value="Architecture">Architecture</option>
                    <option value="Art-Illustrations">Art-Illustrations</option>
                    <option value="Backgrounds">Backgrounds</option>
                    <option value="Business">Business</option>
                    <option value="Communication">Communication</option>
                    <option value="Computers">Computers</option>
                    <option value="Conceptual">Conceptual</option>
                    <option value="Editorial">Editorial</option>
                    <option value="Education">Education</option>
                    <option value="Food">Food</option>
                    <option value="Health">Health</option>
                    <option value="Holidays">Holidays</option>
                    <option value="Industry">Industry</option>
                    <option value="Internet">Internet</option>
                    <option value="Landscapes">Landscapes</option>
                    <option value="Maps">Maps</option>
                    <option value="Miscellaneous">Miscellaneous</option>
                    <option value="Musical">Musical</option>
                    <option value="Nature">Nature</option>
                    <option value="Objects">Objects</option>
                    <option value="People">People</option>
                    <option value="Places">Places</option>
                    <option value="Sexy">Sexy</option>
                    <option value="Sports">Sports</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Wildlife">Wildlife</option>
                    <option value="Textures">Textures</option>
                    <option value="Beauty">Beauty</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Building">Building</option>
                    <option value="Landmarks">Landmarks</option>
                    <option value="Finance">Finance</option>
                    <option value="Celebrities">Celebrities</option>
                    <option value="Drinks">Drinks</option>
                    <option value="Healthcare">Healthcare</option>
                    <option value="Medical">Medical</option>
                    <option value="Interiors">Interiors</option>
                    <option value="Park">Park</option>
                    <option value="Outdoor">Outdoor</option>
                    <option value="Religion">Religion</option>
                    <option value="Science">Science</option>
                    <option value="Signs">Signs</option>
                    <option value="Symbols">Symbols</option>
                    <option value="Recreation">Recreation</option>
                    <option value="Technology">Technology</option>
                    <option value="Vectors">Vectors</option>
                    <option value="Vintage">Vintage</option>
                  </select>
                </div>
                <br>
                  <input type="submit" class="btn btn-lg btn-primary" value="Upload" name="Upload-Button">
                </form>
            </div>
          </div>
    </div> <!-- /container -->
 <script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=30813178"></script>
  </body>
</html>
<?php 
} ?>