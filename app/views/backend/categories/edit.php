<div class="wrap">
    <h1 class="wp-heading-inline"><?= mc_lang('Edit Category');?></h1>
    <?php  include MC_PATH.'app/views/layouts/backend/elements/elm-message.php';  ?>
    <hr class="wp-header-end">
    <form id="mcjs-form" action="" method="post">
        <input type="hidden" name="page" value="<?= MC_PLUGIN_BACKEND_URL;?>">
        <input type="hidden" name="controller" value="<?= @$_GET['controller']; ?>">
        <input type="hidden" name="action" value="<?= @$_GET['action']; ?>">
        <table class="form-table">
            <tbody>
                <?= MCPluginHelper::renderInput('name','Name',@$item['name'],['required'=>true]);?>
                <?= MCPluginHelper::renderTextArea('info','Info',@$item['info']);?>
                <?= MCPluginHelper::renderInput('position','Position',@$item['position'],['type'=>'number']);?>
            </tbody>
        </table>
        <div class="edit-tag-actions">
            <input type="submit" class="button button-primary" value="<?= mc_lang('Save');?>">
            <span id="back-link">
                <a class="back button" href="<?= MCAppHelpper::getCurrentUrl(['action' => 'index']);?>"><?= mc_lang('Back');?></a>
            </span>
        </div>
    </form>
</div>