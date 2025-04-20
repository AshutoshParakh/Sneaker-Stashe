<?php
#connection for databse
$conn=mysqli_connect("localhost", "root", "", "shoes");
if (mysqli_connect_error()) {
    echo "<script>
    alert('Connection Error');
    </script>";
}

/*#Checking if submit button is presed or not
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['submit'])){
        $insert= "INSERT INTO `admin`(`id`, `name`, `image`, `price`, `description`) VALUES ('$id','$name','$file','$price','$dec')";
        $query =mysqli_query($conn,$insert);
        if(!$query){
            echo "error occure";
        }
        else{
            echo "<script>
                alert('Entry sucessfully written in database');
                window.location.href = 'index.php';
            </script>";
        }
    }
}*/
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>Shoes details </title>
    <script>
        edits = document.getElementsByClassName('edit')
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit", e);
            })
        })

    </script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="stylesheet.css">

</head>

<body>
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

                <a href="add.html" ">
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

                <a href="display.php" class="active">
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
        <button class="btn btn-primary "><a href="add.html" style="text-decoration:none; color:white">Add Product</a></button>
        <div class="container mt-4">

        <!-- Modal -->
    <table class="table my-3" style="width:60vw; margin-left:-26%; background:var(--color-info-light)">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>


        <?php

        $sql="SELECT * FROM `admin`";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $name=$row['name'];
                $file=$row['image'];
                $price=$row['price'];
                $dec=$row['description'];
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$file.'</td>
                <td>'.$price.'</td>
                <td>'.$dec.'</td>
                <td><button class="btn btn-primary"><a href="update.html" style="text-decoration:none; color:white">Update Product</a></button></td> <br><br>
                <td><button class="btn btn-primary"><a href="remove.html" style="text-decoration:none; color:white">Delete Product</a></button></td>
                 
                </tr> ';
            }
        }


        ?>
        </tbody>
    </table>
    </div>



        </main>
        <!-- Ennd of main-->

        <div class="right" style="margin-right:-30%">
            <div class="top" >
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













    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>