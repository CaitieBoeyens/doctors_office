 <?php session_start() ?>
 <?php require_once __DIR__.'/../fragments/setup.php'; ?>

 <?php
    if(!isset($_SESSION['email'])){
        header('Location: /doctors_office/pages/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700|Montserrat" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/doctors.css" />
        <title>Doctors</title>
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        <a href="/rooms.php">
            <div class="floating-btn has-text-centered orange-btn">
                <p >
                    <strong class="has-text-light">
                        Assign rooms
                    </strong>
                </p>
            </div>
        </a>
        
        <div class="container main-con">
            <div class="columns">
                <?php 
                function var_dump_pre($mixed = null) {
                    echo '<pre>';
                        var_dump($mixed);
                    echo '</pre>';
                    return null;
                }
                        $doctors = $db -> getDoctors();
                        foreach($doctors as $doctor){
                            $doctor_id = $doctor['id'];
                            $name = $doctor['doctor_name'];
                            $surname = $doctor['doctor_surname'];
                            $specialisation = $doctor['specialisation'];
                            $doctor_img = '../assets'.$doctor['img_path'].'.png';
                            
                            

                ?>
                <div class="column is-one-quarter">
                    <div class="box is-blue has-text-centered has-text-light">
                        <figure>
                            <a href="doctor.php">
                                <p class="image person-icon">
                                    <img src="<?= $doctor_img ?>">
                                </p>
                            </a>
                        </figure>
                        <h2 class="title has-text-light"><?= $name ?> <?= $surname ?></h2>
                        <p> <strong class="has-text-light">Specialisation:</strong> <br/><?= $specialisation ?> </p>
                        <p> <strong class="has-text-light">Rooms: </strong> <ul>
                            <?php 
                            $doctor_rooms = $db -> getDoctorRooms($doctor_id);
                            foreach ($doctor_rooms as $doctor_room){
                                $room_num = $doctor_room['room_num'];
                                $floor_num = $doctor_room['floor_num'];
                            ?>
                            <li>Floor: <?=$floor_num?> Room: <?=$room_num?></li>
                            <?php }?> 
                        </ul></p>
                        <!-- <div class="box"></div> -->
                    </div>  
                </div>  
                <?php  }?> 
            </div>
        </div>
        <!-- <script>
        
        _columnGenerator(doctors, column) {
		return doctors.filter(d => d.id % 3 === column - 1).map(d => ({
			doctor :{
                name: ,
                surname: ,
                specialisation: ,
                rooms: [],
            }
		}));
	}</script> -->
    </body>
</html>