<? load::view('template-header', array('title' => 'Report a Bug!')); ?>
<div class="span-21 last content-section">
    <form method="post" action="http://addressbook.adampatterson.ca/bugs/">
        <input name="key_hash" type="hidden" value="<?= md5("addressbook".VERSION) ?>"/>
        <input name="specs" type="hidden" value="<?= $_SERVER['HTTP_USER_AGENT'] ?>"/>
        <div class="span-16">
            <div class="span-16 form-row last">
                <div class="span-5 right">
                    <strong>Name</strong>
                </div>
                <div class="span-10 last">
                    <input name="name" type="text" class="text"/>
                </div>
            </div>
            <div class="span-16 form-row last">
                <div class="span-5 right">
                    <strong>E-Mail</strong>
                </div>
                <div class="span-10 last">
                    <input name="email" type="text" class="text" value="<? echo user::email(); ?>"/>
                </div>
            </div>
            <div class="span-16 form-row last">
                <div class="span-5 right">
                    <strong>Is this request urgent?:</strong>
                </div>
                <div class="span-10 last">
                    <select name="urgent">
                        <option selected="" value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="span-16 form-row last">
                <div class="span-5 right">
                    <strong>How would you categorize this request?:</strong>
                </div>
                <div class="span-10 last">
                    <select id="category" name="category">
                        <option value=""></option>
                        <option value="16">
                            01. Business Inquiry
                        </option>
                        <option value="2">
                            02. Pre-Sale Question
                        </option>
                        <option value="6">
                            03. Licensing Question / Issue
                        </option>
                        <option value="18">
                            04. Ordering activeCollab
                        </option>
                        <option value="4">
                            05. activeCollab Related Question or Problem
                        </option>
                        <option value="3">
                            06. Installation / Upgrade Question or Problem
                        </option>
                        <option value="8">
                            07. Hosted Demo
                        </option>
                        <option value="9">
                            08. Refund
                        </option>
                        <option value="22">
                            09. Website Problem
                        </option>
                        <option value="10">
                            10. Other
                        </option>
                        <option value="24">
                            11. Developers Program
                        </option>
                    </select>
                </div>
            </div>
            <div class="span-16 form-row last">
                <div class="span-5 right">
                    <strong>This is what I DID:</strong>
                </div>
                <div class="span-10 last">
                    <textarea class="input_textarea" rows="5" cols="50" name="did"></textarea>
                </div>
            </div>
            <div class="span-16 form-row last">
                <div class="span-5 right">
                    <strong>This is what I EXPECTED to happen:</strong>
                </div>
                <div class="span-10 last">
                    <textarea class="input_textarea" rows="5" cols="50" name="expected"></textarea>
                </div>
            </div>
            <div class="span-16 form-row last">
                <div class="span-5 right">
                    <strong>This is what ACTUALLY happened:</strong>
                </div>
                <div class="span-10 last">
                    <textarea class="input_textarea" rows="5" cols="50" name="actually"></textarea>
                </div>
            </div>
            <div class="span-15 last right">
                <button type="submit" class="button positive" tabindex="19" name="addContact">
                <span>
                <img alt="" src="<?= BASE_IMAGE ?>icons/20-check.png"/>SUBMIT
                </button>
            </div>
        </div>
    </form>
</div>
<? load::view('template-footer'); ?>
