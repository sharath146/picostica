<?php
//Script to check the uploaded image on various conditions
        session_start();
        $loginuser=$_SESSION['user_username'];
        require '../database/dbconnection.php';
        $target_dir='';
        $user_id='';
        $new_watermark_width=0;
        $new_watermark_height=0; 
        $response=''; 
        //turn on php error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        if (isset($_REQUEST['Upload-Button'])) 
        {
            $sql="SELECT * FROM user WHERE uname='$loginuser'";
            $result2=mysqli_query($con,$sql);
            $trws=mysqli_num_rows($result2);
            if($trws==1)
            {
                $rws=mysqli_fetch_array($result2);
                $user_id=$rws['user_id'];
            }
            $test_dir='uploads/'.$user_id;
            //create a new directory inside uploads/images/
            if(!is_dir($test_dir))
            {
                 $mkdiresult=mkdir($test_dir);//function to create a directory with user_id
                if($mkdiresult==1)
                {
                  //echo "Directory Created!!";
                  $target_dir =$test_dir;
                }
                else
                {
                    //echo "Directory Already Exists!!";
                }
            }
            else{

                $target_dir=$test_dir;
            }
            $name     = $_FILES['ImageFile']['name'];
            $tmpName  = $_FILES['ImageFile']['tmp_name'];
            $type     = $_FILES['ImageFile']['type'];
            $error    = $_FILES['ImageFile']['error'];
            $size     = $_FILES['ImageFile']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;
                    //validate file extensions
                    if ( !in_array($ext, array('jpg','jpeg','png')) ) {
                        $valid = false;
                        $response = 'Invalid file extension!!';
                    }
                    //validate file size
                    if ( $size/1024/1024 > 8 ) {
                        $valid = false;
                        $response = 'File size is exceeding maximum allowed size.';
                    }
                    //upload file
                    if ($valid) {
                        $RandomNum=rand(0,9999999999);
                        $NewImageName=$RandomNum."-".$loginuser.".".$ext;
                        $finaldir=$target_dir.'/'.$NewImageName;
                        $uploadstatus=move_uploaded_file($tmpName,$finaldir);
                        include '../components/imagefunctions.php';
                        $thumbname=$RandomNum."-thumb".$loginuser.".".$ext;
                        $pathToThumbs='../thumbs/';
                        createThumbs($pathToThumbs,300,$finaldir,$thumbname);
                        if($uploadstatus==true)
                        {
                            require 'image_to_database.php';
                             $watermark = imagecreatefrompng('watermark.png');//Load a png file
                             if($ext=='png')
                             {
                                $imageURL=imagecreatefrompng($finaldir);
                             }
                             else
                             {
                            $imageURL = imagecreatefromjpeg($finaldir);//load a jpg file
                             }
                        $imageSize=getimagesize($finaldir);
                        $watermark_width =imagesx($watermark);
                        $watermark_height = imagesy($watermark);
                        $new_watermark_width=$imageSize[0]-20;
                        $new_watermark_height=$watermark_height * $new_watermark_width/$watermark_width;
                        imagecopyresized($imageURL,//Destination Image
                        $watermark,//Source Image
                        $imageSize[0]/2 - $new_watermark_width/2,//Destination X
                        $imageSize[1]/2 - $new_watermark_height/2,//Destination Y
                        0,//Source x
                        0,//Source Y
                        $new_watermark_width,//Destination W
                        $new_watermark_height,//Destination H
                        imagesx($watermark),//Source W 
                        imagesy($watermark));//Source H
                        /*header('Content-type: image/png');
                        imagepng($imageURL);*/
                        $watermark_path='watermarked/'.$NewImageName;
                        if($ext=='png')
                        {
                            imagepng($imageURL,'../watermarked/'.$NewImageName,5);
                        }
                        else
                        {
                            imagejpeg($imageURL,'../watermarked/'.$NewImageName, 60);//output the image to a file
                        }
                        flush();
                        $sql15="SELECT * FROM image_less WHERE img_path='$finaldir'";
                        $result15=mysqli_query($con,$sql15) or die(mysqli_error($con));
                        $trws=mysqli_fetch_array($result15);
                        $image_ide=$trws['image_id'];
                        $sql21="INSERT INTO files(image_id,image_path,user_id) VALUES($image_ide,'$watermark_path',$user_id)";
                        $result21=mysqli_query($con,$sql21) or die(mysqli_error($con));
                            ?>
                <script type="text/javascript">
                alert('Upload Successfull!!');
                window.location.href='../index.php';
            </script>
                   <?php
                    }
                      }
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    $response = 'Maximum file size Exceeded!!';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $response = 'The uploaded file was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $response = 'No file was uploaded.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $response = 'Missing a temporary folder.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $response = 'Failed to write file to disk.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $response = 'File upload stopped by extension.';
                    break;
                default:
                    $response = 'Unknown error';
                break;
            }
 
            echo "<CENTER><h1>".$response."</h1></center>";
        }
        ?>