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
    public static function renderTextArea($name,$label,$value = '',$options = []){
        $required       = !empty($options['required']) ? $options['required']: false;
        $description    = !empty($options['description']) ? $options['description']: '';
        $layout         = !empty($options['layout']) ? $options['layout']: 'tr';
        ob_start();
        ?>
        <tr class="form-field <?= $required ? 'form-required' : '';?>">
            <th scope="row">
                <?php if($label):?>
                <label for="<?= $name; ?>"><?= mc_lang($label);?></label>
                <?php endif; ?>
            </th>
            <td>
                <textarea name="<?= $name; ?>" id="<?= $name; ?>"><?= $value; ?></textarea>
                <?php if($description):?>
                <p class="description" id="<?= $name; ?>-description"><?= $description; ?></p>
                <?php endif; ?>
            </td>
        </tr>
        <?php
        return ob_get_clean();
    }
    public static function renderInputSelect($name,$label,$value = '',$options = []){
        $required       = !empty($options['required']) ? $options['required']: false;
        $description    = !empty($options['description']) ? $options['description']: '';
        $options        = !empty($options['options']) ? $options['options']: [];
        $emptyFirst     = !empty($options['emptyFirst']) ? $options['emptyFirst']: '';
        ob_start();
        ?>
        <tr class="form-field <?= $required ? 'form-required' : '';?>">
            <th scope="row">
                <?php if($label):?>
                <label for="<?= $name; ?>"><?= mc_lang($label);?></label>
                <?php endif; ?>
            </th>
            <td>
                <select name="<?= $name; ?>" id="<?= $name; ?>">
                    <?php if($emptyFirst):?>
                        <option value=""><?= mc_lang($emptyFirst);?></option>
                    <?php endif;?>
                    <?php foreach($options as $key => $ovalue):?>
                        <option <?= @mc_selected($key == $value);?> value="<?= $key; ?>" ><?= $ovalue; ?></option>
                    <?php endforeach;?>
                </select>
                <?php if($description):?>
                <p class="description" id="<?= $name; ?>-description"><?= $description; ?></p>
                <?php endif; ?>
            </td>
        </tr>
        <?php
        return ob_get_clean();
    }
}