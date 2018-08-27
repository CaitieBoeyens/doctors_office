<nav class="navbar is-blue-nav is-transparent">
	<div class="container">
		<div class="navbar-brand">
			<a class="navbar-item" href="../pages/home.php">
				<img id="logo" src="../assets/logo.svg">
			</a>
			
		</div>
		<div class="navbar-menu">
			<div class="navbar-start">
				<a href="../pages/home.php">
					<h1 class="navbar-item has-text-light brand-text">The Family Doctor</h1>
				</a>
			</div>
			<div class="navbar-end">
				<a class="navbar-item has-text-light" href="../pages/home.php">
					Home
				</a>
			
				<a class="navbar-item has-text-light" href="../pages/doctors.php">
					Doctors
				</a>
			
				<a class="navbar-item has-text-light" href="../pages/patients.php">
					Patients
				</a>
	
				<a class="navbar-item has-text-light" href="../pages/appointments.php">
					Appointments
				</a>

				<a class="navbar-item has-text-light image is-96x96" href="../pages/profile.php">

				 <?php 

				 /* function var_dump_pre($mixed = null) {
					echo '<pre>';
						var_dump($mixed);
					echo '</pre>';
					return null;
    			}
						$user = $db -> getUser($_SESSION['email']);
						var_dump_pre($user);
						$name = $user['name'];
						$email = $user['email'];
						$img = '../assets/'.$user['img_path'].'.png'; */
                ?>
					<img src="<?= $img ?>" id="user-icon">
				</a>
	
		</div>
		
	</div>
</nav> 
