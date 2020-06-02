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
    
     if(isset($_GET['id'])){
         
         $id_url = $_GET['id'];
         
         
     }


      if(isset($_POST['update'])){
          
           $name = $_POST['name'];
           $uname = $_POST['uname'];
           $email = $_POST['email'];  
           $cell = $_POST['cell'];
          
          
       
      if(empty($name)||empty($uname)||empty($email)||empty($cell)){
          
             $mess = '<p class="alert alert-danger">Empty Fields Required !<button data-dismiss="alert" class="close">&times;</button></p>';
                
            }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
                
               $mess = '<p class="alert alert-danger">Invalid Email !<button data-dismiss="alert" class="close">&times;</button></p>';
                
            }else{
          
                if(isset($_FILES['new_photo']['name'])){
                    
                   $data = fileUpload($_FILES['new_photo'], 'students/');
                    $photo_name = $data['file_name'];
                    unlink('students/'.  $_POST['old_photo']);
                }else{
                    $photo_name = $_POST['old_photo'];
                } 
            
          
//             
                       $sql = "UPDATE users SET
                        name = '$name',
                        uname = '$uname',
                        email = '$email',
                        cell = '$cell',
                        photo= '$photo_name'
                        WHERE id = '$id_url'
                       ";                  
                      $connection -> query($sql); 
                       $mess = '<p class="alert alert-success">Data Updated!<button data-dismiss="alert" class="close">&times;</button></p>';

               
                   }
               
                }
            

         $sql ="SELECT * FROM users WHERE id ='$id_url'";
         $data = $connection ->query($sql);
         $single_data = $data -> fetch_assoc();
    ?>
    
    <div class="wrap shadow">
        <a href="data.php">All users</a>
		<div class="card">
			<div class="card-body">
				<h2>Update Information</h2>
				
				    <?php 
                       if(isset($mess)){
                           echo $mess;
                           }
                        
                        ?>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $id_url; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php echo $single_data['name'];?>" type="text">
					</div>
					<div class="form-group">
						<label for="">User Name</label>
						<input name="uname" class="form-control" value="<?php echo $single_data['uname'];?>"  type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php echo $single_data['email'];?>"  type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control"value="<?php echo $single_data['cell'];?>"  type="text">
					</div>
<!--
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input name="cpass" class="form-control" type="password">
					</div>
-->
					<div class="form-group">
					    <img style="width:180px; " src="students/<?php echo $single_data['photo'];?>" alt="">
					    <input name="old_photo" value="<?php echo $single_data['photo'];?>" type="hidden">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="new_photo"  type="file">
					</div>
					<div class="form-group">
						<input name="update" class="btn btn-primary" type="submit" value="Update Now">
					</div>
				</form>
<!--				<a class="btn btn-primary-sm" href="index.php">Update Now</a>-->
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