<div class="wrap">
    <h1 class="wp-heading-inline"><?= mc_lang('Manage Appointments');?></h1>
    <hr class="wp-header-end">
    <ul class="subsubsub">
        <li class="publish"><a href="<?= MCAppHelpper::getCurrentUrl();?>" class="current"><?= mc_lang('All');?><span class="count">(<?= $totalCount?>)</span></a> |</li>
    </ul>
    <form id="posts-filter" method="get">
        <input type="hidden" name="page" value="<?= MC_PLUGIN_BACKEND_URL;?>">
        <input type="hidden" name="paged" value="<?= $paged; ?>">
        <p class="search-box">
            <label class="screen-reader-text" for="post-search-input"><?= mc_lang('Search locations');?>:</label>
            <input type="search" id="post-search-input" name="s" value="<?= $s; ?>">
            <input type="submit" id="search-submit" class="button" value="<?= mc_lang('Search locations');?>">
        </p>
        <div class="tablenav top">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action" id="bulk-action-selector-top">
                    <option value="-1">Hành động</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions">
                <label class="screen-reader-text" for="cat"><?= mc_lang('Status');?></label>
                <select name="status" id="cat" class="postform">
                    <option value="0"><?= mc_lang('All status');?></option>
                    <option class="level-0" <?= mc_selected($status == 'pending');?> value="pending"><?= mc_lang('Pending');?></option>
                    <option class="level-0" <?= mc_selected($status == 'approved');?> value="approved"><?= mc_lang('Approved');?></option>
                    <option class="level-0" <?= mc_selected($status == 'done');?> value="done"><?= mc_lang('Done');?></option>
                    <option class="level-0" <?= mc_selected($status == 'rejected');?> value="rejected"><?= mc_lang('Rejected');?></option>
                </select>
                <input type="submit" id="post-query-submit" class="button" value="<?= mc_lang('Filter');?>">		
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
                    <th class="manage-column"><?= mc_lang('Date');?></th>
                    <th class="manage-column"><?= mc_lang('Provider');?></th>
                    <th class="manage-column"><?= mc_lang('Customer');?></th>
                    <th class="manage-column"><?= mc_lang('Service');?></th>
                    <th class="manage-column"><?= mc_lang('Status');?></th>
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
                            <a class="row-title" href="admin.php?page=wp2023-orders&order_id=<?= $item['id'];?>" ># <?= $item['id'];?></a>
                        </strong>
                    </td>
                    <td><?= $item['start_date'];?></td>
                    <td><?= $item->start_date;?></td>
                    <td><?= $item->customer_phone;?></td>
                    <td class="date column-date" ><?= $item->created;?></td>
                    <td class="date column-date" ><?= $item->created;?></td>
                    <td>
                        <a class="button button-small button-primary" href="<?= MCAppHelpper::getCurrentUrl(['action' => 'edit']);?>&id=<?= $item['id'];?>"><?= mc_lang('Edit');?></a>
                        <a class="button button-small button-secondary" href="<?= MCAppHelpper::getCurrentUrl(['action' => 'destroy']);?>&id=<?= $item['id'];?>"><?= mc_lang('Delete');?></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="tablenav bottom">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-bottom" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action2" id="bulk-action-selector-bottom">
                    <option value="-1">Hành động</option>
                    <option value="edit" class="hide-if-no-js">Chỉnh sửa</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction2" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions">
            </div>
            <?php  include MC_PATH.'app/views/layouts/backend/elements/elm-paginate.php';  ?>
            <br class="clear">
        </div>
        </form>
</div>