<?php
session_start();
include 'inc/connection.php';

if(isset($_REQUEST["pid"]))
{
    $pid= $_REQUEST["pid"];
    $result = $con->query("select * from product where id='$pid'");
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
                //header('location:../shoppingcart.php');
            }
       
        }
        if($count==0)
        {
            
            $_SESSION["cart"][$pid]["id"]=$row->id;
            $_SESSION["cart"][$pid]["title"]=$row->name;
            $_SESSION["cart"][$pid]["price"]=$row->price;
            $_SESSION["cart"][$pid]["quantity"]=1;
            
            header('location:../shoppingcart.php');
        }
     
    }
    else
    {
        
        $_SESSION["cart"][$pid]["idea_id"]=$row->id;
        $_SESSION["cart"][$pid]["title"]=$row->title;
        $_SESSION["cart"][$pid]["price"]=$row->price;
        $_SESSION["cart"][$pid]["quantity"]=1;
        
        header('location:../shoppingcart.php');
  
    }  
            
}

/// delete values from cart

if(isset($_REQUEST["remove_cartid"]))
{
    $pid= $_REQUEST["remove_cartid"];
    unset( $_SESSION["cart"][$pid]);
    header('location:shoppingcart.php');
}

if(isset($_REQUEST["updatecart"]))
{
   
      foreach($_SESSION["cart"] as $cart_items)
        {
          
            foreach($_REQUEST["cart"] as $data )
            {
                foreach($data as $k=>$v)
                {
                    if($cart_items["id"]==$k)
                    {
                       $_SESSION["cart"][$k]["quantity"]=$v;
                    }
                }
            }
            
        }
    
        header('location:shoppingcart.php');
     
     
}




?>