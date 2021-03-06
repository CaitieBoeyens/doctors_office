<?php session_start() ?>
<?php require_once __DIR__.'/../fragments/setup.php'; ?>
<?php require_once __DIR__.'/../fragments/appointment-validation.php'; ?>
<?php require_once __DIR__.'/../fragments/patient-validation.php'; ?>

<?php
    if(!isset($_SESSION['email'])){
        header('Location: /doctors_office/pages/login.php');
    }
?>
        

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>New Apppointment</title>         
        <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700|Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="../external/jquery-ui.min.css"/>
        <link rel="stylesheet" href="../external/jquery-ui.theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="../external/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="../external/slick/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/appointment.css" />
</head>
<body>
    <?php include __DIR__.'/../fragments/navigation.php'; ?>
    <?php include __DIR__.'/../fragments/success.php'; ?>
    <?php include __DIR__.'/../fragments/new_patient.php'; ?>
    

    <a onclick="modalToggle('patient')">
            <div class="floating-btn has-text-centered orange-btn">
                <p>
                    <strong class="has-text-light">
                        New Patient
                    </strong>
                </p>
            </div>
        </a>
    <div class="main-con container">
        <div class="columns is-centered">
            <div class="column is-two-thirds">
                <div class="card">
                    <header class="card-header is-blue">
                        <p class="card-header-title has-text-light subtitle">
                        New Appointment
                        </p>
                        
                    </header>
                    <div class="card-content">
                        <form name="new-appointment-form" method="post" action="<?= $self ?>">
                        
                            <div class="content">
                                <div class="form">
                                    <div class="slide1">
    
                                        <div class="field">

                                            <?php if(isset($errors['clash'])):?>
                                                <p class="help is-danger"><?= $errors['clash'] ?></p>

                                        <?php endif;?>

                                            <label class="label">Patient</label>
                                            <div class="control has-icons-left">
                                                <input class="input is-medium search" type="text" placeholder="Patient name" name="patient_name" value="<?= $_POST['patient_name'] ?>">
                                                <span class="icon is-left">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <?php if(isset($errors['patient_name'])):?>
                                                <p class="help is-danger"><?= $errors['patient_name'] ?></p>
                                            <?php endif;?>
                                        </div>
                                        <div class="doctors-choice field">
                                            <label class="label">Choose a doctor</label>
                                            <div class="cc-selector">
                                                <div class="columns is-centered">
                                                <?php 
                                                    $doctors = $db -> getDoctors();
                                                    foreach($doctors as $doctor){
                                                        $doctor_id = $doctor['id'];
                                                        $name = $doctor['doctor_name'];
                                                        $surname = $doctor['doctor_surname'];
                                                        $specialisation = $doctor['specialisation'];
                                                        $doctor_img = '../assets'.$doctor['img_path'].'.png';
                                                ?>
                                                    <div class="column is-one-quarter has-text-centered">
                                                        <input  type="radio" name="doctor_surname" value="<?= $surname ?>" id="<?= $doctor_id ?>" <?php echo ($_POST['doctor_surname']===$surname)?'checked':'' ?>/>
                                                        <label class="doctor-cc" for="<?= $doctor_id ?>" style="background-image: url(<?= $doctor_img ?>)" ></label>
                                                        <label class="label doc-name"for="<?= $doctor_id ?>">
                                                            Dr <?= $surname ?>
                                                        </label>
                                                        <label for="<?= $doctor_id ?>">
                                                            <?= $specialisation ?>
                                                        </label>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <?php if(isset($errors['doctor_surname'])):?>
                                                    <p class="help is-danger"><?= $errors['doctor_surname'] ?></p>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide2">
    
                                        <div class="field">

                                        <?php if(isset($errors['clash_details'])):?>
                                                <p class="help is-danger"><?= $errors['clash_details'] ?></p>
                                                <ul>

                                                    <?php 
                                                            $clash_appointments = $db -> getDoctorAppointmentsDates($_POST['doctor_surname'], $_POST['date']);
                                                            
                                                            foreach($clash_appointments as $clash_appointment){
                                                                $time = date("g:i", strtotime($clash_appointment['time']));
    
                                                        ?>
                                                            <li class="help is-danger"><?= $time ?></li>
    
                                                            <?php } ?>
                                                </ul>

                                        <?php endif;?>
                                            
                                            <label class="label">Date</label>
                                            <div class="columns is-centered">
                                                <div class="column is-7 has-text-centered">
                                                    <input type="text" name="date" id="d">
                                                    <div id="calendar" name="date" value="<?= $_POST['date'] ?>"></div>
                                                </div>
                                            </div>
                                            <?php if(isset($errors['date'])):?>
                                                <p class="help is-danger"><?= $errors['date'] ?></p>
                                            <?php endif;?>
                                        </div>
                                        <div class="time-choice field">
                                            <label class="label">Pick a time</label>
                                            <div class="cc-selector">
                                                <div class="columns is-centered">
                                                <?php 
                                                    foreach($slots as $slot){
                                                        
                                                ?>
                                                    <div class="column has-text-centered">
                                                        <input  type="radio" name="time" value="<?= $slot ?>" id="<?= $slot ?>" <?php echo ($_POST['time']===$slot)?'checked':'' ?>/>
                                                        <label class="time-cc" for="<?= $slot ?>"><?= $slot ?></label>
                                                        
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <?php if(isset($errors['time'])):?>
                                                <p class="help is-danger"><?= $errors['time'] ?></p>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="slide3">

                                        <div class="field room">
                                            <label class="label">Room</label>
                                            <div class="control has-icons-left has-icons-right">
                                               
                                                    <?php include __DIR__.'/../fragments/room-choice.php'; ?>
                                                
                                                <?php if(isset($errors['room_id'])):?>
                                                <p class="help is-danger"><?= $errors['room_id'] ?>
                                                </p>
                                                <?php endif;?>
                                                <?php if(isset($errors['rooms_2'])):?>
                                                    <ul>
                                                    <?php 
                                                            $rooms = $db -> getRoomsbyDoc($_POST['doctor_surname']);
                                                            
                                                            foreach($rooms as $room){
                                                                $floor_num = $room['floor_num'];
                                                                $room_num = $room['room_num'];

                                                        ?>
                                                            <li class="help is-danger">Room: <?= $room_num ?>, Floor: <?= $floor_num ?></li>

                                                            <?php } ?>     
                                                    </ul> 
                                                <?php endif;?>
                                            </div> 
                                        </div>
                                        <div class="field is-grouped">
                                            <p class="control">
                                                <input class="button is-orange has-text-light is-rounded" type="submit" name="new-appointment-submit" value="Book Appointment">
                                                <button class="button is-rounded" onclick="javascript:history.go(-1);return false;">Cancel</button>
                                            </p>
                                        </div>
                                    </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <script>
        function modalToggle(modalName) {
            var element = document.getElementById(`${modalName}-modal`);
            element.classList.toggle("is-active");
        }
    </script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>  
    <script type="text/javascript" src="../external/slick/slick.min.js"></script>
    <script type="text/javascript">
            $(function() { 
                $('.form').slick({
                    dots: false,
                    speed: 300,
                    slidesToShow: 1,
                    adaptiveHeight: true,
                    infinite: false,
                    draggable: false
                });

                 $("#calendar").datepicker({ 
                    beforeShowDay: $.datepicker.noWeekends, 
                    inline: true,
                    altField: '#d',
                    altFormat: "yy-mm-dd" 
                    });            

                $(".search").autocomplete({
                    source: function(request, response){
                                $.get("../fragments/search-patients-name.php", {
                                    term:request.term
                                    }, function(data){
                                    response($.map(data, function(item) {
                                        return {
                                            label: item.name,
                                            value: item.name,
                                            id: item.id
                                        }
                                    }))
                                }, "json");
                            },
                    minLength: 1,
                    messages: {
                        noResults: '',
                        results: function() {}
                    },
                    dataType: "json",
                    /* select: function (event, ui) {
                        
                            var thehtml = `<a class="button is-rounded orange-btn has-text-light"  href='patient.php?id=${ui.item.id}'>Go to ${ui.item.label}'s page</a>`;
                            $('#outputcontent').html(thehtml);
                        } */
                });            
            });
        </script>
        <script>
        $(function() {
            $('.room-cc').hover(
                

                function(){
                    if($(this).hasClass('is-orange-room') || $(this).hasClass('is-orange-room-fill')){
                        $(this).toggleClass('is-orange-room-fill');
                        $(this).toggleClass('is-orange-room');
                    } else if($(this).hasClass('is-blue-room') || $(this).hasClass('is-blue-room-fill')){
                        $(this).toggleClass('is-blue-room-fill');
                        $(this).toggleClass('is-blue-room');
                    }
                }
                
            );
        })
        </script>
    
</body>
</html>