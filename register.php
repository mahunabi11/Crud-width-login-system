<?php include_once "apps/db.php"?>
<?php include_once "apps/functions.php"?>

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
    
      if(isset($_POST['register'])){
          
           $name = $_POST['name'];
           $uname = $_POST['uname'];
           $email = $_POST['email'];  
           $cell = $_POST['cell'];
          
          //   Confirm password
           $pass = $_POST['pass'];
           $cpass = $_POST['cpass'];
          
             if($pass == $cpass){
                 $confirm_pass = true;
             }else{
                 $confirm_pass = false;
             }
//          Password Hash
        $hash_pass =  password_hash($pass, PASSWORD_DEFAULT);
          
//           $photo = $_FILES['photo'];
      
//    User Name check
          
          $uname_check= dataCheck($connection, 'uname', $uname, 'users');
          
          $email_check= dataCheck($connection, 'email', $email, 'users');
          
          $cell_check= dataCheck($connection, 'cell', $cell, 'users');
          
       
      if(empty($name)||empty($uname)||empty($email)||empty($cell)){
          
             $mess = '<p class="alert alert-danger">Empty Fields Required !<button data-dismiss="alert" class="close">&times;</button></p>';
                
            }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
                
               $mess = '<p class="alert alert-danger">Invalid Email !<button data-dismiss="alert" class="close">&times;</button></p>';
                
            }elseif($confirm_pass == false){
                   
               $mess = '<p class="alert alert-danger">Password do not match!<button data-dismiss="alert" class="close">&times;</button></p>';
          
            }elseif($uname_check == false){
          
                 $mess = '<p class="alert alert-danger">User name already exits!<button data-dismiss="alert" class="close">&times;</button></p>';
          
             }elseif($email_check == false){
          
                 $mess = '<p class="alert alert-danger">Emali already exits!<button data-dismiss="alert" class="close">&times;</button></p>';
          
             }elseif($cell_check == false){
          
             
          
             }else{
              $data =  fileUpload($_FILES['photo'], 'students/' , ['jpg', 'png']);
          
                $file_name  = $data['file_name'];
          
                   if(!empty($data['mess'])){
                      $mess = $data['mess'];
                       
                   }else{
                       $sql = "INSERT INTO users(name, uname, email, cell, pass, photo)VALUES('$name', '$uname', '$email', '$cell',  '$hash_pass', '$file_name')";                   
               $connection -> query($sql); 
                   
                       setMsg('Data stable');
                       
               header("location:register.php"); 
               
                   }
               
                }
           }
    
    ?>

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Registration Now</h2>
				
				    <?php 
                       if(isset($mess)){
                           echo $mess;
                           }
                           getMsg();
                        ?>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php old('name');?>" type="text">
					</div>
					<div class="form-group">
						<label for="">User Name</label>
						<input name="uname" class="form-control" value="<?php old('uname')?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php old('email')?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php old('cell')?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input name="cpass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo"  type="file">
					</div>
					<div class="form-group">
						<input name="register" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
				<a class="btn btn-primary-sm" href="index.php">Login Now</a>
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