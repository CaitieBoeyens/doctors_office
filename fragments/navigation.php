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
	
				<a class="navbar-item has-text-light" href="../pages/rooms.php">
					Rooms
				</a>

				<a class="navbar-item has-text-light" href="../pages/appointments.php">
					Appointments
				</a>

				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link has-text-light image is-96x96">

					<?php 
							$user = $db -> getUser($_SESSION['email']);
							$name = $user['name'];
							$email = $user['email'];
							$img = '../assets/'.$user['img_path'].'.png';
					?>
						
						<img src="<?= $img ?>" id="user-icon">
					</a>

					 <div class="navbar-dropdown negative-margin">
						<a class="navbar-item" href="../pages/profile.php">
							My Profile
						</a>
						<a class="navbar-item" href="../fragments/logout.php">
							Log out
						</a>
					</div>
				</div>

				
	
		</div>
		
	</div>
</nav> 
