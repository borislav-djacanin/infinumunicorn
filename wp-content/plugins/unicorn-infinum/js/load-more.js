jQuery(function($){

	var page = 2;
	var loading = false;
	var gotovo = false;

	$(window).scroll(function(){
		if( !loading && !gotovo ) {
			
			if( $(window).scrollTop() + $(window).height() == $(document).height() ) {
					
				loading = true;
				var data = {
					action: 'be_ajax_load_more',
					page: page,
					query: beloadmore.query,
				};
					
				$.post( beloadmore.url, data, function( html ) {
							
						$(".load-more").append( html );
						page = page + 1;
						loading = false;

				}).fail(function(xhr, textStatus, e) {
					 console.log(xhr.responseText);
				});

			}
		}
	});
});