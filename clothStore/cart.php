<?php
session_start();
include 'include/connection.php';

//echo '<pre>';
//print_r($_SESSION);


if(isset($_REQUEST["pid"]))
{
    $pid= $_REQUEST["pid"];
    $result = $con->query("select * from tbl_product where id='$pid'");
    $row= $result->fetch_object();
    
  //  echo count($_SESSION['cart']);
    
    if(count($_SESSION["cart"])!=0)
    {
       // echo "1"; exit;
        $count=0;
        foreach($_SESSION["cart"] as $cart_items)
        {
           
            if($cart_items["id"]==$pid)
            {
                $count++;
                $_SESSION["cart"][$pid]["quantity"]= $_SESSIONx["cart"][$pid]["quantity"]+1; 
                header('location:shopping_cart.php');
            }
       
        }
        if($count==0)
        {
            
            $_SESSION["cart"][$pid]["id"]=$row->id;
            $_SESSION["cart"][$pid]["name"]=$row->pname;
            $_SESSION["cart"][$pid]["price"]=$row->price;
            $_SESSION["cart"][$pid]["quantity"]=1;
            
            header('location:shopping_cart.php');
        }
     
    }
    else
    {
        
        $_SESSION["cart"][$pid]["id"]=$row->id;
        $_SESSION["cart"][$pid]["name"]=$row->pname;
        $_SESSION["cart"][$pid]["price"]=$row->price;
        $_SESSION["cart"][$pid]["quantity"]=1;
        
        header('location:shopping_cart.php');
  
    }  
            
}

/// delete values from cart

if(isset($_REQUEST["remove_cartid"]))
{
    $pid= $_REQUEST["remove_cartid"];
    unset( $_SESSION["cart"][$pid]);
   header('location:shopping_cart.php');
}

if(isset($_REQUEST["order"]))
{

    $customer_id= $_SESSION["id"];
    $date= date('Y-m-d');

    $con->query("INSERT INTO `tbl_orders`(`date`, `customer_id`, `status`) values('$date','$customer_id','pending') ");

    $order_id= $con->insert_id;

    foreach($_SESSION["cart"]  as $cart)
    {
           $pid= $cart["id"];
           $q= $cart["quantity"];
           $price= $cart["price"];

         $con->query("insert into tbl_order_details(product_id,quantity,price,order_id) values('$pid','$q','$price','$order_id')");
         unset( $_SESSION["cart"][$pid]);
    }



    echo "<script>alert('Your Order has been Placed'); document.location='index.php';</script>";
}





?>