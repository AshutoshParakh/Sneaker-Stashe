<?php
$conn=mysqli_connect("localhost", "root", "", "shoes");
if (mysqli_connect_error()) {
    echo "<script>
        alert('Connection Error');
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <!-- Material icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="stylesheet.css">

</head>

<body>

    <div class="container">
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
                <a href="#" class="active">
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

                <a href="orderdetails.php">
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
        <main>
            <h1>Dashboard</h1>
            <div class="date">
                <input type="date">
            </div>
            <!-- Starting of insights -->
            <div class="insights">
                <!-- Sales part start -->
                <div class="sales">
                    <span class="material-icons-sharp"> analytics </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1><i class="fa fa-rupee"></i> 1,05,986</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- End Of Sales-->

                <!-- expenses part start -->
                <div class="expenses">
                    <span class="material-icons-sharp"> bar_chart </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Expenses</h3>
                            <h1><i class="fa fa-rupee"></i> 78,986</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>62%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- End Of Expenses-->

                <!-- Income part start -->
                <div class="income">
                    <span class="material-icons-sharp"> stacked_line_chart </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Income</h3>
                            <h1><i class="fa fa-rupee"></i> 50,987 </h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>44%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- End Of Income-->
            </div>
            <!-- End of insights-->
            <div class="recent-order">
                <h2> Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Oreder Id</th>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>Location</th>
                            <th>Payment Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        #For Fatching User Data
                        $query ="SELECT * FROM `order_manager`";
                        #Firing the query
                        $user_part=mysqli_query($conn,$query);
                        #implimanting it so that we can fatch data until we recive rows in table
                        while($user_fetch=mysqli_fetch_assoc($user_part))
                        {
                            echo "
                                <tr>
                                    <td>$user_fetch[Order_Id]</td>
                                    <td>$user_fetch[Full_Name]</td>
                                    <td>$user_fetch[Phone_No]</td>
                                    <td>$user_fetch[Address]</td>
                                    <td>$user_fetch[Pay_Mod]</td>
                                    
                                </tr>
                                        ";
                                    
                        }?>
                    </tbody>
                </table>
                <a href="orderdetails.php">Show All</a>
            </div>
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
            <!-- Recent update start -->
            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="img/profile0.png" alt="">
                        </div>
                        <div class="message">
                            <p><b>Pawandeep Rajan</b> received his order of Nike Air Max 90 gtx</p>
                            <small class="text-muted">2 Minutes Ago </small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="img/profile1.jfif" alt="">
                        </div>
                        <div class="message">
                            <p><b>Shraddha Kapur</b> received his order of Nike Air Max 90 gtx</p>
                            <small class="text-muted">1 Hour Ago </small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="img/profile2.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Vishal Mishra</b> received his order of Nike Air Max 90 gtx</p>
                            <small class="text-muted">5 Hour Ago </small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent updatev ends-->
            <!-- Sales analytics start -->
            <div class="sales-analytics">
                <h2>Sales Analytics</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-icons-sharp"> shopping_cart </span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3> ONLINE ORDERS </h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <div class="success">+39%</div>
                        <h3 class="pr">7,678</h3>
                    </div>
                </div>

                <div class="item offline">
                    <div class="icon">
                        <span class="material-icons-sharp"> local_mall </span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3> OFFLINE ORDERS </h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <div class="danger">-17%</div>
                        <h3 class="pr">5,578</h3>
                    </div>
                </div>

                <div class="item customers">
                    <div class="icon">
                        <span class="material-icons-sharp"> person </span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3> NEW CUSTOMERS </h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <div class="success">+25%</div>
                        <h3 class="pr">2,045</h3>
                    </div>
                </div>

                <div class="item add-product">
                    <div>
                        <span class="material-icons-sharp"> add </span>
                        <h3><a href="add.html">Add Product</a></h3>
                    </div>
                </div>

            </div>
            <!-- Sales analytics end-->
        </div>
    </div>

    <script src="index.js"></script>
</body>

</html>
