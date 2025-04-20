<?php
#Creating Connection with database
$conn = mysqli_connect("localhost", "root", "", "shoes");
$id = $_POST['Pid'];
#Creating Select Query
$query = "SELECT `id` FROM `admin` WHERE id='" . $id . "'";

try {

    $fire = mysqli_query($conn, $query);
    if (mysqli_num_rows($fire) > 0) {
        $query = "DELETE FROM `admin` WHERE id='$id'";
        $fire = mysqli_query($conn, $query);
        if ($fire) {
            echo "<h1 style='text-align:center;font-size:30px;color:blue;border:solid blue;margin-top:-100px;background-color:white'>Removed Sucessfully</h2>";
            include('remove.html');
        }

   } 
   else{
    echo ("<h1 style='text-align:center;font-size:30px;color:red;border:solid red;margin-top:-100px;background-color:white'>Please Enter Valid Id</h2>");
    include('remove.html');
   }

} catch (Exception $e) {
    echo ("<h1 style='text-align:center;font-size:30px;color:red;border:solid red;margin-top:-100px;background-color:white'>Please Enter Valid Id</h2>");
    include('remove.html');
}
#Creating Deleting Query






?>