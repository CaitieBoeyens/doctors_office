<div id="patient-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">New Patient</p>
            <button class="delete" aria-label="close" onclick="modalToggle('patient')"></button>
        </header>
            <section class="modal-card-body">
                <form name="new-patient-form" method="post" action="<?= $self ?>">

                    <?php 
                        foreach($pFields as $field){
                            

                                $description = $pDescriptions[$field];
                                $type = $pTypes[$field];
                                $icon = $pIcons[$field];
                                $error = $pErrors[$field];
                                $value = $_POST[$field];
                                include __DIR__.'/../fragments/form-field.php';
                            
                        }

                    ?>
                     
                    <input class="button is-orange has-text-light" type="submit" name="new-patient-submit" value="Save changes">
                    <button class="button" onclick="modalToggle('patient')">Cancel</button>
                </form>        
            </section>

    </div>
</div>

