<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Notification</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">

<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">
	Purchase order id <?=$order->id?> created.
</h2>
<br/><br/>
<p>
<b>Order id:</b> <?=$order->id?>
</p>
<p>
<b>Total:</b> <?=formatPrice($order->final_total)?>
</p>
<p>
<a href="<?=site_url('purchasesupplyorders/view/'.$order->id)?>">Link</a>
</p>


</td>
</tr>
</table>
</div>
</body>
</html>