<div id="password-change-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Change Password</p>
            <button class="delete" aria-label="close" onclick="modalToggle('password-check')"></button>
        </header>
            <section class="modal-card-body">
                <form name="password-check-form" method="post" action="<?= $self ?>">

                    <div class="field">
                        <label class="label">Enter New Password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input name="new-password" class="input" type="password" placeholder="Password" value="<?=$_POST['new-password']?>">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            <?php if(isset($errors['new-password'])):?>
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <?php endif;?>
                             <span class="icon is-small is-right" style="display: none" id="new-pass-ex">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        </div>
                        <?php if(isset($errors['new-password'])):?>
                        <p class="help is-danger"><?= $errors['new-password'] ?></p>
                        <?php endif;?>
                         <p class="help is-danger" style="display: none" id="new-pass-msg">Password must be at least 4 characters long</p>
                    </div>
                    <div class="field">
                        <label class="label">Retype Password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input name="new-password-check" class="input" type="password" placeholder="Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            <?php if(isset($errors['new-password-check'])):?>
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <?php endif;?>
                            <span class="icon is-small is-right" style="display: none" id="pass-ex">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        </div>
                        <?php if(isset($errors['new-password-check'])):?>
                        <p class="help is-danger"><?= $errors['new-password-check'] ?></p>
                        <?php endif;?>
                        <p class="help is-danger" style="display: none" id="pass-msg">Passwords do not match</p>

                    </div>
                     
                    <button class="button" onclick="modalToggle('password-check')">Cancel</button>
                    <input class="button is-orange has-text-light" type="submit" name="password-change-submit" value="Next">
                </form>        
            </section>

    </div>
</div>


