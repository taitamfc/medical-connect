<?php
class MCPluginHelper {
    public static function renderInput($name,$label,$value = '',$options = []){
        $required       = !empty($options['required']) ? $options['required']: false;
        $description    = !empty($options['description']) ? $options['description']: '';
        $layout         = !empty($options['layout']) ? $options['layout']: 'tr';
        $type           = !empty($options['type']) ? $options['type']: 'text';
        ob_start();
        ?>
        <tr class="form-field <?= $required ? 'form-required' : '';?>">
            <th scope="row">
                <?php if($label):?>
                <label for="<?= $name; ?>"><?= mc_lang($label);?></label>
                <?php endif; ?>
            </th>
            <td>
                <input name="<?= $name; ?>" id="<?= $name; ?>" type="<?= $type; ?>" value="<?= $value; ?>">
                <?php if($description):?>
                <p class="description" id="<?= $name; ?>-description"><?= $description; ?></p>
                <?php endif; ?>
            </td>
        </tr>
        <?php
        return ob_get_clean();
    }
}