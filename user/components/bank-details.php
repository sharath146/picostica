<?php 
session_start();
error_reporting(false);
if(!isset($_SESSION['user_username']))
{
	echo "<center><h1>Access Denied!!</h1></center>";
}
else
{
		include 'dbconnection.php';
		include 'alert.php';
		$sql=mysqli_query($con,"SELECT * FROM userbank WHERE user_id=$_GET[id]") or die(mysqli_error($con));
		?>
		<!DOCTYPE html>
<html>
<head>
	<title>Pic-O-Stica|User Bank Details</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.css">
	<script type="text/javascript" src="../assets/js/bootstrap/bootstrap.min.js"></script>
</head>
<body style="margin: 0 auto;background-color: rgba(200,200,400,1);" alink="white" vlink="white" link="white">
<div style="width: 100%;height: 100px;background-color: rgba(23,23,31,1);text-align: center;"><br>
	<a href="../" style="text-decoration: none;color: white;font-weight: bold;font-size: 30px;">Pic-O-Stica</a>
</div>
<div class="container">
    <h1 class="well">Bank Account Details FillUp Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
	<?php
		if(mysqli_num_rows($sql))
		{
			$trws=mysqli_fetch_array($sql);
	?>

				<form method="post" action="">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Full Name<i style="font-weight: normal;">(As in bank Account) *</i></label>
								<input type="text" placeholder="Enter Full Name Here.." value="<?php echo $trws['flname']; ?>" class="form-control" required pattern="[a-zA-Z ]+" title="Please enter a valid Name!" name="fullname">
							</div>
							<div class="form-group col-sm-6">
								<label>Account Number<i style="font-weight: normal;">(Please check twice before submitting!!) *</i></label>
								<input type="text" value="<?php echo $trws['accountno']; ?>" placeholder="Enter Account Number Here.." class="form-control" required pattern="[0-9]+" title="Only digits are allowed!!!" name="accno">
							</div>					
						<div class="form-group col-sm-6">
							<label>International Bank Account Number<i style="font-weight: normal;">(Optional)</i></label>
							<input type="text" value="<?php echo $trws['iban']; ?>" placeholder="Enter IBAN Here.." class="form-control" name="iban">
						</div>	
							<div class="col-sm-6 form-group">
								<label>Address<i style="font-weight: normal;">(Complete Bank Address)*</i></label>
								<textarea type="text" placeholder="Enter Bank Address Here.." class="form-control" rows="3" name="bankaddress" required><?php echo $trws['address']; ?>
								</textarea>
							</div>	
							<div class="col-sm-6 form-group">
								<label>Bank Name<i style="font-weight: normal;">(Please ensure!!)*</i></label>
								<input type="text" value="<?php echo $trws['bankname']; ?>" placeholder="Enter Bank Name Here.." class="form-control" required name="bankname">
							</div>	
							<div class="col-sm-6 form-group">
								<label>IFSC Code:<i style="font-weight: normal;">(Unique 11-digit code.Eg:ICIC0001245)*</i></label>
								<input type="text" value="<?php echo $trws['ifsc']; ?>" placeholder="Enter IFSC Code Here.." class="form-control" required name="ifsccode" maxlength="11">
							</div>		
						</div>		
						<br>	
					<center><button type="submit" class="btn btn-lg btn-info" name="update-button">Update</button></center>
					<div class="row">
						<div class="col-sm-12">
						<p class="input-sm">
						Note: Please Ensure the account details that you have entered above. If any mistakes in details we are not liable for payment abuse. We will credit your commission only to this account as per the details given by you.<br>
						Your Account details will be safe with us...
						</p>
						</div>
					</div>				
					</div>
				</form>
			<?php }
			else
			{ 
				?> 
				<form method="post" action="">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Full Name<i style="font-weight: normal;">(As in bank Account) *</i></label>
								<input type="text" placeholder="Enter Full Name Here.." class="form-control" required pattern="[a-zA-Z ]+" title="Please enter a valid Name!" name="fullname">
							</div>
							<div class="form-group col-sm-6">
								<label>Account Number<i style="font-weight: normal;">(Please check twice before submitting!!) *</i></label>
								<input type="text" placeholder="Enter Account Number Here.." class="form-control" require pattern="[0-9]+" title="Only digits are allowed!!!" name="accno">
							</div>					
						<div class="form-group col-sm-6">
							<label>International Bank Account Number<i style="font-weight: normal;">(Optional)</i></label>
							<input type="text"  placeholder="Enter IBAN Here.." class="form-control" name="iban">
						</div>	
							<div class="col-sm-6 form-group">
								<label>Address<i style="font-weight: normal;">(Complete Bank Address)*</i></label>
								<textarea type="text"  placeholder="Enter Bank Address Here.." class="form-control" rows="3" name="bankaddress" required onfocus="this.value='';">
								</textarea>
							</div>	
							<div class="col-sm-6 form-group">
								<label>Bank Name<i style="font-weight: normal;">(Please ensure!!)*</i></label>
								<input type="text"  placeholder="Enter Bank Name Here.." class="form-control" required name="bankname">
							</div>	
							<div class="col-sm-6 form-group">
								<label>IFSC Code:<i style="font-weight: normal;">(Unique 11-digit code.Eg:ICIC0001245)*</i></label>
								<input type="text"  placeholder="Enter IFSC Code Here.." class="form-control" required name="ifsccode">
							</div>		
						</div>		
						<br>	
					<center><button type="submit" class="btn btn-lg btn-info" name="submit-button">Submit</button></center>
					<div class="row">
						<div class="col-sm-12">
						<p class="input-sm">
						Note: Please Ensure the account details that you have entered above. If any mistakes in details we are not liable for payment abuse. We will credit your commission only to this account as per the details given by you.<br>
						Your Account details will be safe with us...
						</p>
						</div>
					</div>				
					</div>
				</form>
				<?php } ?>
				</div>
	</div>
	</div>
</body>
</html>
<?php 
if(isset($_POST['submit-button']))
{
	$uid=$_GET['id'];
	$fullname=$_POST['fullname'];
	$accno=$_POST['accno'];
	$iban=$_POST['iban'];
	$bankaddress=$_POST['bankaddress'];
	$bankname=$_POST['bankname'];
	$ifsccode=$_POST['ifsccode'];
	if(empty($iban))
	{
		$sq="INSERT INTO userbank(user_id,flname,accountno,address,bankname,ifsc) VALUES($uid,'$fullname','$accno','$bankaddress','$bankname','$ifsccode')";
	}
	else
	{
	$sq="INSERT INTO userbank(user_id,flname,accountno,iban,address,bankname,ifsc) VALUES($uid,'$fullname','$accno','$iban','$bankaddress','$bankname','$ifsccode')";
	}

	$result=mysqli_query($con,$sq) or die(mysqli_error($con));
	if(mysqli_affected_rows($con))
	{
		?>
		<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Details Added Successfully!!",
                     text: "Redirecting..",
                      type: "success",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../index.php";
                        });
                        });
                        </script>
		<?php
		header('refresh:1;url=commission.php');
	}
	else
	{
		?>
		<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Sorry!!",
                     text: "Couldnot save your details!!Try Again!",
                      type: "info",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../index.php";
                        });
                        });
                        </script>
		<?php
		header('refresh:1;url=bank-details.php');
	}
}
if(isset($_POST['update-button']))
{
	$uid=$_GET['id'];
	$fullname=$_POST['fullname'];
	$accno=$_POST['accno'];
	$iban=$_POST['iban'];
	$bankaddress=$_POST['bankaddress'];
	$bankname=$_POST['bankname'];
	$ifsccode=$_POST['ifsccode'];
	if(empty($iban))
	{
		$sq="UPDATE userbank SET user_id=$uid,flname='$fullname',accountno='$accno',address='$bankaddress',bankname='$bankname',ifsc='$ifsccode'";
	}
	else
	{
	$sq="UPDATE userbank SET user_id=$uid,flname='$fullname',accountno='$accno',address='$bankaddress',bankname='$bankname',ifsc='$ifsccode',iban='$iban'";
	}

	$result=mysqli_query($con,$sq) or die(mysqli_error($con));
	if(mysqli_affected_rows($con))
	{
		?>
		<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Details Updated Successfully!!",
                     text: "Redirecting..",
                      type: "success",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../index.php";
                        });
                        });
                        </script>
		<?php
		header('refresh:1;url=commission.php');
	}
	else
	{
		?>
		<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Sorry!!",
                     text: "Couldnot save your details!!Try Again!",
                      type: "info",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../index.php";
                        });
                        });
                        </script>
		<?php
		header('refresh:1;url=bank-details.php');
	}
}

 ?>

<?php } ?>
