	// Append Email
	function addEmail() {
		var id = document.getElementById("id").value;
		$("#emailTxt").append("<div class='column span-10 form-row last' id='row" + id + "'><div class='column span-2 right small'> <strong>E-Mail</strong> </div><div class='column span-7 small-radio'><fieldset><input name='email[" + id + "][0]' type='text' class='text email' id='email' tabindex='10' /><input name='email[" + id + "][1]' type='radio' id='home' value='home' checked='checked' /><label> Home </label><input type='radio' name='email[" + id + "][1]' id='work' value='work' /><label> Work </label><input type='radio' name='email[" + id + "][1]' id='other' value='other' /><label> Other </label></fieldset></div><div class='column span-1 actions last'> <a href='#' onClick='removeEmail(\"#row" + id + "\"); return false;'><img src='assets/images/icons/20-red-minus-ball.png' width='20' height='20' alt='Minus' /></a> </div></div>");
	
		$('#row' + id).highlightFade({
			speed:1000
			});
		
		id = (id - 1) + 2;
		document.getElementById("id").value = id;
		}
	
	function removeEmail(id) {
		$(id).remove();
		}
		
		
	// Append Phone
	function addPhone() {
		var id = document.getElementById("id").value;
		$("#phoneTxt").append("<div class='column span-10 form-row last' id='row" + id + "'><div class='column span-2 right small'> <strong>Phone</strong> </div><div class='column span-7 small-radio'><fieldset><input name='phone[" + id + "][]' type='text' class='text' tabindex='10' /><input name='phone[" + id + "][1]' type='radio' id='home' value='home' checked='checked' /><label> Home </label><input type='radio' name='phone[" + id + "][1]' id='work' value='work' /><label> Work </label><input name='phone[" + id + "][1]' type='radio' value='cell'/><label>Cell</label><input type='radio' name='phone[" + id + "][1]' id='other' value='fax' /><label> Fax </label><input type='radio' name='phone[" + id + "][1]' id='other' value='other' /><label> Other </label></fieldset></div><div class='column span-1 actions last'> <a href='#' onClick='removePhone(\"#row" + id + "\"); return false;'><img src='assets/images/icons/20-red-minus-ball.png' width='20' height='20' alt='Minus' /></a> </div></div>");
	
		$('#row' + id).highlightFade({
			speed:1000
			});
		
		id = (id - 1) + 2;
		document.getElementById("id").value = id;
		}
	
	function removePhone(id) {
		$(id).remove();
		}
		
		
	// Append IM
	function addIm() {
		var id = document.getElementById("id").value;
		$("#imTxt").append("<div class='column span-10 form-row last' id='row" + id + "'><div class='column span-2 right small'><strong>IM</strong></div><div class='column span-4'><input type='text' class='text' name='im[" + id + "][0]' tabindex='15' /></div><div class='column span-3'><select name='im[" + id + "][1]' id='imType' ><option>IM Type</option><option value='1'>MSN Messenger</option><option value='2'>Google Talk</option><option value='3'>Yahoo!</option><option value='4'>AIM</option><option value='5'>ICQ</option><option value='6'>Skype</option><option value='7'>Twitter</option><option value='8'>Other</option></select></div><div class='column span-1 actions last'> <a href='#' onClick='removePhone(\"#row" + id + "\"); return false;'><img src='assets/images/icons/20-red-minus-ball.png' width='20' height='20' alt='Minus' /></a></div></div>");
			
		$('#row' + id).highlightFade({
			speed:1000
			});
		
		id = (id - 1) + 2;
		document.getElementById("id").value = id;
		}
	
	function removeIm(id) {
		$(id).remove();
		}