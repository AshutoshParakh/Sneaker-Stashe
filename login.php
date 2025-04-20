<?php
require("connection.php");

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $password=$_POST['Admin_Password'];
    $query="SELECT name,adminpassword FROM `admin_login` WHERE name='$name' and adminpassword='$password'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        echo "<script>
        alert ('Welcome Admin !!');
        window.location.href='admin_dashboard.php'
        </script>";
        
    }
    else
    {
        $user_id=$_POST['name'];
        $password=$_POST['Admin_Password'];
        $query="SELECT 'id','userpassword' FROM `user_login` WHERE id='$user_id' and userpassword='$password'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
            echo "<script>
            alert ('Welcome user !!');
            window.location.href='index.html'
            </script>";
        }
        else
        {
            echo "<script>
            alert ('Not Registered Please Login!!');
            window.location.href='index.html'
            </script>";
        }
    }
   
}