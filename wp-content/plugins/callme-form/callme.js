/*
	Sending request
*/
jQuery(function(){
		sendFlag = true; //a variable for preventing multiple requests
		
		jQuery('.submit input[type="submit"]').click(function(e){
			e.preventDefault();
			if (!sendFlag)
				return;
				
			$button = jQuery(this);
			sendFlag = false;
			
			if (callme_ajaxurl===undefined)
				return;
			
			var data = {
				action: "callme_request",
				callme_ajax: true,
			};
			data.telephone = jQuery('input[name="callme[telephone]"]').val();
			if (jQuery('input[name="callme[time_from]"]').val()!=undefined)
				data.time_from = jQuery('input[name="callme[time_from]"]').val();
			if (jQuery('input[name="callme[time_to]"]').val()!=undefined)
				data.time_to = jQuery('input[name="callme[time_to]"]').val();
			if (jQuery('input[name="callme[myname]"]').val()!=undefined)
				data.myname = jQuery('input[name="callme[myname]"]').val();
			if (jQuery('input[name="callme[page]"]').val()!=undefined)
				data.page = jQuery('input[name="callme[page]"]').val();
			if (jQuery('input[name="callme[pageurl]"]').val()!=undefined)
				data.pageurl = jQuery('input[name="callme[pageurl]"]').val();
				
			$button.addClass('disabled').attr('disabled', 'disabled');
			jQuery.post(callme_ajaxurl, data, function(response){
				response = eval('('+response+')');
				jQuery('#callme-plugin-widget .ajax-resp').html(response.message);
				if (response.status=='success')
					$button.unbind('click');
				else {
					sendFlag = true;
				$button.removeClass('disabled').removeAttr('disabled');

				}
			});
		});
});