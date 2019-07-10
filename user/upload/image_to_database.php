<?php
	$category_id='';//Variable to store the category ID
	list($width,$height,$type,$attr)=getimagesize($target_dir.'/'.$NewImageName);//Get the image information
	switch ($type) {
		//Set the type of image
		case 1:$img_type='GIF';
			break;
		case 2:$img_type='JPG';
				break;
		case 3:$img_type='PNG';
				break;
		case 4:$img_type='SWF';
				break;
		case 5:$img_type='PSD';
				break;
		case 6:$img_type='BMP';
				break;
		case 7:$img_type='TIFF';
				break;
		case 9:$img_type='JPC';
				break;
		case 10:$img_type='JP2';
				break;
		case 11:$img_type='JPX';
				break;
		case 12:$img_type='JB2';
				break;
		case 13:$img_type='SWC';
				break;
		case 14:$img_type='IFF';
				break;
		case 15:$img_type='WBMP';
				break;
		case 16:$img_type='XBM';
				break;
	}
	$image_path=$finaldir;//Directory path where the image is stored
	$image_title=$_REQUEST['img_title'];//Title of image
	$image_desc=$_REQUEST['img_desc'];//Description of image
	$cat_name=$_REQUEST['cat'];//Category of image
	//Query to get the category ID corresponding to category name
	$sql4="SELECT * FROM category WHERE cat_name='$cat_name'";
	$result=mysqli_query($con,$sql4);
	$trws=mysqli_num_rows($result);
	if($trws==1)
	{
		$rws=mysqli_fetch_array($result);
		$category_id=$rws['cat_id'];
	}
	//Query to insert upload datas into Image_less
	$sql5="INSERT INTO image_less(user_id,img_width,img_height,img_title,img_desc,upload_date,image_type,category_id,img_path,thumb_path) VALUES($user_id,$width,$height,'$image_title','$image_desc',now(),'$img_type',$category_id,'".$image_path."','$thumbname')";
	$result1=mysqli_query($con,$sql5) or die(mysqli_error($con));
 ?>