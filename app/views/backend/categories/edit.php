<div class="wrap">
    <h1 class="wp-heading-inline"><?= mc_lang('Edit Category');?></h1>
    <hr class="wp-header-end">
    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <?= MCPluginHelper::renderInput('name','Name','',['required'=>true]);?>
                <?= MCPluginHelper::renderInput('position','Position','',['type'=>'number']);?>
            </tbody>
        </table>
    </form>
</div>