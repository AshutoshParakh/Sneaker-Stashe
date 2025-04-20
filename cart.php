<?php
session_start();

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/shoesimg-removebg-preview5.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Creative Shoes</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/shoesimg-removebg-preview5.png"
                            alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item submenu dropdown active">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="category.php">Shop Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-product.html">Product
                                            Details</a></li>
                                    <li class="nav-item active"><a class="nav-link" href="cart.php">Shopping Cart</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>

                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>

                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>

                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>My Cart </h1>
            </div>

            <div class="col-lg-9">
                <table class="table table-light text-center">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Item No.</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        

                        #Checking for condition that is anything is in cart or not
                        if (isset($_SESSION['cart'])) {
                            #For converting Key and value and printing them
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $itemno = $key + 1;
                            
                                echo "
                                    <tr>
                                    <td>$itemno</td>
                                    <td>$value[Item_Name]</td>
                                    <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                    <td>
                                        <form action='main_cart.php' method='post'>
                                            
                                            <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' name='Quantity' value='$value[Quantity]' min='1' max='10'>
                                            <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                        </form>
                                    </td>
                                    <td class='itotal'></td>
                                    <td>   
                                    <form action='main_cart.php' method='post'>
                                        <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                        <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                    </form>
                                    </td>
                                    </tr>";

                            }
                        }

                        ?>


                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <div class="border bg-light rounded p-4 text-left">
                    <h4>Final total: </h4>
                    <h5 class="text-right" id="gtotal"></h5><br>
                    <!--checking if any item is present in cart or not-->
                    <?php 
                    if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                    {
                    ?>

                        <!--For COD option-->
                        <form action="order.php" method="post">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="fullname" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_no" placeholder="Phone number" pattern="\d{10}" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label>Shoe Size</label>
                                <input type="number" class="form-control" name="size" placeholder="Shoe Size" min=1 max=9 required>
                            </div>

                            <div class="form-check text-left">
                                <input class="form-check-input" type="radio" name="pay_mode" value="COD" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cash On Delivery
                                </label>
                            </div>
                            <br>
                            <button class="btn btn-primary btn-block" name="Purchase">Purchase</button>
                        </form>
                    <?php 
                    } #For closing the if block 
                    else{
                        echo  "<h5 style='color:red'>Oops No Item is Selected</h5>";
                    }
                    ?>
                </div>
            </div>
            <br><br>
        </div>
    </div>
    <br><br><br>
    <!--Code for Caluculating -->
    <script>
        var finaltotal=0;
        var gtotal=document.getElementById('gtotal');
        var iprice=document.getElementsByClassName('iprice');
        var iquantity=document.getElementsByClassName('iquantity');
        var itotal=document.getElementsByClassName('itotal');
    
        /* Creating a Function for total*/
        function subTotal()
        {
            var li=iprice.length;
            finaltotal=0;
            /*To go in every value of class*/
            for(i=0;i<li;i++)
            {   
            
                /*For multiplying one by one*/
                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                /*For totaling */
                finaltotal = finaltotal+(iprice[i].value)*(iquantity[i].value);
                /*
                price 650 q =1  gt=0+(650*1),gt=650
                price 750 q=2   gt=650+(750*2),gt=2150 
                price 850 q=1   gt=2150+(850*1), gt= 3000

                */

            }
            /* To add in innerText */ 
            gtotal.innerText=finaltotal;
        }

        /* Calling the function */
        subTotal();
    </script>

    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">

                            <form target="_blank" novalidate="true"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                    <input class="form-control" name="EMAIL" placeholder="Enter Email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                        required="" type="email">


                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                            type="text">
                                    </div>

                                    <!-- <div class="col-lg-4 col-md-4">
                                                    <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                                </div>  -->
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is
                    made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://qualitywebs.online/"
                        target="_blank">qualitywebs</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <!--Code for Caluculating -->
    <script>
        var iprice=document.getElementsByClassName('iprice');
        var iquantity=document.getElementsByClassName('iquantity');
        var itotal=document.getElementsByClassName('itotal');

        /* Creating a Function for total*/
        function subtotal()
        {
            /*To go in every value of class*/
            for(i=0;i<iprice.lenght;i++)
            {
                /*For multiplying one by one*/
                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value)
            }
        }
    </script>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>