<div>
    <label for="<?php echo $title_field_id; ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat mms-widget-title" id="<?php echo $title_field_id; ?>" name="<?php echo $title_field_name; ?>" type="text" value="<?php echo esc_attr( $title_value ); ?>" />
</div>

<div class="mms-SocialNetworksTable">

    <table>
        <thead>
            <tr>
                <th><?php _e('Social Network', 'mms'); ?></th>
                <th><?php _e('Link', 'mms'); ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach( $sn_values as $sn ) {
                mms_get_component( "WidgetOptions/SocialNetworkTableRow", "backoffice", [
                    'sn_field_name' => $sn_field_name,
                    'sn_field_id'   => $sn_field_id,
                    'sn_value'      => $sn,
                    'array_number'  => $i
                ] );
                $i++;
            }
            ?>
        </tbody>
    </table>

    <input type="hidden" class="sn_field_name" value="<?php echo $sn_field_name; ?>">
    <input type="hidden" class="sn_field_id" value="<?php echo $sn_field_id; ?>">

    <button class="buttonSocialNetwork add">+</button>
</div>