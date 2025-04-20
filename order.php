<?php
#Connecting the database
$con = mysqli_connect("localhost","root","","shoes");
#giving shoe size
$Shoe_size1=$_POST["shoe_size"];
#Starting the Session
session_start();
#Checking For error in connecting with databse
if(mysqli_connect_error()){
    echo "<script>
    alert('Error in Connecting with Database!!');
    window.location.href='cart.php';
    </script>";
    exit();
}
#When session Starts Destroy the Session
#session_destroy();
#Checking if the request is comming from Post method
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Purchase']))
    {
        #Creating Insert Query
        $query1 ="INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Address`, `Pay_Mod`,`Size`) VALUES ('$_POST[fullname]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]','$_POST[size]')";
        #Firing the Query and checking it
        if(mysqli_query($con,$query1)){
            #mysqli_insert-id is used to fatch Automated genrated column
            $Order_Id=mysqli_insert_id($con);
            #Now transfering data to differnt databse
            $query2 = "INSERT INTO `order`(`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
            #using ? for prepared statments.(Template of a query)
            #now preparing the query for firing
            $stmt=mysqli_prepare($con,$query2);
            #checking if query is prepared or not
            if($stmt)
            {
                #using mysqli_stmt_bind_param so that we can prepare for template query and "isiii" is int,string,int,int,int (daatypes of product).
                mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$Item_Name,$Price,$Quantity);
                #For storing values in variable
                foreach($_SESSION['cart'] as $key => $value){
                    $Item_Name=$value['Item_Name'];
                    $Price=$value['Price'];
                    $Quantity=$value['Quantity'];
                    #Firing the final query
                    mysqli_stmt_execute($stmt);
                    
                }
                #Now removing all Items From cart as data is stored in database
                unset($_SESSION['cart']);
                echo "<script>
                alert('Order Succesfully Placed ');
                window.location.href='index.html';
                </script>";
            }
            else{
                echo "<script>
                alert('Database Query Prepared Error!!!');
                window.location.href='cart.php';
                </script>";
            }
        }
        else{
            echo "<script>
            alert('Database Error!!!');
            window.location.href='cart.php';
            </script>";
        }

    }

}
?>