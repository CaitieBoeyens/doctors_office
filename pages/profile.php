<?php session_start() ?>
<?php require_once __DIR__.'/../fragments/setup.php'; ?>
<?php require_once __DIR__.'/../fragments/password-validation.php'; ?>

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
        <title>My Profile</title>         
        <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700|Montserrat" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/home.css" />
    </head>
<body>
<?php include __DIR__.'/../fragments/navigation.php'; ?>
<?php include __DIR__.'/../fragments/password-check.php'; ?>
<?php include __DIR__.'/../fragments/password-change.php'; ?>
<?php include __DIR__.'/../fragments/success.php'; ?>
    <div class="container main-con">
        <div class="columns is-centered">
            <div class="column is-one-third ">
                <div class="box is-blue has-text-centered has-text-light">
                    <?php
                        $user = $db -> getUser($_SESSION['email']);
                        $name = $user['name'];    
                        $img = '../assets/'.$user['img_path'].'.png';    
                    ?>
                    <figure>
                        <a href="doctor.php">
                            <p class="image person-icon">
                                <img src="<?= $img?>">
                            </p>
                        </a>
                    </figure>
                    <h2 class="title has-text-light"><?= $name ?></h2>
                    <p> <strong class="has-text-light">Email:</strong> <?= $_SESSION['email'] ?></p>
                    <div class="field change-password">
                        <a class="button is-rounded orange-btn has-text-light" onclick="modalToggle('password-check')">Change Password</a>
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
        <script>
            $(function() { 
                $('input[name=new-password]').on("change paste keyup", function() {
                    if(($(this).val().length) < 4){
                         $('#new-pass-ex').css({'display': 'inline-flex'});
                         $('#new-pass-msg').css({'display': 'block'});
                    } else {
                        $('#new-pass-ex').css({'display': 'none'});
                         $('#new-pass-msg').css({'display': 'none'});
                    }
                     if ($('input[name=new-password]').val().length === 0 || $('input[name=new-password-check]').val().length === 0 ) {
                    $('input[name=password-change-submit]').attr('disabled','disabled');
                    } else {
                        $('input[name=password-change-submit]').removeAttr('disabled');
                    }
                });
                $('input[name=new-password-check]').on("change paste keyup", function() {
                    if(($(this).val()) !== ($('input[name=new-password]').val())){
                         $('#pass-ex').css({'display': 'inline-flex'});
                         $('#pass-msg').css({'display': 'block'});
                    } else {
                        $('#pass-ex').css({'display': 'none'});
                         $('#pass-msg').css({'display': 'none'});
                    }
                     if ($('input[name=new-password]').val().length === 0 || $('input[name=new-password-check]').val().length === 0 ) {
                    $('input[name=password-change-submit]').attr('disabled','disabled');
                    } else{
                        $('input[name=password-change-submit]').removeAttr('disabled');
                    }
                });

               
            });       
</script>
</body>
</html>