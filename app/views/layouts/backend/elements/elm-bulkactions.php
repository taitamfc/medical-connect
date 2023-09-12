<div class="alignleft actions bulkactions">
    <label for="bulk-action-selector-top" class="screen-reader-text"><?= mc_lang('Bulk actions');?></label>
    <select name="bulk_action" id="bulk-action-selector-top">
        <option value=""><?= mc_lang('Action');?></option>
        <option value="delete"><?= mc_lang('Delete');?></option>
    </select>
    <input type="submit" id="doaction" class="button action" value="<?= mc_lang('Apply');?>">
</div>