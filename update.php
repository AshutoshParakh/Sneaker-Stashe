<?php
#Connecting the database
$conn = mysqli_connect("localhost", "root", "", "shoes");




#checking that is button is clicked or not
if (isset($_POST['submit'])) {
    $id = $_POST['Pid'];
    $name = $_POST['Pname'];
    $file = $_FILES['image']['name'];
    $price = $_POST['Pprice'];
    $dec = $_POST['descri'];
    $query="UPDATE `admin` SET `name`='$name',`image`='$file',`price`='$price',`description`='$dec' WHERE id='$id'";
    
    try {
        $res=mysqli_query($conn,$query);
        if ($res) { #checking if it is true or not
            move_uploaded_file($_FILES['image']['tmp_name'],"image/$file");
            echo "<h1 style='text-align:center;font-size:30px;color:blue;border:solid blue;margin-top:10px;background-color:white'>Updated Sucessfully</h2>";
            include('update.html');
            
            /*
            #Displaying Back Image
            $sel = "SELECT * FROM admin";
            $que = mysqli_query($conn, $sel);
            $output = "";
            if (mysqli_num_rows($que) < 1) {
            $output .= "<h3 class='text-center'>Phle image to Upload kr le</h3>";
            echo $output;
            }
            while ($row = mysqli_fetch_array($que)) {
            $output .= "<img src='" . $row['image'] . "' class='my-3' 
            style='width:100px;height:150px;'>";
            echo $output;
            }
            */
        }
    } catch (Exception $e) {
        echo "<h1 style='text-align:center;font-size:30px;color:red;border:solid red;margin-top:10px;background-color:white'>Oops Error Occured</h2>";
        include('update.html');
    }

}
?>
