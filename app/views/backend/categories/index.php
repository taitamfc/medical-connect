<div class="wrap">
    <h1 class="wp-heading-inline"><?= mc_lang('Manage Categories');?></h1>
    <a href="<?= MCAppHelpper::getCurrentUrl(['action' => 'create']);?>" class="page-title-action"><?= mc_lang('Add New');?></a>
    <?php  include MC_PATH.'app/views/layouts/backend/elements/elm-message.php';  ?>
    <hr class="wp-header-end">
    <ul class="subsubsub">
        <li class="publish">
            <a href="<?= MCAppHelpper::getCurrentUrl();?>" class="current"><?= mc_lang('All');?>
                <span class="count">(<?= $totalCount?>)</span>
            </a>
        </li>
    </ul>
    <form id="posts-filter" method="get">
        <input type="hidden" name="page" value="<?= MC_PLUGIN_BACKEND_URL;?>">
        <input type="hidden" name="paged" value="<?= $paged; ?>">
        <input type="hidden" name="controller" value="<?= @$_GET['controller']; ?>">
        <input type="hidden" name="action" value="<?= @$_GET['action']; ?>">
        <p class="search-box">
            <label class="screen-reader-text" for="post-search-input"><?= mc_lang('Search category');?>:</label>
            <input type="search" id="post-search-input" name="s" value="<?= $s; ?>">
            <input type="submit" id="search-submit" class="button" value="<?= mc_lang('Search category');?>">
        </p>
        <div class="tablenav top">
            <?php  include MC_PATH.'app/views/layouts/backend/elements/elm-bulkactions.php';  ?>
            <div class="alignleft actions">
                		
            </div>
            <?php  include MC_PATH.'app/views/layouts/backend/elements/elm-paginate.php';  ?>
            <br class="clear">
        </div>
        <h2 class="screen-reader-text"><?= mc_lang('All appointments');?></h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1"><?= mc_lang('Sellect all');?></label><input id="cb-select-all-1" type="checkbox"></td>
                    <th class="manage-column column-primary"><?= mc_lang('ID');?></th>
                    <th class="manage-column"><?= mc_lang('Name');?></th>
                    <th class="manage-column"><?= mc_lang('Info');?></th>
                    <th class="manage-column"><?= mc_lang('Position');?></th>
                    <th class="manage-column"><?= mc_lang('Action');?></th>
                </tr>
            </thead>
            <tbody id="the-list">
                <?php foreach( $items as $item ): ?>
                <tr id="post-<?= $item['id'];?>" class="iedit author-self level-0 post-<?= $item['id'];?> status-publish hentry">
                    <th scope="row" class="check-column">
                        <input id="cb-select-<?= $item['id'];?>" type="checkbox" name="post[]" value="<?= $item['id'];?>">
                    </th>
                    <td class="title column-title has-row-actions column-primary page-title">
                        <strong>
                            <a class="row-title" href="<?= MCAppHelpper::getCurrentUrl(['action' => 'edit']);?>&id=<?= $item['id'];?>" ># <?= $item['id'];?></a>
                        </strong>
                    </td>
                    <td><?= $item['name'];?></td>
                    <td><?= $item['info'];?></td>
                    <td><?= $item['position'];?></td>
                    <td>
                        <a class="button button-small button-primary" href="<?= MCAppHelpper::getCurrentUrl(['action' => 'edit']);?>&id=<?= $item['id'];?>"><?= mc_lang('Edit');?></a>
                        <a class="button button-small button-secondary" onclick=" return confirm('<?= mc_lang('Are you sure ?');?>') " href="<?= MCAppHelpper::getCurrentUrl(['action' => 'destroy']);?>&id=<?= $item['id'];?>"><?= mc_lang('Delete');?></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="tablenav bottom">
            <?php  include MC_PATH.'app/views/layouts/backend/elements/elm-bulkactions.php';  ?>
            <div class="alignleft actions">
            </div>
            <?php  include MC_PATH.'app/views/layouts/backend/elements/elm-paginate.php';  ?>
            <br class="clear">
        </div>
    </form>
</div>