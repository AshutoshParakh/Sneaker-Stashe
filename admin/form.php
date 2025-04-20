<?php
#Connecting the database
$conn = mysqli_connect("localhost", "root", "", "shoes");



#checking that is button is clicked or not
if (isset($_POST['submit'])) {
    $id = $_POST['Pid'];
    $name = $_POST['Pname'];
    $dec = $_POST['descri'];
    $price = $_POST['Pprice'];
    $file = $_FILES['image']['name'];
    $query = "INSERT INTO `admin`(`id`, `name`, `image`, `price`, `description`) VALUES ('$id','$name','$file','$price','$dec')";
    try {
        $res = mysqli_query($conn, $query);
        if ($res) { #checking if it is true or not
            move_uploaded_file($_FILES['image']['tmp_name'], "$file");
            echo "<h1 style='text-align:center;font-size:30px;color:blue;border:solid blue;margin-top:-100px;background-color:white'>Enterd Sucessfully</h2>";
            include('add.html');
            
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
        echo("<h1 style='text-align:center;font-size:30px;color:red;border:solid red;margin-top:-100px;background-color:white'>Oops You Entered Same ID</h2>") ;
        include('add.html');
    }

}
?>