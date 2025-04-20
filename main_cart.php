<?php
#Starting the Session
session_start();

#When session Starts Destroy the Session
#session_destroy();
#Checking if the request is comming from Post method
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    #Now checking if button named add to cart is Clicked or not
    if(isset($_POST['Add_To_Cart']))
    {
        #Checking if value is present in Cart or not
         if(isset($_SESSION['cart']))
         {
            #Checking that item is already Present in th cart
            $myitems=array_column($_SESSION['cart'],'Item_Name');
            #In my Items You will able to find names of all exsiting Items.
            #in_array is used to search a specific value within a Array
            #Now checking availblity of item in array if item is present inside array then show an alert
            if(in_array($_POST['Item_Name'],$myitems))
            {
                #Creating an Alert and redirecting it back to index page
                echo"<script>
                alert('Item Already Added In Cart');
                window.location.href='category.php';
                </script>";
            }
            #using else so that if item is present then it will not go again
            else{
                #Now once one time cart is created then this code will exeicute.
                #Counting the values in cart ,Count is key word
                $count=count($_SESSION['cart']);
                #Now adding the array in 1st value in cart
                $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
                #using print_r to print the array
                #print_r($_SESSION['cart']);
                #When Item Added now it will show an alert
                echo"<script>
                    alert('Item Successfully Added In Cart');
                    window.location.href='category.php';
                    </script>";
            }
         }
         
         else
         {
            #If cart is not there or not set the set it by creating an associative array 
            $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
            #Printing the values of cart
            #print_r($_SESSION['cart']);
            echo"<script>
                alert('Item Successfully Added In Cart');
                window.location.href='category.php';
                </script>";

         }

    }
    #To remove the Item From Cart 
    if(isset($_POST['Remove_Item']))
    {
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['Item_Name']==$_POST['Item_Name']){
                #This will pass the array key then using unset function we will remove the key 
                unset($_SESSION['cart'][$key]);
                #Now rearanging the array so that no issue will occur as when we remove 0 elemnet then it will case an error.
                #Array_values Function is used for that
                $_SESSION['cart']=array_values($_SESSION['cart']);
                #Sending alert and code back to cart page
                echo"<script>
                alert('Item Removed Successfully');
                window.location.href='cart.php';
                </script>";
            }

        }
    }
    #For modifying the Quantity.
    if(isset($_POST['Mod_Quantity']))
    {
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['Item_Name']==$_POST['Item_Name']){
                #For serching of quantity
                $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                
                echo"<script>
                window.location.href='cart.php';
                </script>";
            }

        }
    }
}

?>