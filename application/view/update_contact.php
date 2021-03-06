<? load::view('template-header', array('title' => 'Add Contact'));?>

<form method="post" action="<?php echo url::page("update/action_contact/{$contact->id}");?>" enctype="multipart/form-data"  id="addContact">
	<!-- START -->
	<div class="span-21 last content-section">
		<h3 class="left">Update Contact</h3>
		<span class='actionAdd'>
			<a href="<?php echo url::page("admin/delete/{$contact->id}");?>
			" class="red">Delete</a>
		</span>
		<hr/>
		<div class="error rounded" style="display: none;">
			<img src="Subscription%20Signup%20_%20Marketo_files/warning.gif" alt="Warning!" style="margin: -5px 10px 0px 0px; float: left;" width="24" height="24" />
			<span></span>.
			<br clear="all" />
		</div>
		<div class="span-10 append-1">
			<h6>Personal Info:</h6>
			<hr/>
			<div class="span-10 form-row last">
				<div class="span-2 right small red">
					<strong>First Name</strong>
				</div>
				<div class="span-7 last">
					<input name="firstname" id="firstName" type="text" class="required text" tabindex="2" value="<?=$contact -> firstname;?>" />
				</div>
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Last Name</strong>
				</div>
				<div class="span-7 last">
					<input name="lastname" type="text" class="text" id="lName" tabindex="3" value="<?=$contact -> lastname;?>" />
				</div>
			</div>
	      <div class="span-10 form-row last">
	        <div class="span-2 right small"> <strong>Salutation</strong> </div>
	         <div class="span-7 small-radio">
	          <fieldset>
	            <input name="salutation" type="radio" value="Mr." <? if($contact -> salutation == 'Mr.') echo 'checked="checked"'; ?> />
	            <label> Mr. </label>
	            <input name="salutation" type="radio" value="Mrs." <? if($contact -> salutation == 'Mrs.') echo 'checked="checked"'; ?> />
	            <label> Mrs. </label>
	            <input name="salutation" type="radio" value="Ms." <? if($contact -> salutation == 'Ms.') echo 'checked="checked"'; ?> />
	            <label> Ms. </label>
	            <input name="salutation" type="radio" value="Dr." <? if($contact -> salutation == 'Dr.') echo 'checked="checked"'; ?> />
	            <label> Dr. </label>
	            <input name="salutation" type="radio" value="" <? if($contact -> salutation == '') echo 'checked="checked"'; ?> />
	            <label> None </label>
	          </fieldset>
	        </div>
	      </div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Company Name</strong>
				</div>
				<div class="span-7 last">
					<input name="company_name" type="text" class="text" id="cName" tabindex="4" value="<?=$contact -> company_name;?>" />
				</div>
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Title</strong>
				</div>
				<div class="span-7 last">
					<input name="title" type="text" class="text" id="tName" tabindex="5" value="<?=$contact -> title;?>" />
				</div>
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Birthday</strong>
				</div>
				<div class="span-7 last">
					<select name="bMonth" class="birthdaySelector">
						<option selected="selected" value="0">Month</option>
						<? echo $class_month -> currentMonth();?>
					</select>
					<select name="bDay" class="birthdaySelector">
						<option selected="selected" value="0">Day</option>
						<? echo $class_number -> currentNumber();?>
					</select>
					<input type="text" maxlength="4" size="4" name="bYear" class="birthdayText" value="Year" />
					<br/>
				</div>
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Photo</strong>
				</div>
				<div class="span-8 last">
					<input type="file" name="profile" id="profile" class="text" tabindex="16" />
				</div>
			</div>
		</div>
		<div class="span-10 last">
			<h6>Location:</h6>
			<hr/>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Address</strong>
				</div>
				<div class="span-7 last">
					<input name="address" type="text" class="text" id="address" tabindex="5" value="<?=$contact -> address;?>" />
				</div>
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Address 2</strong>
				</div>
				<div class="span-7 last">
					<input name="address2" type="text" class="text" id="address2" tabindex="6" value="<?=$contact -> address2;?>" />
				</div>
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Postal Code</strong>
				</div>
				<div class="span-7 last">
					<input name="postalcode" type="text" class="text" id="postalcode" tabindex="7" value="<?=$contact -> postalcode;?>" />
				</div>
			</div>
	      <div class="span-10 form-row last">
	        <div class="span-2 right small"> 
	        	<strong>Post Box</strong> 
	        	</div>
	        <div class="span-7 last">
	          <input name="postbox" type="text" class="text" id="postalbox" tabindex="7" value="<?=$contact -> postbox;?>" />
	        </div>
	      </div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>City</strong>
				</div>
				<div class="span-7 last">
					<input name="city" type="text" class="text" id="city" tabindex="8" value="<?=$contact -> city;?>" />
				</div>
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Province</strong>
				</div>
				<div class="span-7 last">
					<input name="province" type="text" class="text" id="province" tabindex="8" value="<?=$contact -> province;?>" />
				</div>
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 form-row small right">
					<strong>Country</strong>
				</div>
				<div class="span-7 last">
					<input name="country" type="text" class="text" id="country" tabindex="9" value="<?=$contact -> country;?>" />
				</div>
			</div>

		</div>
	</div>
	<div class="span-21 last content-section">
		<div class="span-10 append-1">
			<h6>Contact Info:</h6>
			<hr/>
			<?

foreach ($contacts as $value) {
// @todo add input field with contact ID
if ($value->type == 'email') {
			?>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>E-Mail</strong>
				</div>
				<div class="span-7 small-radio">
					<fieldset>
						<input name="email[<?=$value->contactid?>][0]" type="text" class="text email" id="email" tabindex="10" value="<?=$value->value?>" />
						<input name="email[<?=$value->contactid?>][1]" type="radio" id="home" value="home" <? if($value -> label == 'home') echo 'checked="checked"'; ?> />
						<label>
							Home
						</label>
						<input name="email[<?=$value->contactid?>][1]" type="radio"id="work" value="work" <? if($value -> label == 'work') echo 'checked="checked"'; ?> />
						<label>
							Work
						</label>
						<input name="email[<?=$value->contactid?>][1]" type="radio" id="other" value="other" <? if($value -> label == 'other') echo 'checked="checked"';?> />
						<label>
							Other
						</label>
					</fieldset>
				</div>
				<div class="span-1 actions last">
					<input type="checkbox" name="email[<?=$value->contactid?>][2]" value='<?=$value->contactid?>'>
					<input type="hidden" value="<?=$value->contactid ?>" name="email[<?=$value->contactid?>][3]" />
				</div>
			</div>
			<? }
				} // END Forearch Contacts
			?>
			<div class="span-10 form-row last">
				<input type="hidden" id="id" value="1" />
				<div class="span-2 right small">
					<strong>E-Mail</strong>
					<!--<br/>
					<small>
					Primary Contact
					</small>-->
				</div>
				<div class="span-7 small-radio">
					<fieldset>
						<input name="email[0][0]" type="text" class="text email" id="email" tabindex="10" value="" />
						<input name="email[0][1]" type="radio" id="home" value="home" checked="checked" />
						<label>
							Home
						</label>
						<input name="email[0][1]" type="radio"id="work" value="work" />
						<label>
							Work
						</label>
						<input name="email[0][1]" type="radio" id="other" value="other" />
						<label>
							Other
						</label>
					</fieldset>
				</div>
				<div class="span-1 actions last">
					<a href="#" onclick="addEmail(); return false;">
					<img src="<?=BASE_URL;?>assets/images/icons/20-add-ball.png" width="20" height="20" alt="Add" />
					</a>
				</div>
			</div>
			<div id="emailTxt">
			</div>
			<div class="span-10 form-row last">
				<?
foreach ($contacts as $value) {
// if type == phone
// @todo add input field with contact ID
if ($value->type == 'phone') {

				?>
				<div class="span-10 form-row last">
					<div class="span-2 right small">
						<strong>Phone</strong>
					</div>
					<div class="span-7 small-radio">
						<fieldset>
							<input name="phone[<?=$value->contactid?>][0]" type="text" class="text phone" tabindex="12" value="<?=$value->value?>" />
							<input name="phone[<?=$value->contactid?>][1]" type="radio" value="home" <?
								if($value -> label == 'home') { echo 'checked="checked"';
								}
							?> />
							<label>
								Home
							</label>
							<input name="phone[<?=$value->contactid?>][1]" type="radio" value="work" <?
								if($value -> label == 'work') { echo 'checked="checked"';
								}
							?> />
							<label>
								Work
							</label>
							<input name="phone[<?=$value->contactid?>][1]" type="radio" value="cell" <?
								if($value -> label == 'cell') { echo 'checked="checked"';
								}
							?> />
							<label>
								Cell
							</label>
							<input name="phone[<?=$value->contactid?>][1]" type="radio" value="fax" <?
								if($value -> label == 'fax') { echo 'checked="checked"';
								}
							?> />
							<label>
								Fax
							</label>
							<input name="phone[<?=$value->contactid?>][1]" type="radio" value="other" <?
								if($value -> label == 'other') { echo 'checked="checked"';
								}
							?> />
							<label>
								Other
							</label>
						</fieldset>
					</div>
					<div class="span-1 actions last">
						<input type="checkbox" name="phone[<?=$value->contactid?>][2]" value='<?=$value->contactid?>'>
						<input type="hidden" value="<?=$value->contactid ?>" name="phone[<?=$value->contactid?>][3]" />
					</div>
				</div>
				<?
				}
				} // END Forearch Contacts
				?>
				<div class="span-2 right small">
					<strong>Phone</strong>
				</div>
				<div class="span-7 small-radio">
					<fieldset>
						<input name="phone[0][0]" type="text" class="text phone" tabindex="12" value="" />
						<input name="phone[0][1]" type="radio" value="home" checked="checked" />
						<label>
							Home
						</label>
						<input name="phone[0][1]" type="radio" value="work"/>
						<label>
							Work
						</label>
						<input name="phone[0][1]" type="radio" value="cell"/>
						<label>
							Cell
						</label>
						<input name="phone[0][1]" type="radio" value="fax"/>
						<label>
							Fax
						</label>
						<input name="phone[0][1]" type="radio" value="other"/>
						<label>
							Other
						</label>
					</fieldset>
				</div>
				<div class="span-1 actions last">
					<a href="#" onClick="addPhone(); return false;">
					<img src="<?=BASE_URL;?>assets/images/icons/20-add-ball.png" width="20" height="20" alt="Add" />
					</a>
				</div>
			</div>
			<div id="phoneTxt">
			</div>
			<?
foreach ($contacts as $value) {
// if type == im
// @todo add input field with contact ID
if ($value->type == 'im') {

			?>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>
					<acronym title="Instant Messenger">
						IM
					</acronym>
					</strong>
				</div>
				<div class="span-4">
					<input name="im[<?=$value->contactid?>][0]" type="text" class="text" tabindex="15" value="<?=$value->value?>" />
				</div>
				<div class="span-3">
					<?
					// Set the type based on the value
					//echo $value->label;
					?>
					<select name="im[<?=$value->contactid?>][1]" id="imType">
						<option>IM Type</option>
						<option value="1"<? if($value -> label == '1') echo 'selected'; ?>>MSN Messenger</option>
						<option value="2"<? if($value -> label == '2') echo 'selected'; ?>>Google Talk</option>
						<option value="3"<? if($value -> label == '3') echo 'selected'; ?>>Yahoo! </option>
						<option value="4"<? if($value -> label == '4') echo 'selected'; ?>>AIM</option>
						<option value="5"<? if($value -> label == '5') echo 'selected'; ?>>ICQ</option>
						<option value="6"<? if($value -> label == '6') echo 'selected'; ?>>Skype</option>
						<option value="7"<?	if($value -> label == '7') echo 'selected'; ?>>Twitter</option>
						<option value="8"<? if($value -> label == '8') echo 'selected'; ?>>Other</option>
					</select>
				</div>
				<div class="span-1 actions last">
					<input type="checkbox" name="im[<?=$value->contactid?>][2]" value='<?=$value->contactid?>'>
					<input type="hidden" value="<?=$value->contactid ?>" name="im[<?=$value->contactid?>][3]" />
				</div>
			</div>
			<?
			}
			} // END Forearch Contacts
			?>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>
					<acronym title="Instant Messenger">
						IM
					</acronym>
					</strong>
				</div>
				<div class="span-4">
					<input name="im[0][0]" type="text" class="text" tabindex="15" value="" />
				</div>
				<div class="span-3">
					<select name="im[0][1]" id="imType">
						<option value="8">IM Type</option>
						<option value="1">MSN Messenger</option>
						<option value="2">Google Talk</option>
						<option value="3">Yahoo!</option>
						<option value="4">AIM</option>
						<option value="5">ICQ</option>
						<option value="6">Skype</option>
						<option value="7">Twitter</option>
						<option value="8">Other</option>
					</select>
				</div>
				<div class="span-1 actions last">
					<a href="#" onClick="addIm(); return false;">
					<img src="<?=BASE_URL;?>assets/images/icons/20-add-ball.png" width="20" height="20" alt="Add" />
					</a>
				</div>
			</div>
			<div id="imTxt">
			</div>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<strong>Website</strong>
				</div>
				<div class="span-7 ">
					<input name="website" type="text" class="text url" id="website" tabindex="14" value="<?=$contact -> website;?>" />
				</div>
				<!--<div class="span-1 actions last"> <img src="images/icons/20-check.png" width="20" height="20" alt="Check" /> </div>-->
			</div>
			<div class="span-10 form-row last">
				<?
				foreach ($contacts as $value) {
				// if type == phone
				// @todo add input field with contact ID
				if ($value->type == 'address') {

				?>
				<div class="span-10 form-row last">
					<div class="span-2 right small">
						<strong>Other Address</strong>
					</div>
					<div class="span-7 small-radio">
						<fieldset>
							<textarea name="other_address[<?=$value->contactid?>][0]" type="text" class="text address" tabindex="12" /><?=$value->value?></textarea>
						</fieldset>
					</div>
					<div class="span-1 actions last">
						<input type="checkbox" name="other_address[<?=$value->contactid?>][1]" value='<?=$value->contactid?>'>
						<input type="hidden" value="<?=$value->contactid ?>" name="other_address[<?=$value->contactid?>][2]" />
					</div>
				</div>
				<?
				}
				} // END Forearch Contacts
				?>
				<div class="span-2 right small">
					<strong>Other Address</strong>
				</div>
				<div class="span-7 small-radio">
					<fieldset>
						<textarea name="other_address[0][0]" rows="6" cols="15"></textarea>
					</fieldset>
				</div>
				<div class="span-1 actions last">
					<a href="#" onClick="addAddress(); return false;">
					<img src="<?=BASE_URL;?>assets/images/icons/20-add-ball.png" width="20" height="20" alt="Add" />
					</a>
				</div>
			</div>
			<div id="addressTxt"></div>
		</div>
		<div class="span-10 last">
			<h6>Misc Info:</h6>
			<hr/>
			<div class="span-10 form-row last">
				<!--<div class="notice rounded"> <strong>Full</strong> - Type of access <br/>
				<strong>Group</strong> - Type of access <br/>
				<strong>Single</strong> - Type  of access </div>-->
				<!-- <fieldset>
				<div class="span-2 right small">
				<label> Access </label>
				</div>
				<div class="span-6 last">
				<input type="radio" name="access" value="single" checked="checked" />
				<label> Single </label>
				<input type="radio" name="access" value="group"/>
				<label> Group </label>
				<input type="radio" name="access" value="full" />
				<label> Full </label>
				</div>
				</fieldset>-->
			</div>
			<!-- <div class="span-10 form-row last">
			<div class="span-2 right small"> <strong>Password</strong> </div>
			<div class="span-7 last">
			<input name="password" type="password" class="text" id="password" value="password" />
			</div>
			</div>
			-->
			<?
			// @todo add togle for password masking
			/*
			 <div class="span-10 form-row last">
			 <div class="span-2 right small"> <strong>Confirm</strong> </div>
			 <div class="span-7 last">
			 <input name="password_confirm" type="password" class="text password2" id="password2" value="password" />
			 </div>
			 </div>
			 */
			?>
			<div class="span-10 form-row last">
				<div class="span-2 right small">
					<label>
						Group
					</label>
				</div>
				<div class="span-7 last">
					<select name="group" id="group" tabindex="17">
						<option value='1'>Add Contact to a Group</option>
						<option></option>
						<option value='0'>Create new</option>
						<option></option>
						<?php foreach ($groups as $group): ?>
						<option value='<?=$group -> gid;?>' <? if($group -> gid == $contact -> gid) echo 'selected="selected"'; ?>><?= $group -> groups;?></option>
						<? endforeach;?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="span-21 last content-section">
		<h6>Notes:</h6>
		<hr/>
		<div class="span-18 prepend-2 last">
			<textarea name="notes" cols="600" rows="5" class="text markItUp"></textarea>
			<small>
				Text formatting:
			</small>
			<a href="javascript:popUp('<?=BASE_URL;?>/help/textile/')">
			<strong>Help</strong>
			</a>
			<br/>
			<br/>
		</div>
		<div class="span-21 last right form-block ">
			<a href="#cancel" class="red">
			<strong>Cancel</strong>
			</a>
			<input class="button" id="login" tabindex="19" name="addContact" value="Update" type="submit">
		</div>
		<?
foreach ($comments as $comment) {
		?>
		<div class="span-16 prepend-2 data-row last">
			<?
			echo date("F jS, Y", $comment -> comment_date);
			echo '<hr />';
			echo $textile -> TextileThis($comment -> comments);
			?>
			<div class="span-4 last editDelete">
				<a href="<?= url::page("admin/update_comment/{$contact->id}/{$comment->commentid}"); ?>">
				<img src="<?= BASE_URL;?>assets/images/icons/14-edit.png" width="14" height="14" alt="Edit" />
				Edit
				</a> &nbsp;&nbsp;
				<a href="<?= url::page("admin/delete_comment/{$comment->commentid}"); ?>">
				<img src="<?= BASE_URL;?>assets/images/icons/14-red-minus-ball.png" width="14" height="14" alt="Delete" />
				Delete
				</a>
			</div>
		</div>
		<?
		}
		?>
	</div>
	<!-- END -->
</form>
<? load::view('template-footer');?>
