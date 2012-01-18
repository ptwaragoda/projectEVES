<?$this->load->view('header')?>
    <div id="main" role="main">
		
		<div id="left-col">
			<?$this->load->view('deals/viewPartial', array('deal'=>$deals, 'header' => "This Week's ".$category->name." Deal"))?>
			<?$this->load->view('deals/otherdeals',array('header'=>'Other deals','deals'=>$deals,'exclude'=>$deals->id))?>
		</div><!-- /left-col -->
		
		<?$this->load->view('sidebar')?>
		
    </div><!-- /main -->
<?$this->load->view('footer')?>
<?/*
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
*/?>
