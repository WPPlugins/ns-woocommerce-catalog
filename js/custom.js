jQuery(document).ready(function($){
	$('#ns-catalog-notice button.ns-notice-dismiss').click(function() {
		$.ajax({
			url : nsdismisswat.ajax_url,
			type : 'post',
			data : {
				action : 'ns_dismiss_catalog_ajax'
			},
			success : function( response ) {
				$('#ns-catalog-notice').fadeOut();
			}
		});		
	});
});