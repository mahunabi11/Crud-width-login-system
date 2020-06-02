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
            $sql = "SELECT * FROM users WHERE id = '$id_url'";
                   $data = $connection ->query($sql);
                    $single_data = $data -> fetch_assoc();
           
    
    ?>
	
	
	
	
	
	
	
	
	
	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
                  <img style="width:200px; height:200px; display:block; margin:10px auto; border-radius:50%;
				    border:10px solid #ccc; " class="shadow" src="students/<?php echo $single_data['photo'];?>" alt="">
			   <table class="table table-striped">
			       <tr>
			           <td>Name</td>
			           <td><?php echo $single_data['name'];?></td>
			       </tr>
                   <tr>
			           <td>Email</td>
			           <td><?php echo $single_data['email'];?></td>
			       </tr>
                   <tr>
			           <td>Cell</td>
			           <td><?php echo $single_data['cell'];?></td>
			       </tr>
                   <tr>
			           <td>User Name</td>
			           <td><?php echo $single_data['uname'];?></td>
			       </tr>
			   </table>
			
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