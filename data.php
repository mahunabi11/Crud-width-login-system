<?php include_once "apps/db.php"?>
<?php include_once "apps/functions.php"?>
<?php session_start();?>

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
	
	

	<div class="wrap-table shadow">
	 <a href="profile.php">Go to Profile</a>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
                    $sql = "SELECT * FROM users ";
                     $data = $connection ->query($sql);

                       $i = 1;
                       while($all_users = $data -> fetch_assoc()):
                    ?>
						<tr>
							<td><?php echo $i; $i++;?></td>
							<td><?php echo $all_users['name'];?></td>
							<td><?php echo $all_users['uname'];?></td>
							<td><?php echo $all_users['email'];?></td>
							<td><?php echo $all_users['cell'];?></td>
							<td><img  src="students/<?php echo $all_users['photo'];?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="single-data.php?id=<?php echo $all_users ['id'];?>">View</a>
								
								<?php if($all_users['id'] == $_SESSION['id'] ): ?>
								<a class="btn btn-sm btn-warning" href="edit.php?id=<?php echo $all_users ['id'];?>">Edit</a>
								<a id="delete_btn"   class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $all_users['id'];?>">Delete</a>
								<?php endif;?>
							</td>
						</tr>
					
                       <?php endwhile;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	
	<script>
       $('a#delete_btn').click(function(){
        let con = confirm('Are you sure?');
           if(con == true){
               return true;
           }else{
             return false;  
      }
       });
    </script>
	
	
	
	
	
</body>
</html>