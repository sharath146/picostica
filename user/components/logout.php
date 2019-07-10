<?php
	//script for logging out an user
    session_start();
    require '../database/dbconnection.php';
    $user=$_SESSION['user_username'];
    //QUERY to update user_status to 0
    $sql27="UPDATE user SET user_status=0 WHERE uname='$user'";
    $result27=mysqli_query($con,$sql27) or die(mysqli_error($con));
    //Unset all the active sessions
    unset($_SESSION['user_username']);
    unset($_SESSION['user_userpassword']);
    //redirect to homepage
    include 'alert.php';
?>
<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Logout Successfull!",
                     text: "See You Soon",
                      type: "success",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../index.php";
                        });
                        });
                        </script>
<?php 
    header('refresh:1;url=../../index.php');
 ?>