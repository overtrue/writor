/**
 *	 Mail Script
 *
 *	Developed by Arlind Nushi - www.laborator.co
 */

var Mail = Mail || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
		Mail.$container = $(".mail-env");
		
		$.extend(Mail, {
			isPresent: Mail.$container.length > 0
		});
		
		// Mail Container Height fit with the document
		if(Mail.isPresent)
		{
			Mail.$sidebar = Mail.$container.find('.mail-sidebar');
			Mail.$body = Mail.$container.find('.mail-body');
			
			
			// Checkboxes
			var $cb = Mail.$body.find('table thead input[type="checkbox"], table tfoot input[type="checkbox"]');
			
			$cb.on('click', function()
			{
				$cb.attr('checked', this.checked).trigger('change');
				
				mail_toggle_checkbox_status(this.checked);
			});
			
			// Highlight
			Mail.$body.find('table tbody input[type="checkbox"]').on('change', function()
			{
				$(this).closest('tr')[this.checked ? 'addClass' : 'removeClass']('highlight');
			});
		}
	});
	
})(jQuery, window);


function fit_mail_container_height()
{
	if(Mail.isPresent)
	{
		if(Mail.$sidebar.height() < Mail.$body.height())
		{
			Mail.$sidebar.height( Mail.$body.height() );
		}
		else
		{
			var old_height = Mail.$sidebar.height();
			
			Mail.$sidebar.height('');
			
			if(Mail.$sidebar.height() < Mail.$body.height())
			{
				Mail.$sidebar.height(old_height);
			}
		}
	}
}

function reset_mail_container_height()
{
	if(Mail.isPresent)
	{
		Mail.$sidebar.height('auto');
	}
}

function mail_toggle_checkbox_status(checked)
{	
	Mail.$body.find('table tbody input[type="checkbox"]' + (checked ? '' : ':checked')).attr('checked',  ! checked).click();
}