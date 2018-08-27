<div id="appointment-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">New Appointment</p>
            <button class="delete" aria-label="close" onclick="modalToggle('appointment')"></button>
        </header>
            <section class="modal-card-body">
                <form name="new-appointment-form" method="post" action="<?= $self ?>">

                    <?php 
                        foreach($fields as $field){
                            if($field !== 'room_id'){

                                $description = $descriptions[$field];
                                $type = $types[$field];
                                $icon = $icons[$field];
                                $error = $errors[$field];
                                $value = $_POST[$field];
                                include __DIR__.'/../fragments/form-field.php';
                            }
                        }

                    ?>
                    <div class="field">
                        <label class="label">Room</label>
                        <div class="control has-icons-left has-icons-right">
                            <div class="select">
                                <select name="room_id" auto-focus="<?= $_POST['room_id'] ?>">
                                    <option value="">-</option>
                                <?php 
                                    $rooms = $db -> getRoomsList();
                                    
                                    foreach($rooms as $room){
                                        $id = $room['id'];
                                        $floor_num = $room['floor_num'];
                                        $room_num = $room['room_num'];

                                ?>
                                    <option value="<?= $id ?>">Room: <?= $room_num ?>, Floor: <?= $floor_num ?></option>

                                    <?php } ?>                
                                </select>
                            </div>
                            <div class="icon is-small is-left">
                                <i class="fas fa-hospital-alt"></i>
                            </div>
                        </div> 
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
                    <input class="button is-orange has-text-light" type="submit" name="new-appointment-submit" value="Save changes">
                    <button class="button" onclick="modalToggle('appointment')">Cancel</button>
                </form>        
            </section>

    </div>
</div>

