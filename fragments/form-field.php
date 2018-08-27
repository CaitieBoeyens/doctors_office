<div class="field">
    <label class="label"><?= $description?></label>
    <div class="control has-icons-left has-icons-right">
        <input name="<?= $field ?>" class="input" type="<?= $type ?>" placeholder="<?= $description?>" value="<?= $value ?>">
        <span class="icon is-small is-left">
            <i class="<?= $icon ?>"></i>
        </span>
        <?php if(isset($error)):?>
        <span class="icon is-small is-right">
            <i class="fas fa-exclamation-triangle"></i>
        </span>
        <?php endif;?>
    </div>
    <?php if(isset($error)):?>
    <p class="help is-danger"><?= $errors[$field] ?></p>
    <?php endif;?>
</div>