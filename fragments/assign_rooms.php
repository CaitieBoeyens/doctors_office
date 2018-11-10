<div id="room-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Assign rooms</p>
            <button class="delete" aria-label="close" onclick="modalToggle('room')"></button>
        </header>
            <section class="modal-card-body">
                <form name="new-room-form" method="post" action="<?= $self ?>">
                <input name="room_id" id="room_id" value=" <?= $_POST['room'] ?>" type="hidden">

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

                                    $selectDoc = $db -> getDocbyRoom($_POST['room']);
                                     
                            ?>
                                <div class="column is-one-quarter has-text-centered">
                                    <input  type="radio" name="doctor_surname" value="<?= $surname ?>" id="<?= $doctor_id ?>" <?php echo ($selectDoc['last_name']===$surname)?'checked':'' ?>/>
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
                     
                    <input class="button is-orange has-text-light" type="submit" name="new-room-submit" value="Save changes">
                    <button class="button" onclick="modalToggle('room')">Cancel</button>
                </form>        
            </section>

    </div>
</div>


