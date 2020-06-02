<?php include_once "apps/db.php"?>
<?php include_once "apps/functions.php"?>
<?php session_start(); ?>


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
//    Login system
        if(isset($_GET['logout']) AND $_GET['logout']== 'success'){
            
//            session destroy
            session_destroy();
            
//            cookie destroy to relogin
              setcookie('login_user_id', '', time()- (60*60*24*365*5));
            
            header("location:index.php");
        }
//    Profile page access security
    if(!isset( $_SESSION['id']) AND !isset( $_SESSION['name']) AND !isset( $_SESSION['email'])){
        
        header("location:index.php");
    }
    
    ?>

	<div class="wrap shadow">
		<div class="card">
		  <div class="card-header">
		      Profile of <?php echo $_SESSION['name'];?>
		      <a class="btn btn-primary float-right" href="data.php">All users</a>
		  </div>
			<div class="card-body">
				<table class="table table-striped">
				    <img style="width:200px; height:200px; display:block; margin:10px auto; border-radius:50%;
				    border:10px solid #eee; " class="shadow" src="students/<?php echo $_SESSION['photo'];?>" alt="">
				    <tr>
				        <td>Name</td>
				        <td><?php echo $_SESSION['name'];?></td>
				    </tr>
                     <tr>
				        <td>Email</td>
				        <td><?php echo $_SESSION['email'];?></td>
				    </tr> 
                    <tr>
				        <td>Cell</td>
				        <td><?php echo $_SESSION['cell'];?></td>
				    </tr> 
                    <tr>
				        <td>User Name</td>
				        <td><?php echo $_SESSION['uname'];?></td>
				    </tr>
				</table>
				<a href="?logout=success">Log Out</a>
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