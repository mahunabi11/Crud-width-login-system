<?php include_once "apps/db.php"?>
<?php include_once "apps/functions.php"?>
<?php 
    
    session_start();
   
//   Auto login system

     if(isset($_COOKIE['login_user_id'])){
         
        $user_id = $_COOKIE['login_user_id'];
         $sql = "SELECT * FROM users WHERE id ='$user_id' ";
          $data = $connection ->query($sql);
         
            $login_user_data = $data -> fetch_assoc();
         
            $_SESSION['id'] = $login_user_data['id'];
            $_SESSION['name'] = $login_user_data['name'];
            $_SESSION['email'] = $login_user_data['email'];
            $_SESSION['uname'] = $login_user_data['uname'];
            $_SESSION['cell'] = $login_user_data['cell'];
            $_SESSION['photo'] = $login_user_data['photo'];
         
         
        header("location:profile.php");
     }

    if(isset( $_SESSION['id']) AND isset( $_SESSION['name']) AND isset( $_SESSION['email'])){
        
        header("location:profile.php");
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<?php
          if(isset($_POST['signin'])){
              $ue   = $_POST['ue'];
              $pass = $_POST['pass'];
              
              if(empty($ue) || empty($pass)){
                  $mess = '<p class="alert alert-danger">Empty Fields Required !<button data-dismiss="alert" class="close">&times;</button></p>';
              }else{
                    $sql = "SELECT * FROM users WHERE uname= '$ue' OR email = '$ue'";
                   $data = $connection ->query($sql);
                    $login_user_data = $data -> fetch_assoc();
                   $count= $data -> num_rows;
                    
                  if($count == 1){
                      if(password_verify($pass,  $login_user_data['pass'])){
                          
                         
                           $_SESSION['id'] = $login_user_data['id'];
                           $_SESSION['name'] = $login_user_data['name'];
                           $_SESSION['email'] = $login_user_data['email'];
                           $_SESSION['uname'] = $login_user_data['uname'];
                           $_SESSION['cell'] = $login_user_data['cell'];
                           $_SESSION['photo'] = $login_user_data['photo'];
                          
                  //  Set cookie for relogin
                          setcookie('login_user_id', $login_user_data['id'], time()+ (60*60*24*365*5));
                          
//                          Redirect system
                          header("location:profile.php");
                          
                      }else{
                          $mess = '<p class="alert alert-info">Wrong password!<button data-dismiss="alert" class="close">&times;</button></p>';
                      }
                  }else{
                      $mess = '<p class="alert alert-danger">Wrong username or email!<button data-dismiss="alert" class="close">&times;</button></p>';
                  }
                }
              }
          
    
    ?>
	

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
			      <h2>Login Now</h2>
			        <?php  if(isset($mess)){
                           echo $mess;
                      }?>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
					<div class="form-group">
						<label for="">User Name/Email</label>
						<input name="ue"  class="form-control" type="text">
					</div>
					
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control" type="password">
					</div>
					
				
					<div class="form-group">
						<input name="signin" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
				<a class="btn btn-primary-sm" href="register.php">Create an account</a>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>