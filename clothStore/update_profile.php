<?php 
error_reporting(0);
session_start();
include_once('include/connection.php');

//edit Record 
if(isset($_SESSION['id']))
{
  $id    = $_SESSION['id'];
  $sel   = "select * from  tbl_customers where id='$id'";
  $exe   = $con->query($sel);
  $all   = $exe->fetch_object();
}

//Change Password
if(isset($_POST['change']))
{
  $old_pass  = $_POST['old_pass'];
  $new_pass  = $_POST['new_pass'];
  $conf_pass = $_POST['conf_pass'];
  $id        = $_SESSION['id'];
  $sel       = "select * from  tbl_customers where password='$old_pass'";
  $exe       = $con->query($sel);
  $all       = $exe->fetch_object(); 
  if($all->password)
  {
    if($new_pass == $conf_pass)
    {
      $con->query("UPDATE `tbl_customers` SET `password`='$new_pass' WHERE id = '$id'");
    }
    else
    {
      echo "<script>alert('New password And Confirm Password Not Match')</script>";
    }
  }
  else
  {    
    echo "<script>alert('Old Password Is Not Match')</script>";    
  }
}


//Register Record
if(isset($_POST['update']))
{
  $id    = $_SESSION['id'];  
  $name      = $_POST['name'];
  $email     = $_POST['email'];
  $contact   = $_POST['contact'];
  $gender    = $_POST['gender'];
  $con->query("UPDATE `tbl_customers` SET `name`='$name',`email`='$email',`contact`='$contact',`gender`='$gender' WHERE id = '$id'");
}

include_once('include/header.php');
?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Change Password</h4>
                 <form method="post" class="aa-login-form">
                  <label for="">Old Password<span>*</span></label>
                   <input type="password"  name="old_pass" value="" placeholder="Old Password">
                   <label for="">New Password<span>*</span></label>
                    <input type="password" required="" value="" name="new_pass" placeholder="Password">
                    <label for="">Confirm Password<span>*</span></label>
                    <input type="password" required="" value="" name="conf_pass" placeholder="Password">
                    <input type="submit"  name="change" value="Change Password" class="aa-browse-btn"></input>                    
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Update Profile</h4>
                 <form method="post" class="aa-login-form">
                    <label for="">Username<span>*</span></label>
                    <input type="text" value="<?php echo $all->name; ?>" name="name" required="" placeholder="Username">
                    <label for="">Email<span>*</span></label>
                    <input type="text" value="<?php echo $all->email; ?>" name="email" required="" placeholder="email">
                    <label for="">Contact<span>*</span></label>
                    <input type="text" value="<?php echo $all->contact; ?>" name="contact" required="" placeholder="contact">
                    <input type="hidden" name="password_get" value="<?=
                    $all->password; ?>">
                    <label for="">Gender<span></span></label>
                    <select name="gender" style=" margin-left: 22px;width: 124px;height: 34px;">
                        <option value="male"
                        <?php 
                        if($all->gender=="male")
                        {
                          ?> selected="selected";
                        <?php 
                        } 
                      ?>>Male</option>
                        <option value="female"
                        <?php 
                        if($all->gender=="female")
                        {
                          ?> selected="selected";
                        <?php 
                        }
                        ?>>Female</option>
                      </select>                    
                    <div style="margin-top: 17px;">
                      <input type="submit" name="update" value="Update" class="aa-browse-btn"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<?php 
include_once('include/footer.php');
?>