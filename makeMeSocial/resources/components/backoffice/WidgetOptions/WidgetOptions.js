jQuery(document).ready(function() {
    
    addSocialNetwork();
    deleteSocialNetwork();

});

/**
 * It allows to add a new row to the table when pressing the "+" button
 */
function addSocialNetwork() {

    jQuery('.buttonSocialNetwork.add').on('click', function( event ) {
        event.preventDefault();

        self = this;

        // Calculating the next index for the array of options
        lastIndex = 0;
        if( jQuery( this ).closest('.mms-SocialNetworksTable').find('table tbody tr').length > 0 ) {
            lastIndex = jQuery( this )
                .closest('.mms-SocialNetworksTable')
                .find('table tbody tr')
                .last()
                .data('index');
            lastIndex = parseInt( lastIndex ) + 1;
        }

        var data = {
            action: 'addSocialNetwork',
            security : MMS.security,
            sn_field_name: jQuery( this ).closest('.mms-SocialNetworksTable').find('.sn_field_name').val(),
            sn_field_id: jQuery( this ).closest('.mms-SocialNetworksTable').find('.sn_field_id').val(),
            last_index: lastIndex
        };
    
        jQuery.ajax({
            type: "POST",
            url: MMS.ajaxurl,
            dataType: "html",
            data: data,
            success: function(msg) {
                var lastInsert = jQuery( self )
                    .closest('.mms-SocialNetworksTable')
                    .find('table tbody')
                    .append(msg);
                deleteSocialNetwork(); // Adding functionality to the new created buttons
            },
            error: function(msg) {
    
            }
        });
    });

}

/**
 * It allows to delete a row of the table when pressing the "-" button
 */
function deleteSocialNetwork() {

    jQuery('.buttonSocialNetwork.delete').on('click', function( event ) {
        event.preventDefault();
        jQuery( this )
            .closest('tr')
            .remove();

        allowToSave( this );
    });

}

function allowToSave( self ) {

    button = jQuery( self )
        .closest('form')

        console.log( button );

}

jQuery(document).ajaxSuccess(function(e, xhr, settings) {
	var widget_id_base = 'mms';
	
	if(settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
		
		jQuery('.selector').on('change', change_image);	
			
		function change_image(){
		     	
				var $path = jQuery(this).find('option:selected').val();
				jQuery('.image_path').attr('src',$path);
		}	
	}
});