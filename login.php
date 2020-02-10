<?php
    session_start();
 	$email=$_POST['email'];
    $password=$_POST['password'];	
    //$email="IETadmin@gmail.com";
    //$password="IETadmin123";
    	$con=mysqli_connect("localhost","root","","alumni");
    	$x=mysqli_query($con,"select * from login where email='$email' && password='$password'");   
    	$r=mysqli_fetch_assoc($x);
    	if($r>0)
        {
    		$t=$r['type'];
            $college=$r['college'];
            $_SESSION['college']=$college;
    		if($t==1)
            {
    			//echo "Alumni";
                header("Location:alumni.php");
    		}
    		elseif($t==2){
    			//echo "College Admin";
                header("Location:panel/adminPanel.php");
            }
            elseif($t==3){
                //echo "Direcorate";
                header("Location:panel/directorPanel.php");
            }
    	}
    	else
 		{
            
            //echo "Try Again!";
            ?>
            <script type="text/javascript">
                alert("Invalid Id or Password. Try again!");
            </script>
            <?php
            header("Location:login.html");
        }

?>