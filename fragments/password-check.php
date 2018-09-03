<div id="password-check-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Change Password</p>
            <button class="delete" aria-label="close" onclick="modalToggle('password-check')"></button>
        </header>
            <section class="modal-card-body">
                <form name="password-check-form" method="post" action="<?= $self ?>">

                    <div class="field">
                        <label class="label">Enter current password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input name="check-password" class="input" type="password" placeholder="Password" value="<?=$_POST['check-password']?>">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            <?php if(isset($passErrors['check-password'])):?>
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <?php endif;?>
                        </div>
                        <?php if(isset($passErrors['check-password'])):?>
                        <p class="help is-danger"><?= $passErrors['check-password'] ?></p>
                        <?php endif;?>
                    </div>
                     
                    <button class="button" onclick="modalToggle('password-check')">Cancel</button>
                    <input class="button is-orange has-text-light" type="submit" name="password-check-submit" value="Next">
                </form>        
            </section>

    </div>
</div>


