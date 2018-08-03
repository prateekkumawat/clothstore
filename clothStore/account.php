<?php 
error_reporting(0);
session_start();
include_once('include/connection.php');
//Register Record 
if(isset($_POST['register']))
{
  $name      = $_POST['name'];
  $email     = $_POST['email'];
  $contact   = $_POST['contact'];
  $password  = $_POST['password'];
  $gender    = $_POST['gender'];
  $con->query("INSERT INTO `tbl_customers`(`name`, `email`, `contact`, `password`, `gender`) VALUES ('$name','$email','$contact','$password','$gender')");
}
/***********login user********/

if(isset($_POST['login']))
{
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $sel    = "select * from  tbl_customers where email='$email' and password='$password'";
  $exe      = $con->query($sel);
  if($exe->num_rows) {
    $all  = $exe->fetch_object();
    $id   = $all->id;
    $rember = @$_POST['rember'];
    // echo "<pre>";print_r($id);
    // echo "<pre>";print_r($rember);

    if(trim($rember) == 'on')
    {
      setcookie('email',$all->email,time()+3600);
      setcookie('password',$all->password,time()+3600);
    }
    $_SESSION['id']   = $all->id;
    $_SESSION['name'] = $all->name;
    $_SESSION['email']= $all->email;
    header("location:index.php");
  }else{
    echo "<script>alert('Wrong Username and Password')</script>";
  }
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
                <h4>Login</h4>
                 <form method="post" class="aa-login-form">
                  <label for="">Email address<span>*</span></label>
                   <input type="text"  name="email" value="<?php echo $_COOKIE['email']; ?>" placeholder="email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" required="" value="<?php echo $_COOKIE['password']; ?>" name="password" placeholder="Password">
                    <input type="submit"  name="login" value="Login" class="aa-browse-btn"></input>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme" name="rember"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form method="post" class="aa-login-form">
                    <label for="">Username<span>*</span></label>
                    <input type="text" name="name" required="" placeholder="Username">
                    <label for="">Email<span>*</span></label>
                    <input type="text" name="email" required="" placeholder="email">
                    <label for="">Contact<span>*</span></label>
                    <input type="text" name="contact" required="" placeholder="contact">
                    <label for="">Password<span>*</span></label>
                    <input type="password" required="" name="password" placeholder="password">
                    <label for="">Gender<span></span></label>
                    <select name="gender" style=" margin-left: 22px;width: 124px;height: 34px;">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>                    
                    <div style="margin-top: 17px;">
                      <input type="submit" name="register" value="Register" class="aa-browse-btn"></input>
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