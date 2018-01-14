<tr data-index="<?php echo $array_number; ?>">
    <td>
        <select class="widefat" name="<?php echo $sn_field_name; ?>[<?php echo $array_number; ?>][network]">
            <option>-<?php _e('Select a Social Network', 'mms'); ?>-</option>
            <option value="facebook" <?php echo ( $sn_value['network'] == 'facebook' )? 'selected' : ''; ?>>Facebook</option>
            <option value="twitter" <?php echo ( $sn_value['network'] == 'twitter' )? 'selected' : ''; ?>>Twitter</option>
            <option value="linkedin" <?php echo ( $sn_value['network'] == 'linkedin' )? 'selected' : ''; ?>>LinkedIn</option>
            <option value="instagram" <?php echo ( $sn_value['network'] == 'instagram' )? 'selected' : ''; ?>>Instagram</option>
            <option value="github" <?php echo ( $sn_value['network'] == 'github' )? 'selected' : ''; ?>>Github</option>
        </select>
    </td>
    <td>
        <input type="text" name="<?php echo $sn_field_name; ?>[<?php echo $array_number; ?>][url]" value="<?php echo $sn_value['url']; ?>">
    </td>
    <td>
        <button class="buttonSocialNetwork delete">-</button>
    </td>
</tr>