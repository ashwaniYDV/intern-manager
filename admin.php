<?php include('includes/header.php') ?>
<?php include('includes/nav.php') ?>
<?php 
	if(!logged_in()) {
		set_message("<p class='bg-danger'>Please login again to view that page<p>");
		redirect("login.php");
	}
	$row = getUserDetails($_SESSION['email']);
?>

<div class="container">
  	<div class="row">
		  <div class="col">
			<h1 class="text-center">
				<?php
					echo "Hello {$row['first_name']}<br>";
					if($_SESSION['type']==1) {
						echo "Faculty<br>";
					} else {
						echo "Student<br>";
					}
				?>
			</h1>
		</div>
	</div>
</div>	
  
<?php include('includes/footer.php') ?>