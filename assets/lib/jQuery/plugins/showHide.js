// JavaScript Document
// Show Hide Panel

// If .show(slow) is no good used .toggle() to make them instant

    $(document) .ready( 
        function() { 
            SetCollapsible() 
        })
    
    function SetCollapsible() {
        $(".collapser")
	    .click(
		    function(){
		        var content = $(this).parent().next();
				// $( 'div.hide', $(this).parent().parent() );
    		
			    if ($(content).css("display") == "none") {			               
				    // set the spans inner text
				    $(this).html("<img src='assets/images/icons/14-minus-ball.png' alt='Hide' />  <img src='assets/images/icons/20-group.png' width='20' height='20' alt='Group' />");
    				
				    // expand the content div
				    $(content).slideToggle("slow").fadeIn("fast");
				
			    } else {  			               
				    // set the spans inner text
				    $(this).html("<img src='assets/images/icons/14-add-ball.png' alt='Show' /> <img src='assets/images/icons/20-group.png' width='20' height='20' alt='Group' />");
    				
				    // collapse the content div
				    $(content).slideToggle("slow").fadeOut("fast");
			    }        
		    }
	    )
	    .parent().next().hide(); // hides content on page load
		
	}