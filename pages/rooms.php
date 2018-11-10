 <?php session_start() ?>
 <?php require_once __DIR__.'/../fragments/setup.php'; ?>
 <?php require_once __DIR__.'/../fragments/rooms-validation.php'; ?>

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
        <link rel="stylesheet" type="text/css" media="screen" href="../css/rooms.css" />
        <title>Rooms</title>         
        <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
        <script src="../external/__jquery.tablesorter/jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <?php include __DIR__.'/../fragments/navigation.php'; ?>
        <?php include __DIR__.'/../fragments/assign_rooms.php'; ?>
        <?php include __DIR__.'/../fragments/success.php'; ?>
        
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-four-fifths ">
                        <div class="box is-blue room-container">
                            <h1 class="has-text-light">Rooms</h1>
                            <div class="box is-blue is-shadowless">
                                <form name="select-room-form" method="post" action="<?= $self ?>">
                                <div class="columns cc-selector">
                                    <div class="column is-half">
                                    
                                        <h2 class="subtitle has-text-light">Floor 1</h2>
                                        <div class="box rooms-block ">
                                            <div class="tile is-ancestor">
                                                <div class="tile is-vertical is-8">
                                                    <div class="tile">
                                                        <div class="tile is-parent is-vertical">
                                                         <input  type="radio" name="room" value="1" id="room1"/>
                                                         
                                                         
                                                         
                                                            <?php 
                                                                $doc1 = $db -> getDocbyRoom(1);

                                                                if($doc1['last_name'] === null):
                                                            ?>
                                                                <article class="tile is-child notification room-cc is-blue-room">
                                                                    <label for="room1" >
                                                                    <strong class="has-text-dark">
                                                                        Room 1 
                                                                    </strong>
                                                                    <p class="has-text-dark subtitle"></p>
                                                                </label>
                                                                </article>
                                                                <?php else: ?>
                                                                <article class="tile is-child notification room-cc is-orange-room">
                                                                    <label for="room1" >
                                                                        <strong class="has-text-dark">
                                                                        Room 1 
                                                                        </strong>
                                                                            
                                                                        <p class="has-text-dark subtitle">
                                                                        Dr <?= $doc1['last_name'] ?>
                                                                        </p>
                                                                </label>
                                                                </article>
                                                                <?php endif; ?>
                                                            </label>
                                                            <input  type="radio" name="room" value="2" id="room2"/>
                                                            
                                                                <?php 
                                                                    $doc2 = $db -> getDocbyRoom(2);

                                                                    if($doc2['last_name'] === null):
                                                                ?>
                                                                    <article class="tile is-child notification room-cc  is-blue-room">
                                                                    <label for="room2" >
                                                                    <strong class="has-text-dark">
                                                                        Room 2 
                                                                    </strong>
                                                                    <p class="has-text-dark subtitle"></p>
                                                                </label>
                                                                </article>
                                                                <?php else: ?>
                                                                <article class="tile is-child notification room-cc  is-orange-room">
                                                                    <label for="room2" >
                                                                        <strong class="has-text-dark">
                                                                        Room 2 
                                                                        </strong>
                                                                            
                                                                        <p class="has-text-dark subtitle">
                                                                        Dr <?= $doc2['last_name'] ?>
                                                                        </p>
                                                                </label>
                                                                </article>
                                                                <?php endif; ?>
                                                            </label>
                                                        </div>
                                                        <div class="tile is-parent">
                                                            <input  type="radio" name="room" value="3" id="room3"/>
                                                            
                                                                <?php 
                                                                    $doc3 = $db -> getDocbyRoom(3);

                                                                    if($doc3['last_name'] === null):
                                                                ?>
                                                                    <article class="tile is-child notification room-cc  is-blue-room">
                                                                        <label for="room3" >
                                                                        <strong class="has-text-dark">
                                                                            Room 3 
                                                                        </strong>
                                                                        <p class="has-text-dark subtitle"></p>
                                                                    </label>
                                                                    </article>
                                                                    <?php else: ?>
                                                                    <article class="tile is-child notification room-cc  is-orange-room">
                                                                        <label for="room3" >
                                                                            <strong class="has-text-dark">
                                                                            Room 3 
                                                                            </strong>
                                                                                
                                                                            <p class="has-text-dark subtitle">
                                                                            Dr <?= $doc3['last_name'] ?>
                                                                            </p>
                                                                    </label>
                                                                    </article>
                                                                    <?php endif; ?>
                                                                </label>
                                                        </div>
                                                    </div>
                                                    <div class="tile is-parent">
                                                        <input  type="radio" name="room" value="4" id="room4"/>
                                                        
                                                            <?php 
                                                                $doc4 = $db -> getDocbyRoom(4);

                                                                if($doc4['last_name'] === null):
                                                            ?>
                                                                <article class="tile is-child notification room-cc  is-blue-room">
                                                                    <label for="room4" >
                                                                    <strong class="has-text-dark">
                                                                        Room 4 
                                                                    </strong>
                                                                    <p class="has-text-dark subtitle"></p>
                                                                </label>
                                                                </article>
                                                            <?php else: ?>
                                                                <article class="tile is-child notification room-cc  is-orange-room">
                                                                    <label for="room4" >
                                                                        <strong class="has-text-dark">
                                                                        Room 4 
                                                                        </strong>
                                                                            
                                                                        <p class="has-text-dark subtitle">
                                                                        Dr <?= $doc4['last_name'] ?>
                                                                        </p>
                                                                </label>
                                                                </article>
                                                            <?php endif; ?>
                                                        </label>    
                                                    </div>
                                                </div>
                                                <div class="tile is-parent">
                                                    <input  type="radio" name="room" value="5" id="room5"/>
                                                    
                                                        <?php 
                                                            $doc5 = $db -> getDocbyRoom(5);

                                                            if($doc5['last_name'] === null):
                                                        ?>
                                                            <article class="tile is-child notification room-cc  is-blue-room">
                                                                <label for="room5" >
                                                                <strong class="has-text-dark">
                                                                    Room 5 
                                                                </strong>
                                                                <p class="has-text-dark subtitle"></p>
                                                            </label>
                                                            </article>
                                                        <?php else: ?>
                                                            <article class="tile is-child notification room-cc  is-orange-room">
                                                                <label for="room5" >
                                                                    <strong class="has-text-dark">
                                                                    Room 5 
                                                                    </strong>
                                                                        
                                                                    <p class="has-text-dark subtitle">
                                                                    Dr <?= $doc5['last_name'] ?>
                                                                    </p>
                                                            </label>
                                                            </article>
                                                        <?php endif; ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-half">
                                    
                                        <h2 class="subtitle has-text-light">Floor 2</h2>
                                        <div class="box rooms-block">
                                            <div class="tile is-ancestor">
                                                <div class="tile is-vertical is-8">
                                                    <div class="tile">
                                                        <div class="tile is-parent">
                                                            <input  type="radio" name="room" value="6" id="room6"/>
                                                            <?php 
                                                                $doc6 = $db -> getDocbyRoom(6);

                                                                if($doc6['last_name'] === null):
                                                            ?>
                                                                <article class="tile is-child notification room-cc  is-blue-room">
                                                                    <label for="room6" >
                                                                    <strong class="has-text-dark">
                                                                        Room 1 
                                                                    </strong>
                                                                    <p class="has-text-dark subtitle"></p>
                                                                </label>
                                                                </article>
                                                                <?php else: ?>
                                                                <article class="tile is-child notification room-cc  is-orange-room">
                                                                    <label for="room6" >
                                                                        <strong class="has-text-dark">
                                                                        Room 1 
                                                                        </strong>
                                                                            
                                                                        <p class="has-text-dark subtitle">
                                                                        Dr <?= $doc6['last_name'] ?>
                                                                        </p>
                                                                </label>
                                                                </article>
                                                                <?php endif; ?>
                                                        </div>
                                                        <div class="tile is-parent">
                                                            <input  type="radio" name="room" value="7" id="room7"/>
                                                            <?php 
                                                                $doc7 = $db -> getDocbyRoom(7);

                                                                if($doc7['last_name'] === null):
                                                            ?>
                                                                <article class="tile is-child notification room-cc  is-blue-room">
                                                                    <label for="room7" >
                                                                    <strong class="has-text-dark">
                                                                        Room 2 
                                                                    </strong>
                                                                    <p class="has-text-dark subtitle"></p>
                                                                </label>
                                                                </article>
                                                                <?php else: ?>
                                                                <article class="tile is-child notification room-cc  is-orange-room">
                                                                    <label for="room7" >
                                                                        <strong class="has-text-dark">
                                                                        Room 2 
                                                                        </strong>
                                                                            
                                                                        <p class="has-text-dark subtitle">
                                                                        Dr <?= $doc7['last_name'] ?>
                                                                        </p>
                                                                </label>
                                                                </article>
                                                                <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="tile is-parent">
                                                        <input  type="radio" name="room" value="8" id="room8"/>
                                                        <?php 
                                                                $doc8 = $db -> getDocbyRoom(8);

                                                                if($doc8['last_name'] === null):
                                                            ?>
                                                                <article class="tile is-child notification room-cc  is-blue-room">
                                                                    <label for="room8" >
                                                                    <strong class="has-text-dark">
                                                                        Room 3 
                                                                    </strong>
                                                                    <p class="has-text-dark subtitle">    </p>
                                                                </label>
                                                                </article>
                                                                <?php else: ?>
                                                                <article class="tile is-child notification room-cc  is-orange-room">
                                                                    <label for="room8" >
                                                                        <strong class="has-text-dark">
                                                                        Room 3 
                                                                        </strong>
                                                                            
                                                                        <p class="has-text-dark subtitle">
                                                                        Dr <?= $doc8['last_name'] ?>
                                                                        </p>
                                                                </label>
                                                                </article>
                                                                <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="tile is-parent">
                                                    <input  type="radio" name="room" value="9" id="room9"/>
                                                    <?php 
                                                                $doc9 = $db -> getDocbyRoom(9);

                                                                if($doc9['last_name'] === null):
                                                            ?>
                                                                <article class="tile is-child notification room-cc  is-blue-room">
                                                                    <label for="room9" >
                                                                    <strong class="has-text-dark">
                                                                        Room 4 
                                                                    </strong>
                                                                    <p class="has-text-dark subtitle"></p>
                                                                </label>
                                                                </article>
                                                                <?php else: ?>
                                                                <article class="tile is-child notification room-cc  is-orange-room">
                                                                    <label for="room9" >
                                                                        <strong class="has-text-dark">
                                                                        Room 4 
                                                                        </strong>
                                                                            
                                                                        <p class="has-text-dark subtitle">
                                                                        Dr <?= $doc9['last_name'] ?>
                                                                        </p>
                                                                </label>
                                                                </article>
                                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="has-text-centered">

                                            <input class="button is-orange has-text-light is-rounded" type="submit" name="select-room-submit" value="Assign Doctor" id="select-submit">
                                        </div>
                                    </div>
                                </div>
                                </form>
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