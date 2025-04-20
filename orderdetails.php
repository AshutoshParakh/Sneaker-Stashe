<?php
$con = mysqli_connect("localhost", "root", "", "shoes");
if (mysqli_connect_error()) {
    echo "
    <script>
    alert('Database Conectivity Error');
    window.location.href='c ategory.html';
    </script>
    ";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="stylesheet.css">

    <!-- Main css -->
    
</head>

<body>
    <!--Opening it-->
    <div class="container" style="margin-left:1rem">
        <aside>
            <!-- Aside tag is used to saprate any part -->
            <div class="top">
                <!-- Logo section starting -->
                <div class="logo">
                    <img src="img/shoesimg-removebg-preview5.png">
                    <h2>Creative <span class="danger">Shoes</span></h2>
                </div>
                <!-- Close Button -->
                <div class="close" id="close-btn">
                    <!-- Close icon -->
                    <span class="material-icons-sharp"> close </span>
                </div>
            </div>
            <!--Sidebar section-->
            <div class="slidebar">
                <!--option section -->
                <a href="admin_dashboard.php">
                    <span class="material-icons-sharp"> grid_view </span>
                    <h3>Dashboard</h3>
                </a>

                <a href="add.html">
                    <span class="material-icons-sharp"> add </span>
                    <h3>Add Product</h3>
                </a>

                <a href="update.html">
                    <span class="material-icons-sharp"> update </span>
                    <h3>Update Product</h3>
                </a>

                <a href="remove.html">
                    <span class="material-icons-sharp"> delete </span>
                    <h3>Delete Product</h3>
                </a>

                <a href="orderdetails.php" class="active">
                    <span class="material-icons-sharp"> shopping_basket </span>
                    <h3>Order Details</h3>
                </a>

                <a href="display.php">
                    <span class="material-icons-sharp"> shopping_cart </span>
                    <h3>Product Details</h3>
                </a>


                <a href="login.html">
                    <span class="material-icons-sharp"> logout </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- start of main -->
        <main >
            <table class="table table-dark text-center" style="width:55vw; height:70vh;" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Address</th>
                        <th scope="col">Pay Mode</th>
                        <th scope="col">Orders</th>
                        <th scope="col">Shoe Size</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        #For Fatching User Data
                        $query ="SELECT * FROM `order_manager`";
                        #Firing the query
                        $user_part=mysqli_query($con,$query);
                        #implimanting it so that we can fatch data until we recive rows in table
                        while($user_fetch=mysqli_fetch_assoc($user_part))
                        {
                            echo "
                                <tr>
                                    <td style='color:white'>$user_fetch[Order_Id]</td>
                                    <td style='color:white'>$user_fetch[Full_Name]</td>
                                    <td style='color:white'>$user_fetch[Phone_No]</td>
                                    <td style='color:white'>$user_fetch[Address]</td>
                                    <td style='color:white'>$user_fetch[Pay_Mod]</td>
                                    <td>
                                        <table class='table text-center table-dark'>
                                            <thead>
                                                <tr>
                                                    <th scope='col' style='color:white'>Item Name</th>
                                                    <th scope='col' style='color:white'>Price</th>
                                                    <th scope='col' style='color:white'>Quantitiy</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
                                        ";

                                        $order_query="SELECT * FROM `order` WHERE Order_Id='$user_fetch[Order_Id]'";
                                            
                                        $order_result=mysqli_query($con,$order_query);
                                    
                                        while($order_fetch=mysqli_fetch_assoc($order_result))
                                            {
                                            
                                            echo"
                                                <tr>
                                                    <td style='color:white'>$order_fetch[Item_Name]</td>
                                                    <td style='color:white'>$order_fetch[Price]</td>
                                                    <td style='color:white'>$order_fetch[Quantity]</td>
                                                </tr>
                                                
                                                    ";
                                                }
                                    echo"
                                               
                                            </tbody>
                                        </table>   
                                        <td style='color:white'>$user_fetch[Size]</td>                                 
                                    </td>
                                </tr>
                            ";
                        }
                        ?>
                </tbody>
            </table>



        </main>
        <!-- Ennd of main-->

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp"> menu </span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active"> light_mode </span>
                    <span class="material-icons-sharp"> dark_mode </span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Admin</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="img/profile.jpg" alt="Profile Photo">
                    </div>
                </div>
            </div>
            <!--End of top -->

        </div>
    </div>

    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>












</body>

</html>