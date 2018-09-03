<div id="room-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">assign rooms to </p>
            <button class="delete" aria-label="close" onclick="modalToggle('room')"></button>
        </header>
            <section class="modal-card-body">
                <form name="new-room-form" method="post" action="<?= $self ?>">

                    <input type="text" id="rooms" class="" value="awesome,neat">
                     
                    <input class="button is-orange has-text-light" type="submit" name="new-room-submit" value="Save changes">
                    <button class="button" onclick="modalToggle('room')">Cancel</button>
                </form>        
            </section>

    </div>
</div>


