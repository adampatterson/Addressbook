</div>
</div></div>
<div class="footerUtil">
    <div class="span-19">
        <a href="http://www.adampatterson.ca" target="_blank"><img src="<?=BASE_URL; ?>assets/images/adam-patterson.png" width="145" height="25" alt="Adam Patterson" /></a>
    </div>
    <div class="span-1">
        <a href="http://www.twitter.com/adampatterson/" target="_blank"><img src="<?=BASE_URL; ?>assets/images/icons/25-twitterific.png" width="25" height="25" alt="@adampatterson" /></a>
    </div>
    <div class="span-1">
        <a href="#" class="help"><img src="<?=BASE_URL; ?>assets/images/icons/25-bug.png" width="25" height="25" alt="Submit a Bug"/></a>
    </div>
    <div class="span-1 last">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="8AUKFFQFLWHKQ">
        <input type="image" src="http://addressbook.adampatterson.ca/25-5dolar.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>
<!--  Render time
            <?
            bench::mark('end');
            
            echo bench::time('start', 'end');
            bench::clear();
			?>-->

</div>
</div>
<script type="text/javascript" charset="utf-8">
  Tender = {
    hideToggle: true,
    sso: "unique-sso-token-of-current-user",
    widgetToggles: $('.help')
  }
</script>
<script src="https://adampatterson.tenderapp.com/tender_widget.js" type="text/javascript"></script>
</body>
</html>
