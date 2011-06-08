$(document).ready( function() {
    
    //iPhone Touch for hover
    /*
    $('.hover').bind('touchstart touchend', function(e) {
        e.preventDefault();
        $(this).toggleClass('hover_effect');
    });
    */
	//iPhone Password Masking
	/*
	$('input:password').dPassword({
		duration: 2000,
		prefix: 'user_'
	});
    */
	
	// Search Place Holder
	var search_box_focus = function() {
		var el = $(this);
		if (el.hasClass('placeholder')) {
			if (this.value === this.title) {
				this.value = '';
				el.removeClass('placeholder');
			}
		}
	};

	var search_box_blur = function() {
		if (this.value === '') {
			this.value = this.title;
			$(this).addClass('placeholder');
		}
	};


	// Search placeholder
		search_boxes = $('div.search-box input.search');
		search_boxes.focus(search_box_focus);
		search_boxes.blur(search_box_blur);

		// Add placeholder on load if empty
		$.each(search_boxes, function() {
			if (this.value === '' || this.value === this.title) {
				this.value = this.title;
				$(this).addClass('placeholder');
			}
		});
		
		
		
	// jQuery UI Date Picker
	$('#datepicker').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: '-75:+1'
		});
	

	// Add Zebra Stripes to List and Group Views (any thing with .data-row or .export-row
	 $(function() {
    $("div .data-row:nth-child(even)").addClass("striped");
		$("div .export-row:nth-child(even)").addClass("striped");
      });
	  
	  
	// basic show and hide
	 $(document).ready(function() {
	   $('.toggleTextile').click( function() {
	    $('.showhideTextile').toggle();
	   });
	});
	
	
	// Password Strength
	$(function() {
		$('.password').pstrength();
	});
	
		
}); // End JS